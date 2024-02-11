<?php 
class Quiz{
    public $Id;
    public $Name;
    public $Description;
    public $Image ;
    public $Questions;
    public function __construct($id,$name,$dec,$image , $questions = null){
        $this->Id = $id;
        $this->Name = $name;
        $this->Description = $dec;
        $this->Image = $image;
        $this->Questions = $questions;
    }
}