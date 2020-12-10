<?php

class BaseService {
    protected $conn;


    protected function connect($host, $user, $pwd, $dbname){
        $conn = mysqli_connect($host, $user, $pwd, $dbname, 3306);
        if( $conn == false ){
            echo "connect error  ";
        }
        $this->conn = $conn;
    }

    protected function query($sql): array
    {
        return mysqli_fetch_all( mysqli_query($this->conn, $sql), MYSQLI_ASSOC );
    }

    protected function close() {
        mysqli_close($this->conn);
    }
}