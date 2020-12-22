<?php

include_once ("../controller/hello.php");
include_once ("../controller/infoController.php");

class Route {

    public static function url_parse(array $url) {

        $class = "hello";
        $func = "index";
        $param = "0";
        if( count($url)>0){
            $class = $url[0];
            $func = "index";
        }
        if( count($url)>1){
            $func = $url[1];
        }
        if (count($url) > 2) {
            $param = $url[2];
        }


        $obj = Route::makeFactory($class);
        call_user_func(array($obj, $func), $param);

    }

    public static function makeFactory($classname): Object
    {
        switch ($classname) {
            case "hello":
                return new Hello();
            case "info":
                return new InfoController();
        }
    }
}