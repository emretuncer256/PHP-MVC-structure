<?php

class App
{
    protected $_controller = "home";
    protected $_method = "index";
    protected $_params = [];

    public function __construct()
    {
        $url = $this->splitUrl();
        if (file_exists("../app/controllers/" . strtolower($url[0]) . ".php")) {
            $this->_controller = strtolower($url[0]);
            unset($url[0]);
        }
        require "../app/controllers/" . $this->_controller . ".php";
        $this->_controller = new $this->_controller;

        if (isset($url[1])) {
            if (method_exists($this->_controller, $url[1])) {
                $this->_method = $url[1];
                unset($url[1]);
            }
        }
        $this->_params = array_values($url);
        call_user_func_array([$this->_controller, $this->_method], $this->_params);
    }


    private function splitUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
    }

}