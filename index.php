<?php

use Pagekit\Application;

// packages/evgb-de/sermon/index.php

return [
  'name' => 'sermon',
  'type' => 'extension',
  // called when Pagekit initializes the module
  'main' => function (Application $app) {

  },
  'autoload' => [
    'Pagekit\\Sermon\\' => 'src'
  ],
  // Enable the sermon: appreviation
  'resources' => [
    'sermon:' => ''
  ],

  'routes' => [
    '@sermon' => [
      'path' => '/sermon',
      'controller' => 'Pagekit\\Sermon\\Controller\\SermonController'
    ]
  ],


  'config' => [
    'entries' => [
    ]
  ],

  'menu' => [
    'sermon' => [
      'label'  => 'Predigten',
      'icon'   => 'app/system/assets/images/placeholder-icon.svg',
      'url'    => '@sermon',
      'active' => '@todo/*',
      'access' => 'todo: manage'
    ]
  ],
];
?>
