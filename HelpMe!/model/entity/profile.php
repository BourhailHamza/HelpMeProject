<?php

namespace App\Entity;

class Profile {

    private $idProfile;
    private $fkEmail;
    private $username;
    private $profileImage;
    private $role;

    public function __construct($idProfile, $fkEmail, $username, $profileImage, $role) {
        $this->idProfile = $idProfile;
        $this->fkEmail = $fkEmail;
        $this->username = $username;
        $this->profileImage = $profileImage;
        $this->role = $role;
    }

    public function getIdProfile() {
        return $this->idProfile;
    }

    public function setIdProfile($idProfile) {
        $this->idProfile = $idProfile;
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