<?php

namespace App\Entity;

class Account {

    private $email;
    private $password;
    private $creationDate;

    public function __construct($email, $password, $creationDate) {
        $this->email = $email;
        $this->password = $password;
        $this->creationDate = $creationDate;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }
    
}