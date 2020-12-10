<?php
define('APPPATH', trim(__DIR__.'/'));

$root = $_SERVER['SCRIPT_NAME'];
$request = $_SERVER['REQUEST_URI'];

$URI = array();

$url = trim(str_replace($root, '', $request), '/');

echo "url: " . $url . "<br>";
if(empty($url)) {
    $class = 'index';
    $func = 'welcome';
    echo "empty";
}
else {
    $URI = explode('/', $url);

    if( count($URI) < 2){
        $class = $URI[0];
        $func = 'index';
    }
    else {
        $class = $URI[0];
        $func = $URI[1];
    }
}

include ("controller/hello.php");
function makefactory($classname){
    switch ($classname) {
        case 'Hello':
            return new Hello();
    }
}

$obj = makefactory(ucfirst($class));
if (array_key_exists("Controller_Url", $GLOBALS) == false ){
    print_r("Null Controller"."\n"."<br>");
}
else {
    print_r( $GLOBALS["Controller_Url"]);

}
call_user_func(array($obj, $func));


