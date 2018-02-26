<?php

use Pagekit\Application;

// packages/evgb-de/pk-ddl/index.php

return [
  'name' => 'pk-ddl',
  'type' => 'extension',
  // called when Pagekit initializes the module
  'main' => function (Application $app) {

  },
  'autoload' => [
    'Pagekit\\pk-ddl\\' => 'src'
  ],
  // Enable the pk-ddl: appreviation
  'resources' => [
    'pk-ddl:' => ''
  ],

  'routes' => [
    '@pk-ddl' => [
      'path' => '/pk-ddl',
      'controller' => 'Pagekit\\pk-ddl\\Controller\\DDLController'
    ]
  ],


  'config' => [
    'entries' => [
    ]
  ],

  'menu' => [
    'pk-ddl' => [
      'label'  => 'DDls',
      'icon'   => 'app/system/assets/images/placeholder-icon.svg',
      'url'    => '@pk-ddl',
      'active' => '@todo/*',
      'access' => 'todo: manage'
    ]
  ],
];
?>
