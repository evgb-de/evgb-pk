<?php

use Pagekit\Application;

// packages/evgb-de/pkddl/index.php

return [
  'name' => 'pkddl',
  'type' => 'extension',
  // called when Pagekit initializes the module
  'main' => function (Application $app) {

  },
  'autoload' => [
    'Pagekit\\pkddl\\' => 'src'
  ],
  // Enable the pkddl: appreviation
  'resources' => [
    'pkddl:' => ''
  ],

  'routes' => [
    '@pkddl' => [
      'path' => '/pkddl',
      'controller' => 'Pagekit\\pkddl\\Controller\\DDLController'
    ]
  ],


  'config' => [
    'entries' => [
    ]
  ],

  'menu' => [
    'pkddl' => [
      'label'  => 'DDls',
      'icon'   => 'app/system/assets/images/placeholder-icon.svg',
      'url'    => '@pkddl',
      'active' => '@pkddl/*',
      'access' => 'pkddl: manage'
    ]
  ],
];
?>
