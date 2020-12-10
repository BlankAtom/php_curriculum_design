<?php

class InfoMapper {
    private $queryAll_Sql;
    public function __construct()
    {
        $this->queryAll_Sql = "select * from student";
    }
    public function queryAll(){
        return $this->queryAll_Sql;
    }
}