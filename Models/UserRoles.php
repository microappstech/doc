<?php 
class UserRoles{
    public $UserId;
    public $RoleId;
    public  function __construct($uid,$rid)
    {
        $this->UserId = $uid;
        $this->RoleId = $rid;
    }
}