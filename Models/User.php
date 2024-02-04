<?php 

    class User {
        private $id;
        private $name;
        private $email;
        private $password;
        private $username;
        private $linkedin;
        private $github;
        private $website;
        public function __construct($id, $name, $email, $password, $username, $git, $link, $port) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->username = $username;
            $this->linkedin = $link;
            $this->github = $git;
            $this->website = $port;
        }
    }