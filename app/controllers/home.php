<?php

class Home extends Controller
{
    function index($page = '')
    {
        $DB = new Database();
        $data['page_title'] = "PAGE TITLE";
        $this->view("home", $data);
    }
}