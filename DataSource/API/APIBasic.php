<?php

abstract class APIBasic implements DataSourceInterface
{
    /**
     * The url for the request
     * @var string
     */
    protected $url;

    /**
     * The additional options for curl
     * @var array
     */
    protected $additionalOptions = [];

    /**
     * Makes the request to the desired api
     * @return mixed
     */
    public function makeRequest()
    {
        // build the request
        $request = curl_init();

        // build the configurations for the request
        $requestSetup = $this->setUpTheRequest();

        // set the configuration to the request
        curl_setopt_array($request, $requestSetup);

        // execute the request
        $response = curl_exec($request);

        // close the connection
        curl_close($request);

        // return response
        return $response;
    }

    /**
     * Sets up any additional configurations to the curl request
     * @return array
     */
    private function setUpTheRequest()
    {
        // the basic configurations
        $curlConfig = [
            CURLOPT_URL            => $this->url,
            CURLOPT_RETURNTRANSFER => true,
        ];

        // add additional configurations that set by the user
        foreach ($this->additionalOptions as $option => $value)
        {
            $curlConfig[$option] = $value;
        }

        // return the configurations
        return $curlConfig;
    }

    /**
     * Adds more options to the curl configuration
     * @param array $options
     */
    public function addRequestOptions(array $options)
    {
        // options must be an array
        if (!is_array($options))
        {
            throw new InvalidArgumentException('Options must be an array defined as: Setup => value');
        }

        // add additional options
        foreach ($options as $option => $value)
        {
            $this->additionalOptions[$option] = $value;
        }
    }

    abstract function handleResponse($response, FormatDataInterface $formatData);
}