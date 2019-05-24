<?php
namespace lichunyin\blogroll;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年5月23日
 */
class Config implements ConfigInterface
{
    private $link_storage;
    private $site_title;
    private $site_url;
    
    public function __construct(array $options)
    {
        $this->link_storage     = $options['link_storage'] ?? null;
        $this->site_title       = $options['site_title'] ?? '';
        $this->site_url         = $options['site_url'] ?? '';
    }

    /**
     *
     * @return string
     */
    public function getLinkStorage() : LinkStorageInterface
    {
        return $this->link_storage;
    }
    
    /**
     * 本站友情链接标题
     *
     * @return string
     */
    public function getSiteTitle() : string
    {
        return $this->site_title;
    }
    
    /**
     * 本站友情链接url
     *
     * @return string
     */
    public function getSiteUrl() : string
    {
        return $this->site_url;
    }
}