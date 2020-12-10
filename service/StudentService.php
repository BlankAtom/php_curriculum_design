<?php
//namespace service;
require_once ("pojo/Student.php");
include_once ("service/BaseService.php");
require_once ("mapper/StudentMapper.php");

class StudentService extends BaseService {
    private StudentMapper $studentMapper ;
    private string $host = "localhost";
    private string $user = "root";
    private string $pwd = "123456";
    private string $database = "student";

    public function __construct(){
        $this->studentMapper = new StudentMapper();
    }

    public function queryAll(): array
    {
        $this->connect($this->host, $this->user, $this->pwd, $this->database);
        $row = $this->query($this->studentMapper->queryAll_Sql);
        $data = array();
        foreach ( $row as $item) {
            $stu = new Student($item["sno"], $item["sname"], $item["idcard"]);
            $data[] = $stu;
        }
        $this->close();;
        return $data;
    }
}
