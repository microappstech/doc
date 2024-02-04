<?php 
    class Roles{
        public $RoleId ;
        public $RoleName;
        public function __construct($id , $name)
        {
            $this->RoleId = $id;
            $this->RoleName=$name;
        }   
    }