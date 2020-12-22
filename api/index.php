<?php
include_once ("../route/Route.php");

define("AppPath", trim(__DIR__."/"));

$root = $_SERVER['SCRIPT_NAME'];
$request = $_SERVER['REQUEST_URI'];

$URL = array();

$url = trim(str_replace($root, '', $request), '/');

Route::url_parse( explode('/', $url));

