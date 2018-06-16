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
    protected $curlAdditionalOptions = [];

    /**
     * APIBasic constructor.
     * @param string $url
     * @param array $additionalOptions
     */
    public function __construct($url, $additionalOptions = [])
    {
        $this->url = $url;

        $this->additionalOptions = $additionalOptions;
    }

    /**
     * Gets data from the source
     * @return array
     */
    public function getData()
    {
        // make the request
        $response = $this->makeRequest();

        // return the data after handling it as required
        return $this->handleResponse($response);
    }

    /**
     * Makes the request to the desired api
     * @return mixed
     */
    protected function makeRequest()
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
    protected function setUpTheRequest()
    {
        // the basic configurations
        $curlConfig = [
            CURLOPT_URL            => $this->url,
            CURLOPT_RETURNTRANSFER => true,
        ];

        // add additional configurations that set by the user
        foreach ($this->curlAdditionalOptions as $option => $value)
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
            $this->curlAdditionalOptions[$option] = $value;
        }
    }

    /**
     * Handles response as required
     * @param $response
     * @return mixed
     */
    protected abstract function handleResponse($response);
}