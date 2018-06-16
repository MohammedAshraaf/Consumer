<?php

namespace Consumer\DataSource\File;


use Consumer\DataSource\DataSourceInterface;

abstract class FileBasic implements DataSourceInterface
{
    /**
     * the file's path
     * @var string
     */
    protected $filePath;

    /**
     * FileBasic constructor.
     * @param string $filePath
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Gets data from the source
     * @return array
     */
    public function getData()
    {
        return $this->readFile();
    }

    /**
     * Reads the file's content
     * @return mixed
     */
    protected abstract function readFile();
}