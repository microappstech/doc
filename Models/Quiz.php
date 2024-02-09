<?php 
class Quiz{
    public $Id;
    public $Name;
    public $Description;

    public function __construct($id,$name,$dec){
        $this->Id = $id;
        $this->Name = $name;
        $this->Description = $dec;
    }
}