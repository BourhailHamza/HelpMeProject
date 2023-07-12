<?php

class BlacklistRepository {
    
    public function __construct() {
        $this->connection = include_once __DIR__ . '/../db_connect.php';
    }
    
    public function blacklistProfile(Blacklist $blacklist) {
        $query = "INSERT INTO blacklist (fk_email, creation_date) VALUES (?, ?)";
        $statement = $this->connection->prepare($query);
        
        try {
            $statement->execute([$blacklist->getFkEmail(), $blacklist->getCreationDate()]);
            return $this->connection->lastInsertId();
        } catch (\Throwable $th) {
            return "Error trying to blacklist this profile";
        }
    }

    public function getBlacklistByEmail($email) {
        $query = "SELECT * FROM blacklist WHERE fk_email = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$email]);
        
        $blacklist = [];
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $blacklist[] = new Blacklist($row['idBlacklist'], $row['fk_email'], $row['creation_date']);
        }
        
        return $blacklist;
    }
    
}
