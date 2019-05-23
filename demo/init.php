<?php

use lichunyin\blogroll\storage\FileStorage;
use lichunyin\blogroll\Config;
use lichunyin\blogroll\Link;
use lichunyin\blogroll\Pager;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$options                    = [];
$options['link_storage']    = new FileStorage(__DIR__ . DIRECTORY_SEPARATOR . 'link.storage.json');
$config                     = new Config($options);
$link                       = new Link($config);
$pager                      = new Pager($link);

return $pager;