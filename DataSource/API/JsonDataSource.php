<?php

class JsonDataSource extends APIBasic
{
    /**
     * Gets data from the source
     * @param array $additionalOptions
     * @return array
     */
    public function getData(array $additionalOptions = [])
    {
        // add request options
        $this->addRequestOptions($additionalOptions);

        // make the request
        $response = $this->makeRequest();

        // return the data after handling it as required
        return $this->handleResponse($response, new JsonFormat());

    }

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