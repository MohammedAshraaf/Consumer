<?php

namespace Consumer\Database;

class Database implements DatabaseRepoInterface
{

    /**
     * Saves data to database
     * @param $data
     * @return mixed
     */
    public function save($data)
    {
        echo "Data is saved!";
    }
}