<?php 
class Quiz{
    public $Id;
    public $Name;
    public $Description;
    public $Image ;

    public function __construct($id,$name,$dec,$image){
        $this->Id = $id;
        $this->Name = $name;
        $this->Description = $dec;
        $this->Image = $image;
    }
}