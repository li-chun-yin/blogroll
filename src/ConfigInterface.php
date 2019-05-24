<?php
namespace lichunyin\blogroll;

/**
 * 配置信息接口
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年5月23日
 */
interface ConfigInterface
{
    /**
     * 返回友情新建信息存储的路径
     *
     * @return string
     */
    public function getLinkStorage() : LinkStorageInterface;
    
    /**
     * 本站友情链接标题
     * 
     * @return string
     */
    public function getSiteTitle() : string;
    
    /**
     * 本站友情链接url
     * 
     * @return string
     */
    public function getSiteUrl() : string;
}