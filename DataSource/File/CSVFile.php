<?php

namespace Consumer\DataSource\File;

class CSVFile extends FileBasic
{
    /**
     * @return array
     */
    protected function readFile()
    {
        // prepare the content
        $content = [];

        // open the file
        $file_handle = fopen($this->filePath, 'r');

        // iterate over the csv and add to array
        while (!feof($file_handle) )
        {
            $content[] = fgetcsv($file_handle, 1024);
        }

        // close the file
        fclose($file_handle);

        // return the data
        return $content;
    }
}