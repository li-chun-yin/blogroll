<?php

use PHPUnit\Framework\TestCase;
use lichunyin\blogroll\storage\FileStorage;
use lichunyin\blogroll\Config;
use lichunyin\blogroll\Link;
use lichunyin\blogroll\exception\MessageException;

class LinkTest extends TestCase
{    
   /**
    *
    * @var Config
    */
    public static $config;
    
    /**
     *
     * @var Config
     */
    public static $path;
    
    /**
     *
     * @var array
     */
    public static $options;
    
    /**
     * 
     * @var Link
     */
    public static $link;
    
    /**
     *
     * {@inheritDoc}
     * @see \PHPUnit\Framework\TestCase::setUpBeforeClass()
     */
    public static function setUpBeforeClass() : void
    {
        static::$path               = __DIR__ . DIRECTORY_SEPARATOR . 'link.storage.json';
        $options                    = [];
        $options['site_title']      = "test";
        $options['site_url']        = "http://localhost";
        $options['link_storage']    = new FileStorage(static::$path);
        
        static::$options            = $options;
        static::$config             = new Config($options);
        static::$link               = new Link(static::$config);
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \PHPUnit\Framework\TestCase::tearDownAfterClass()
     */
    public static function tearDownAfterClass() : void
    {
        unlink(static::$path);
    }
    
    public function testConfig()
    {
        $this->assertEquals(static::$link->getConfig(), static::$config);
    }
    
    public function testAdd()
    {
        //由于是否添加了友情链接的验证需要第三方网站配合，所以unit制作了测试是否抛出异常
        $this->expectException(MessageException::class);
        
        static::$link->add('baidu', 'http://www.baidu.com');
    }
    
    public function testAll()
    {
        $this->assertIsArray(static::$link->all());
    }
}