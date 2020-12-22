<?php
include_once ("../mapper/TotalGradeViewMapper.php");
class TGradeService extends BaseService {
    private TotalGradeViewMapper $totalMapper;
    public function __construct()
    {
        parent::__construct();
        $this->totalMapper = new TotalGradeViewMapper();
    }

    public function queryAll(): array
    {
        $this->connectDatabase();

        $row = $this->query($this->totalMapper->sql["queryAll"]);
        $data = array();
        foreach ( $row as $item ){
            $grade = new StudentTotalGrade(
                $this->totalMapper->column_name[0],
                $this->totalMapper->column_name[0],
                $this->totalMapper->column_name[0]
            );
            $data[] = $grade;
        }
        $this->close();
        return $data;
    }

    public function queryBySno($sno): array
    {
        $this->connectDatabase();

        $sql = $this->totalMapper->sql["queryBySno"];
        $sql = str_replace("?",$sno,$sql);

        $row = $this->query($sql);
        $data = array();
        foreach ( $row as $item ){
            $grade = new StudentTotalGrade(
                $this->totalMapper->column_name[0],
                $this->totalMapper->column_name[0],
                $this->totalMapper->column_name[0]
            );
            $data[] = $grade;
        }
        $this->close();
        return $data;
    }
}