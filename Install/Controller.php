<?php
namespace Install;
defined("APPPATH") OR die("Access denied");

class Controller{

    public function __construct(){
    	session_start();
    	    header("Location: /Home/");
    }

}
