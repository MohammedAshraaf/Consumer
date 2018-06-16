<?php

interface DataSourceInterface
{
    /**
     * Gets data from the source
     * @param array $additionalOptions
     * @return array
     */
    public function getData(array $additionalOptions = []);
}