<?php

namespace Pagekit\pk_ddl\Controller;

use Pagekit\Application as App;

class DDLController
{
  /**
  * @Access(admin=true)
  */
  public function indexAction()
  {
      $module = App::module('pk-ddl');
      $config = $module->config;
      return [
          '$view' => [
              'title' => __('DDls'),
              'name' => 'pk-ddl:views/admin/index.php'
          ],
          '$data' => [
              'config' => $config
          ],
          'entries' => $config['entries'],
          'title' => 'Manage DDLs',
      ];
  }
  /**
  * @Request({"entries": "array"}, csrf=true)
  * @Access(admin=true)
  */
  public function saveAction($entries = [])
  {
    App::config('pk-ddl')->set('entries', $entries);
    return ['message' => 'success'];
  }

  /**
  * @Route("/")
  */
  public function siteAction()
  {
    $module = App::module('pk-ddl');
    $config = $module->config;
    return [
      '$view' => [
        'title' => __("DDLs"),
        'name' => 'pk-ddl:views/index.php'
      ],
      'entries' => $config['entries']
    ];
  }
}
?>
