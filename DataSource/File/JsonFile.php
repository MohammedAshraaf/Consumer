<?php


class JsonFile extends FileBasic
{
    /**
     * Reads file's content
     * @return array content
     */
    protected function readFile()
    {
        // read file's content
        $content = file_get_contents($this->filePath);

        // decode the json to array
        return json_decode($content,true);
    }
}