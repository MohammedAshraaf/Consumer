<?php

namespace Consumer\DataSource\API;

class XMLDataSource extends APIBasic
{
    /**
     * Handles the response as needed
     * @param $response
     * @return mixed
     */
    public function handleResponse($response)
    {
        // use the xml formatter
        $formatData = new XMLFormat();

        // formats the results to array to match the expected return data type
        return $formatData->format($response);
    }

}