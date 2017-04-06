<?php
namespace Api;

class Response
{
    private $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function outputResponse($responseData)
    {
        //header('Access-Control-Allow-Origin: http://localhost:80');
        
        header('Access-Control-Allow-Methods: POST,GET,DELETE');
        header('Access-Control-Allow-Headers: Content-Type,Accept');
        http_response_code($responseData['ResponseCode']);

        $responseType = ($this->route) ? $this->route['responseType'] : 'JSON';

        switch ($responseType) {
            case 'HTML':
                # output data directly
                if (is_array($responseData['data'])){
                    print_r($responseData['data']);
                } else {
                    print $responseData['data'];
                }
                break;
            
            default:
                # default is JSON
                header('Content-Type: application/json');
                print json_encode($responseData['data']);
                break;
        }
    }

    public static function responseOk($data)
    {
        return [
            'ResponseCode' => 200,
            'data' => $data
        ];
    }

    public static function responseDenided($data)
    {
        return [
            'ResponseCode' => 400,
            'data' => $data
        ];
    }

    public static function responseNotFound($data=false)
    {
        $data = ($data) ? $data : 'Not Found';
        return [
            'ResponseCode' => 404,
            'data' => $data
        ];
    }

    public static function responseError($data)
    {
        return [
            'ResponseCode' => 500,
            'data' => $data
        ];
    }

    public static function responseErrorException($e)
    {
        $data = [
            'ErrorCode' => $e->getCode(),
            'ErrorMessage' => $e->getMessage(),
            'ErrorTrace' => $e->getTraceAsString()
        ];
        static::responseError($data);
    }

}