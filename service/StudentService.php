<?php
//namespace service;
require_once ("pojo/Student.php");
include_once ("service/BaseService.php");
require_once ("mapper/StudentMapper.php");

class StudentService extends BaseService {
    private StudentMapper $studentMapper ;

    public function __construct(){
        parent::__construct();
        $this->studentMapper = new StudentMapper();
    }

    public function queryAll(): array
    {
        $this->connectDatabase();
        $row = $this->query($this->studentMapper->sql["queryAll"]);
        $data = array();
        foreach ( $row as $item) {
            $stu = new Student(
                $item[$this->studentMapper->column_name[0]],
                $item[$this->studentMapper->column_name[1]],
                $item[$this->studentMapper->column_name[2]]
            );
            $data[] = $stu;
        }
        $this->close();;
        return $data;
    }

}
