<?php

class Home extends Controller
{
    function index($page = '')
    {
        $DB = new Database();
        $data['result'] = $DB->read("SELECT * FROM images");
        $data['page_title'] = "PAGE TITLE";
        $this->view("home", $data);
    }
}