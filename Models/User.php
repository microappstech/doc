<?php 

    class User {
        private $id;
        private $name;
        private $email;
        private $password;
        private $username;
        public function __construct($id, $name, $email, $password, $username) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->username = $username;
        }
    }