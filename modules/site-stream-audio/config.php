<?php

return [
    '__name' => 'site-stream-audio',
    '__version' => '0.0.2',
    '__git' => 'git@github.com:getmim/site-stream-audio.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/site-stream-audio' => ['install','update','remove'],
        'app/site-stream-audio' => ['install','remove'],
        'theme/site/stream/audio' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'site' => NULL
            ],
            [
                'site-meta' => NULL
            ],
            [
                'stream-audio' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'SiteStreamAudio\\Library' => [
                'type' => 'file',
                'base' => 'modules/site-stream-audio/library'
            ],
            'SiteStreamAudio\\Controller' => [
                'type' => 'file',
                'base' => 'app/site-stream-audio/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'site' => [
            'siteStreamAudio' => [
                'path' => [
                    'value' => '/stream/audio'
                ],
                'method' => 'GET',
                'handler' => 'SiteStreamAudio\\Controller\\Stream::single'
            ],
            'siteStreamAudioUpdate' => [
                'path' => [
                    'value' => '/stream/audio/update'
                ],
                'method' => 'GET',
                'handler' => 'SiteStreamAudio\\Controller\\Stream::update'
            ]
        ]
    ],
    'libFormatter' => [
        'formats' => [
            'stream-audio' => [
                'page' => [
                    'type' => 'router',
                    'router' => [
                        'name' => 'siteStreamAudio',
                        'params' => []
                    ]
                ]
            ]
        ]
    ]
];