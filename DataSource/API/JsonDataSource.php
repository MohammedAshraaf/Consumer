<?php

class JsonDataSource extends APIBasic
{
    /**
     * Handles the response as needed
     * @param $response
     * @return mixed
     */
    public function handleResponse($response)
    {
        // use the json formatter
        $formatData = new JsonFormat();

        // formats the results to array to match the expected return data type
        return $formatData->format($response);
    }

}