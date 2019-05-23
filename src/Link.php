<?php
namespace lichunyin\blogroll;

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
        $links          = $this->all();
        $links[$title]  = $url;
        $link_json      = json_encode($links);
        $this->config->getLinkStorage()->save($link_json);
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
}