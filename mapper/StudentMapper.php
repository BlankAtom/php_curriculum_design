<?php


class StudentMapper{
    public string $queryAll_Sql = "select * from student.student";

    public function __construct()
    {
        echo " Mapper<br>";
    }
}