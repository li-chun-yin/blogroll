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

    public function __construct(array $options)
    {
        $this->link_storage  = $options['link_storage'] ?? null;
    }

    /**
     *
     * @return string
     */
    public function getLinkStorage() : LinkStorageInterface
    {
        return $this->link_storage;
    }
}