<?php
namespace Consumer\Database;

interface DatabaseRepoInterface
{
    /**
     * Saves data to database
     * @param $data
     * @return mixed
     */
    public function save($data);
}