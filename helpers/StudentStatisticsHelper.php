<?php

class StudentStatisticsHelper {
    
    
    public $student;
    public $response_data = [];
    
    public function __construct($student)
    {
        $this->student = $student;
    }
    
    
    public function calculateStatistics()
    {
        
        $average_grade = $this->calculateGradesaverage($this->student->grades);
        $final_result = $this->claculateFinalResult();
        $this->response_data = ['student' => $this->student, 'average_grade' => $average_grade, 'final_result' => $final_result];
        return $this->response_data;
    }
    
    public function calculateGradesaverage($grades)
    {
        
        $count = count($grades);
        $value = 0;
        foreach($grades as $grade){
            $value += $grade->value;
        }
        
        $average_value = $value/$count;
        
        return $average_value;
        
    }
    
    public function claculateFinalResult()
    {
        if($this->student->board_id == 1){
            $average = $this->calculateGradesaverage($this->student->grades);
            if($average < 7){
                return 'Failed';
            }
            return 'Passed';
        }
        
    }
    
}

