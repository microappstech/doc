<?php

class LoginService {
    private $pdo ;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function login($username, $password) {
        try{

            $stmp = $this->pdo->prepare("select * from users where username = ?");
            $stmp->execute([$username]);
            $user = $stmp->fetch(PDO::FETCH_ASSOC);
            if($user != null && password_verify($password, $user["password"])) {
                return $user;
            }else{
                return $user;
            }
        }catch(Exception $e){
            throw new Exception($e);
        }

    }
    public function logout() {
    }
    public function checkLogin($username, $password) {
    }
    public function Rgister($username, $password) {
        $stmp = $this->pdo->prepare("select * from users where username = ?");
        $stmp->execute(array($username));
        
        if($stmp->fetch(PDO::FETCH_ASSOC)!=null) {
            $message = "username already taken";
            return false;
        }
        else{
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmpI = $this->pdo->prepare("insert into users(username,password) values(?,?);");
        
            $stmpI->execute([$username, $hashPassword]);
            return true;
        }
    }
}