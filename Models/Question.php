<?php
class Question {
    public $Id;
    public $QuizId;
    public $Description;

    public function __construct($id,$QuizId,$desc){
        $this->Id = $id;
        $this->QuizId = $QuizId;
        $this->Description = $desc;
    }
}