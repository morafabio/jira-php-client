<?php

namespace Jira;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * Partial Jira API client implemented with Guzzle.
 *
 * @method array getUser(array $config = [])
 * @method array addUser(array $config = [])
 * @method array updateUser(array $config = [])
 * @method array deleteUser(array $config = [])
 * @method array deactivateUser(array $config = [])
 * @method array activateUser(array $config = [])
 * @method array getIssue(array $config = [])
 * @method array postSearch(array $config = [])
 */
class Client extends GuzzleClient
{
    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        // Apply some defaults.
        $config += [
            'max_retries'      => 3,
            'description_path' => __DIR__ . '/jira-api.php',
        ];

        // Create the Jira client.
        parent::__construct(
            $this->getHttpClientFromConfig($config),
            $this->getDescriptionFromConfig($config),
            $config
        );

        // Ensure that the credentials are set.
        $this->applyCredentials($config);

        // Ensure that ApiVersion is set.
        $this->setConfig(
            'defaults/ApiVersion',
            $this->getDescription()->getApiVersion()
        );
    }

    private function getHttpClientFromConfig(array $config)
    {
        // If a client was provided, return it.
        if (isset($config['http_client'])) {
            return $config['http_client'];
        }

        // Create a Guzzle HttpClient.
        $clientOptions = isset($config['http_client_options'])
            ? $config['http_client_options']
            : [];
        $client = new HttpClient($clientOptions);

        // Attach request retry logic.
        $client->getEmitter()->attach(new RetrySubscriber([
            'max' => $config['max_retries'],
            'filter' => RetrySubscriber::createChainFilter([
                RetrySubscriber::createStatusFilter(),
                RetrySubscriber::createCurlFilter(),
            ]),
        ]));

        return $client;
    }

    private function getDescriptionFromConfig(array $config)
    {
        // If a description was provided, return it.
        if (isset($config['description'])) {
            return $config['description'];
        }

        // Load service description data.
        $data = is_readable($config['description_path'])
            ? include $config['description_path']
            : null;

        // Override description from local config if set
        if(isset($config['description_override'])){
            $data = array_merge($data, $config['description_override']);
        }

        return new Description($data);
    }

    private function applyCredentials(array $config)
    {
        // Ensure that the credentials have been provided.
        if (!isset($config['apiuser'])) {
            throw new \InvalidArgumentException(
                'You must provide a apiuser.'
            );
        }
        if (!isset($config['apipass'])) {
            throw new \InvalidArgumentException(
                'You must provide a apipass.'
            );
        }

        // Set credentials for authentication based on Jira's requirements.
        $this->getHttpClient()->setDefaultOption('auth', [
            $config['apiuser'], $config['apipass']
        ]);
    }
}