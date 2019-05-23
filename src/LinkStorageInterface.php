<?php
namespace lichunyin\blogroll;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年5月23日
 */
interface LinkStorageInterface
{
    /**
     * 读取
     *
     * @return array
     */
    public function read() : array;

    /**
     * 保存
     */
    public function save(array $links = []) : void;
}