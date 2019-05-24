<?php

use PHPUnit\Framework\TestCase;
use lichunyin\blogroll\storage\FileStorage;

/**
 * 
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年5月23日
 */
class FileStorageTest extends TestCase
{
    public function testMain()
    {
        $path       = __DIR__ . DIRECTORY_SEPARATOR . 'link.storage.json';
        $test_data  = [
            'url1'  => 'title1',
            'url2'  => 'title2',
        ];
        $fileStorage = new FileStorage($path);
        $fileStorage->save($test_data);
        $loaded_data    = $fileStorage->read();
        $this->assertEquals($test_data['url1'], $loaded_data['url1']);
        $this->assertEquals($test_data['url2'], $loaded_data['url2']);
        unlink($path);
    }
}