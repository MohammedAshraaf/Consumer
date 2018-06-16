<?php
namespace Consumer\Formats;

interface FormatDataInterface
{
    /**
     * Formats the data for different usages
     * @param $data
     * @return mixed
     */
    public function format($data);
}