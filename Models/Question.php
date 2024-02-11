<?php
class Question {
    public $Id;
    public $QuizId;
    public $Description;
    public $Answers ;

    public function __construct($id,$QuizId,$desc, $Answers = null){
        $this->Id = $id;
        $this->QuizId = $QuizId;
        $this->Description = $desc;
        $this->Answers = $Answers;
    }
}