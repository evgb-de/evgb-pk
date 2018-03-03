<?php

namespace Pagekit\pkddl\Controller;

use Pagekit\Application as App;

class DDLController
{
  /**
  * @Access(admin=true)
  */
  public function indexAction()
  {
      $module = App::module('pkddl');
      $config = $module->config;
      return [
          '$view' => [
              'title' => __('DDls'),
              'name' => 'pkddl:views/admin/index.php'
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
    App::config('pkddl')->set('entries', $entries);
    return ['message' => 'success'];
  }

  /**
  * @Route("/")
  */
  public function siteAction()
  {
    $module = App::module('pkddl');
    $config = $module->config;
    return [
      '$view' => [
        'title' => __("DDLs"),
        'name' => 'pkddl:views/index.php'
      ],
      'entries' => $config['entries']
    ];
  }
}
?>
