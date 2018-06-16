<?php
namespace Consumer\Formats;


class JsonFormat implements FormatDataInterface
{

    /**
     * Formats the data for different usages
     * @param $data string as json
     * @return array
     */
    public function format($data)
    {
        // convert the xml to an array with key, value pairs
        return json_decode($data);
    }
}