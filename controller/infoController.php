<?php
include_once ("../service/TGradeService.php");
class InfoController {
    private TGradeService $tGradeService;

    public function __construct()
    {
        $this->tGradeService = new TGradeService();
    }

    public function getStudentGradeList(){
        echo json_encode($this->tGradeService->queryAll());
    }
    public function getStudentGradeById($id){
        echo json_encode( $this->tGradeService->queryBySno($id));
    }
}