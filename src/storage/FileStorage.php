<?php
namespace lichunyin\blogroll\storage;

use lichunyin\blogroll\LinkStorageInterface;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年5月23日
 */
class FileStorage implements LinkStorageInterface
{
    /**
     *
     * @var string
     */
    private $path;

    /**
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
        if(!is_file($this->path)){
            $dir    = dirname($this->path);
            @mkdir($dir, 0755, true);
            $this->save();
        }
    }

    /**
     * 读取
     *
     * @return array
     */
    public function read() : array
    {
        $link_data  = file_get_contents($this->path);
        return (array) json_decode($link_data, true);
    }

    /**
     *
     * {@inheritDoc}
     * @see \lichunyin\blogroll\LinkStorageInterface::save()
     */
    public function save(array $links = []) : void
    {
        file_put_contents($this->path, json_encode($links), LOCK_EX);
    }
}