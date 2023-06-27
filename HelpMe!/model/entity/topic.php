<?php

namespace App\Entity;

class Topic {

    private $idTopic;
    private $fkIdProfile;
    private $title;
    private $description;
    private $creationDate;

    public function __construct($idTopic, $fkIdProfile, $title, $description, $creationDate) {
        $this->idTopic = $idTopic;
        $this->fkIdProfile = $fkIdProfile;
        $this->title = $title;
        $this->description = $description;
        $this->creationDate = $creationDate;
    }

    public function getIdTopic() {
        return $this->idTopic;
    }

    public function setIdTopic($idTopic) {
        $this->idTopic = $idTopic;
    }

    public function getFkIdProfile() {
        return $this->fkIdProfile;
    }

    public function setFkIdProfile($fkIdProfile) {
        $this->fkIdProfile = $fkIdProfile;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

}