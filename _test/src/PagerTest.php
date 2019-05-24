<?php
use PHPUnit\Framework\TestCase;
use lichunyin\blogroll\storage\FileStorage;
use lichunyin\blogroll\Config;
use lichunyin\blogroll\Link;
use lichunyin\blogroll\Pager;

class PagerTest extends TestCase
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
     * @var Pager
     */
    public static $pager;
    
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
        static::$pager              = new Pager(static::$link);
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
    
    public function testBootstrapFrom()
    {
        $this->assertIsString(static::$pager->bootstrapFrom());
    }


    public function testLinksHtml()
    {
        $this->assertIsString(static::$pager->linksHtml());
    }
}