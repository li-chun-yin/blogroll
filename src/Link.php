<?php
namespace lichunyin\blogroll;

use lichunyin\blogroll\exception\MessageException;

/**
 * 友情链接交换助手类
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年5月23日
 */
class Link
{
    /**
     *
     * @var ConfigInterface
     */
    private $config;

    /**
     *
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config   = $config;
    }

    /**
     * 返回配置信息
     *
     * @return ConfigInterface
     */
    public function getConfig() : ConfigInterface
    {
        return $this->config;
    }

    /**
     * 添加一个新的链接
     *
     * @param string $title
     * @param string $url
     */
    public function add(string $title, string $url) : void
    {
        $this->check($url);
        $links        = $this->all();
        $links[$url]  = $title;
        $this->config->getLinkStorage()->save($links);
    }

    /**
     * 返回所有友情链接信息
     *  - ['title'=>'title','link'=>'link'][]
     *
     * @return array;
     */
    public function all() : array
    {
        return $this->config->getLinkStorage()->read();
    }
    
    /**
     * 检查url
     * 
     * @param string $url
     */
    private function check(string $url)
    {
        $target_html    = @file_get_contents($url);
        $site_url       = $this->config->getSiteUrl();
        if(preg_match("@href=[^>]*{$site_url}@siU", $target_html) == 0){
            throw new MessageException('你还没有添加本站友情链接，请先添加。或者友情链接检测失败，请确认你的url是否填写正确，并重试。');            
        }
    }
}