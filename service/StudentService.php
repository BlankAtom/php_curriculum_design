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
        $row = $this->query($this->studentMapper->queryAll_Sql);
        $data = array();
        foreach ( $row as $item) {
            $stu = new Student($item["sno"], $item["sname"], $item["idcard"]);
            $data[] = $stu;
        }
        $this->close();;
        return $data;
    }

//    /**
//     * @return mixed
//     */
//    public function querySCG(): array
//    {
////        $this->connect();
//    }

    /**
     * 连接数据库
     */
    protected function connectDatabase(){
        $this->connect($this->host, $this->user, $this->pwd, $this->database);
    }
}
