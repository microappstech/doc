<?php

class LoginService {
    private $pdo ;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function login($username, $password) {
        $stmp = $this->pdo->prepare("select * from users where username = ?");
        $stmp->execute([$username]);
        $user = $stmp->fetch(PDO::FETCH_ASSOC);
        if($user != null && password_verify($password, $user["password"])) {
            return $user;
        }else{
            return false;
        }

    }
}