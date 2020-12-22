
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php
define('APPPATH', trim(__DIR__.'/'));

$root = $_SERVER['SCRIPT_NAME'];
$request = $_SERVER['REQUEST_URI'];
echo "root:".$root."<br>";
echo "request:".$request."<br>";
$URI = array();

$url = trim(str_replace($root, '', $request), '/');
echo "url:".$url."<br>";

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


