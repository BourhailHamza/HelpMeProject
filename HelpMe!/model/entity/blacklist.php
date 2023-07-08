<?php

class Blacklist {

    private $idBlacklist;
    private $fkEmail;
    private $creationDate;

    public function __construct($idBlacklist, $fkEmail, $creationDate) {
        $this->idBlacklist = $idBlacklist;
        $this->fkEmail = $fkEmail;
        $this->creationDate = $creationDate;
    }

    public function getIdBlacklist() {
        return $this->idBlacklist;
    }

    public function setIdBlacklist($idBlacklist) {
        $this->idBlacklist = $idBlacklist;
    }

    public function getFkEmail() {
        return $this->fkEmail;
    }

    public function setFkEmail($fkEmail) {
        $this->fkEmail = $fkEmail;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }
    
}
