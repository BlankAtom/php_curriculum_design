<?php

class TotalGradeViewMapper{

    public array $column_name = ["sno", "cno", "total"];
    public array $sql = [
        "queryAll" => "select * from student.scg_view",
        "queryBySno" => "select * from student.scg_view where sno = ?"
    ];
}