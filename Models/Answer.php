<?php 
class Answer{
    public $Id ; 
    public $Description;
    public $QuestId;
    public $IsOk;
    public function __construct($id,$dec,$quid, $isok){
        $this->Id = $id;
        $this->Description =$dec;
        $this->QuestId = $quid;
        $this->IsOk =$isok;
    }
}