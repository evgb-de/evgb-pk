<?php

use Pagekit\Application;

// packages/evgb-de/sermon/index.php

return [

    'name' => 'sermon',

    'type' => 'extension',

    // called when Pagekit initializes the module
    'main' => function (Application $app) {
    },
    // Enable the sermon: appreviation
    'resources' => [
      'sermon' => ''
    ],

    'config' => [
      'entries' => [
        [
          'id' => '0',
          'preacher' => 'prediger 1',
          'text' => 'Matthäus 1,5',
          'description' => 'beschreibung',
          'public' => true,
          'attachments' => ['audio' => '/bla', 'script' => '/text', 'presentation' => '/prezi']
        ]
      ]
    ],

    'autoload' => [
      'Pagekit\\Sermon\\' => 'src'
    ],

    'routes' => [
      '@sermon' => [
        'path' => '/sermon',
        'controller' => 'Pagekit\\Sermon\\Controller\\SermonController'
      ]
    ],

    'menu' => [
      'sermon' => [
        'label'  => 'Predigten',
        'icon'   => 'app/system/assets/images/placeholder-icon.svg',
        'url'    => '@sermon',
      ]
    ],
  ];

?>
