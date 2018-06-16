<?php


class XMLFormat implements FormatDataInterface
{

    /**
     * Formats the data for different usages
     * @param $data SimpleXMLElement
     * @return mixed
     */
    public function format($data)
    {
        // convert the xml to an array with key, value pairs
        return json_decode(json_encode((array)$data), TRUE);
    }
}