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
        
        $average_grade = $this->calculateGradesAverage($this->student->grades);
        $final_result = $this->claculateFinalResult();
        $this->response_data = ['student' => $this->student, 'average_grade' => $average_grade, 'final_result' => $final_result];
        return $this->response_data;
    }
    
    public function calculateGradesAverage($grades)
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
        else{
            $count = count($this->student->grades);
            $grade_objects_array = $this->student->grades;
            $max_grade = $this->getMaxGrade();
            $min_grade = $this->getMinGrade();

            if($count > 2){
                foreach($grade_objects_array as $key=>$grade){
                    if($min_grade == $grade->value){
                        unset($grade_objects_array[$key]);
                    }
                }
                if($max_grade < 8){
                return 'Failed';
                }
                return 'Passed';
            }
            else{
                if($max_grade < 8){
                return 'Failed';
                }
                return 'Passed';
            }
        }
    }
    
    
    public function getMaxGrade()
    {
        $grade_values_array = [];
        foreach($this->student->grades as $grade){
            $grade_values_array[] = $grade->value;
        }
        
        return max($grade_values_array);
    }
    
    public function getMinGrade()
    {
        $grade_values_array = [];
        foreach($this->student->grades as $grade){
            $grade_values_array[] = $grade->value;
        }
        
        return min($grade_values_array);
    }
    
}

