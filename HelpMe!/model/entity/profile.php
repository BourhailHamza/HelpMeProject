<?php

class Profile {

    private $fkEmail;
    private $username;
    private $profileImage;
    private $role;

    public function __construct($fkEmail, $username, $profileImage, $role) {
        $this->fkEmail = $fkEmail;
        $this->username = $username;
        $this->profileImage = $profileImage;
        $this->role = $role;
    }

    public function getFkEmail() {
        return $this->fkEmail;
    }

    public function setFkEmail($fkEmail) {
        $this->fkEmail = $fkEmail;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getProfileImage() {
        return $this->profileImage;
    }

    public function setProfileImage($profileImage) {
        $this->profileImage = $profileImage;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

}