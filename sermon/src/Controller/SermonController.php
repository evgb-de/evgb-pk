<?php

namespace Pagekit\Sermon\Controller;

use Pagekit\Application as App;

class SermonController
{
  /**
  * @Access(admin=true)
  */
  public function indexAction()
  {
      $module = App::module('sermon');
      $config = $module->config;
      return [
          '$view' => [
              'title' => __('Sermons'),
              'name' => 'sermon:views/admin/index.php'
          ],
          '$data' => [
              'config' => $config
          ],
          'entries' => $config['entries'],
          'title' => 'Manage Sermons',
      ];
  }
  /**
  * @Request({"entries": "array"}, csrf=true)
  * @Access(admin=true)
  */
  public function saveAction($entries = [])
  {
    App::config('sermon')->set('entries', $entries);
    return ['message' => 'success'];
  }

  /**
  * @Route("/")
  */
  public function siteAction()
  {
    $module = App::module('sermon');
    $config = $module->config;
    return [
      '$view' => [
        'title' => __("Sermons"),
        'name' => 'sermon:views/index.php'
      ],
      'entries' => $config['entries']
    ];
  }
}
?>
