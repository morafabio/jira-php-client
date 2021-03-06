<?php return [
    'baseUrl' => 'https://localhost',
    'apiVersion' => '2',
    'operations' => [
        'GetUser' => [
            'httpMethod' => 'GET',
            'uri' => '/rest/api/{ApiVersion}/user?username={username}',
            'responseModel' => 'User',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'username' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
            ]
        ],
        'AddUser' => [
            'httpMethod' => 'POST',
            'uri' => '/rest/api/{ApiVersion}/user',
            'responseModel' => 'User',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'name' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json'
                ],
                'password' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json'
                ],
                'emailAddress' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json'
                ],
                'displayName' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json'
                ],
                'active' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json'
                ]
            ]
        ],
        'UpdateUser' => [
            'httpMethod' => 'PUT',
            'uri' => '/rest/api/{ApiVersion}/user?username={username}',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'username' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'password' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json'
                ],
                'emailAddress' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json'
                ],
                'displayName' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json'
                ],
                'active' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json'
                ]
            ]
        ],
        'DeactivateUser' => [
            'httpMethod' => 'PUT',
            'uri' => '/rest/api/{ApiVersion}/user?username={username}',
            'responseModel' => 'User',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'username' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'emailAddress' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'active' => [
                    'required' => true,
                    'type' => 'boolean',
                    'location' => 'json'
                ]
            ]
        ],
        'ActivateUser' => [
            'httpMethod' => 'PUT',
            'uri' => '/rest/api/{ApiVersion}/user?username={username}',
            'responseModel' => 'User',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'username' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'emailAddress' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'active' => [
                    'required' => true,
                    'type' => 'boolean',
                    'location' => 'json'
                ]
            ]
        ],
        'DeleteUser' => [
            'httpMethod' => 'DELETE',
            'uri' => '/rest/api/{ApiVersion}/user?username={username}',
            'responseModel' => 'User',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'username' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
            ]
        ],
        'SearchForUser' => [
            'httpMethod' => 'GET',
            'uri' => '/rest/api/{ApiVersion}/user/search?username={username}',
            'responseModel' => 'User',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'username' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
            ]
        ],
        'GetIssue' => [
            'httpMethod' => 'GET',
            'uri' => '/rest/api/{ApiVersion}/issue/{issue}',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'issue' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
            ]
        ],
        'PostSearch' => [
            'httpMethod' => 'POST',
            'uri' => '/rest/api/{ApiVersion}/search',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'payload' => [ 'required' => true, 'type' => 'string', 'location' => 'body' ],
                'Content-Type' => [ 'type' => 'string', 'location' => 'header', 'default' => 'application/json', 'static' => 'true' ]
            ]
        ]
    ],
    'models' => [
        'User' => [
            'type' => 'object',
            'properties' => [
                'statusCode' => ['location' => 'statusCode']
            ],
            'additionalProperties' => [
                'location' => 'json'
            ]
        ],
        'Result' => [
            'type' => 'object',
            'properties' => [
                'statusCode' => ['location' => 'statusCode']
            ],
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ]

];
