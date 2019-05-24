<?php

use PHPUnit\Framework\TestCase;
use lichunyin\blogroll\Config;
use lichunyin\blogroll\storage\FileStorage;

class ConfigTest extends TestCase
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
    
    /**
     *
     * @return string
     */
    public function testGetLinkStorage()
    {
        $this->assertEquals(static::$config->getLinkStorage(), static::$options['link_storage']);
    }
    
    /**
     * 本站友情链接标题
     *
     * @return string
     */
    public function getSiteTitle() : string
    {
        $this->assertEquals(static::$config->getSiteTitle(), static::$options['site_title']);
    }
    
    /**
     * 本站友情链接url
     *
     * @return string
     */
    public function getSiteUrl() : string
    {
        $this->assertEquals(static::$config->getSiteUrl(), static::$options['site_url']);
    }
}