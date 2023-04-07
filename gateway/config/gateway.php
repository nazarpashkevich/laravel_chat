<?php

return [
  'routes' => [
      ['prefix' => '/auth-api'],
      [
        'prefix' => '/chat-api',
        'middlewares' => ['auth']
      ],
  ]
];
