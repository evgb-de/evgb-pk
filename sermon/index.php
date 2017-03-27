<?php

use Pagekit\Application;

// packages/evgb-de/sermon/index.php

return [

    'name' => 'sermon',

    'type' => 'extension',

    // called when Pagekit initializes the module
    'main' => function (Application $app) {
    },
    // Enable the calendar: appreviation
    'resources' => [
      'sermon' => ''
    ],

    'config' => [
      'entries' => [
        ['id' => '0', 'preacher' => 'prediger', 'text' => 'Matthäus 1,5', 'description' => 'beschreibung', 'status' => true, 'audio' => '/bla']
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
