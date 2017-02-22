<?php
namespace Http;

/**
* Simple class to make curl request. Usage as this:
*
* $url = 'http://www.server.com/json/endpoint/' . $id;
* $options = [CURLOPT_RETURNTRANSFER => true];
* $http = new HttpService($url);
* $json_data = $http->getRequestAsJsonDecoded($options);
* if ($http->getResponseCode() === 200) { return 'Good!!'; }
*/
class HttpService
{
    private $url;
    private $responseCode;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }

    private function setResponseProperties($curl)
    {
        $this->responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    }

    public function getRequest(array $curl_options=[])
    {
        $curl = curl_init($this->url);

        foreach ($curl_options as $option => $value) {
            curl_setopt($curl, $option, $value);
        }
        
        $curl_response = curl_exec($curl);
        $this->setResponseProperties($curl);
        curl_close($curl);
        return $curl_response;
    }

    public function getRequestAsJsonDecoded(array $curl_options=[])
    {
        $curl_response = $this->getRequest($curl_options);
        return json_decode($curl_response, true);
    }
}