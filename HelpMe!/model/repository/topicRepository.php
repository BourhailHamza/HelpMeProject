<?php

class TopicRepository {
    
    public function __construct() {
        $this->connection = include_once __DIR__ . '/../db_connect.php';
    }
    
    public function newTopic(Topic $topic) {
        $host = 'localhost';
        $dbName = 'forum';
        $username = 'root';
        $password = '';

        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $username, $password);

        $query = "INSERT INTO topic (fk_id_profile, title, description, creation_date) VALUES (?, ?, ?, ?)";
        $statement = $db->prepare($query);
        
        try {
            $statement->execute([$topic->getFkIdProfile(), $topic->getTitle(), $topic->getDescription(), $topic->getCreationDate()]);
            return $this->connection->lastInsertId();
        } catch (\Throwable $th) {
            return "Error trying to create this topic";
        }
    }
    
    public function updateTopic(Topic $topic) {
        $query = "UPDATE topic SET fk_id_profile = ?, title = ?, description = ?, creation_date = ? WHERE id_topic = ?";
        $statement = $this->connection->prepare($query);

        try {
            $statement->execute([$topic->getFkIdProfile(), $topic->getTitle(), $topic->getDescription(), $topic->getCreationDate(), $topic->getIdTopic()]);
            return "Topic updated successfully";
        } catch (\Throwable $th) {
            return "Error trying to update this topic";
        }
    }
    
    public function deleteTopic($idTopic) {
        $host = 'localhost';
        $dbName = 'forum';
        $username = 'root';
        $password = '';

        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $username, $password);

        $query = "DELETE FROM topic WHERE id_topic = ?";
        $statement = $db->prepare($query);

        try {
            $statement->execute([$idTopic]);
            return "Topic deleted successfully";
        } catch (\Throwable $th) {
            return "Error trying to delete this topic";
        }
    }
    
    public function getTopicsByProfileId($profileId) {
        $query = "SELECT * FROM topic WHERE fk_id_profile = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$profileId]);
    
        $topics = [];
    
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $topics[] = new Topic($row['id_topic'], $row['fk_id_profile'], $row['title'], $row['description'], $row['creation_date']);
        }
    
        return $topics;
    }
    
    public function getTopicById($topicId) {
        $query = "SELECT * FROM topic WHERE id_topic = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$topicId]);
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return new Topic($row['id_topic'], $row['fk_id_profile'], $row['title'], $row['description'], $row['creation_date']);
        }
        
        return null;
    }

    public function getAllTopics() {
        $host = 'localhost';
        $dbName = 'forum';
        $username = 'root';
        $password = '';

        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $username, $password);

        $query = "SELECT * FROM topic";
        $statement = $db->prepare($query);
        $statement->execute();
    
        $topics = [];
    
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $topics[] = new Topic($row['id_topic'], $row['fk_id_profile'], $row['title'], $row['description'], $row['creation_date']);
        }
    
        return $topics;
    }
    
}
