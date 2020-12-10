<?php


class Student {
    public $sno;
    public $sname;
    public $ID_CARD;

    public function __construct($sno, $sname, $ID_CARD)
    {
        $this->sno = $sno;
        $this->sname = $sname;
        $this->ID_CARD = $ID_CARD;
    }


}