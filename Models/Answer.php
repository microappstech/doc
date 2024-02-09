<?php 
class Answer{
    public $Id ; 
    public $Description;
    public $QuestId;
    public function __construct($id,$dec,$quid){
        $this->Id = $id;
        $this->Description =$dec;
        $this->QuestId = $quid;
    }
}