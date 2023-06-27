<?php

namespace App\Entity;

class Message {
    
    private $idMessage;
    private $fkIdTopic;
    private $message;
    private $creationDate;

    public function __construct($idMessage, $fkIdTopic, $message, $creationDate) {
        $this->idMessage = $idMessage;
        $this->fkIdTopic = $fkIdTopic;
        $this->message = $message;
        $this->creationDate = $creationDate;
    }

    public function getIdMessage() {
        return $this->idMessage;
    }

    public function setIdMessage($idMessage) {
        $this->idMessage = $idMessage;
    }

    public function getFkIdTopic() {
        return $this->fkIdTopic;
    }

    public function setFkIdTopic($fkIdTopic) {
        $this->fkIdTopic = $fkIdTopic;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

}
