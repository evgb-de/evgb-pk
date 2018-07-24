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
  'events' => [
    'view.scripts' => function ($event, $scripts) {
      $scripts->register('panel-link', 'system/site:app/bundle/panel-link.js', 'vue');
      $scripts->register('input-link', 'system/site:app/bundle/input-link.js', 'panel-link');
      $scripts->register('input-tree', 'system/site:app/bundle/input-tree.js', 'vue');
      $scripts->register('link-page', 'system/site:app/bundle/link-page.js', '~panel-link');
      $scripts->register('node-page', 'system/site:app/bundle/node-page.js', ['~site-edit', 'editor']);
      $scripts->register('node-meta', 'system/site:app/bundle/node-meta.js', '~site-edit');
    },
  ],
];
?>