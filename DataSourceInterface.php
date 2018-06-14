<?php

interface DataSourceInterface
{
    /**
     * Gets data from the source
     * @return mixed
     */
    public function getData();
}