<?php
include ("../service/StudentService.php");
//require_once ("../service/StudentService.php");
require_once ("Controller.php");

#[Controller(url: "/api/hello", method: "get")]
class Hello {
    public string $str = "hello";
    public function index() {
        $service = new StudentService();
        $data = $service->queryAll();
        echo json_encode($data);
    }
    public function name($name) {
        echo "hello ". json_encode($name);
    }
}