<?php

class JsonDataSource extends APIBasic
{
    /**
     * Handles the response as needed
     * @param $response
     * @param FormatDataInterface $formatData
     * @return mixed
     */
    public function handleResponse($response, FormatDataInterface $formatData)
    {
        // formats the results to array to match the expected return data type
        return $formatData->format($response);
    }

}