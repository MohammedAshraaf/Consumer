<?php

namespace Consumer\DataSource;

interface DataSourceInterface
{
    /**
     * Gets data from the source
     * @return array
     */
    public function getData();
}