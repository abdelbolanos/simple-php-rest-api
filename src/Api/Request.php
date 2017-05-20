<?php
namespace Api;

class Request
{
    public $get = array();
    public $post = array();
    public $method = '';
    public $groupParams = array();
    public $rawPostData = array();

    public function __construct($get, $post, $method, $rawPostData)
    {
        $this->get = $get;
        $this->post = $post;
        $this->method = $method;
        $this->rawPostData = $rawPostData;
    }

    public function setGroupParams($arrayMatch)
    {
        $this->groupParams = array_filter(
            $arrayMatch,
            function ($key)
            {
                return (is_integer($key)) ? false : true;
            }, 
            ARRAY_FILTER_USE_KEY
        );
    }

    public function getGroupParams()
    {
        return $this->groupParams;
    }

}
