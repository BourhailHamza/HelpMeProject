<?php

class ProfileRepository {
    
    public function __construct() {
        $this->connection = include_once __DIR__ . '/../db_connect.php';
    }
    
    public function newProfile(Profile $profile) {
        $query = "INSERT INTO profile (fk_email, username, profile_image, role) VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($query);
        
        try {
            $statement->execute([$profile->getFkEmail(), $profile->getUsername(), $profile->getProfileImage(), $profile->getRole()]);
            return $this->connection->lastInsertId();
        } catch (\Throwable $th) {
            return "Error trying to create this profile";
        }
    }
    
    public function updateProfile(Profile $profile) {
        $query = "UPDATE profile SET fk_email = ?, username = ?, profile_image = ?, role = ? WHERE idProfile = ?";
        $statement = $this->connection->prepare($query);

        try {
            $statement->execute([$profile->getFkEmail(), $profile->getUsername(), $profile->getProfileImage(), $profile->getRole(), $profile->getIdProfile()]);
            return "Profile updated successfully";
        } catch (\Throwable $th) {
            return "Error trying to update this profile";
        }
    }
    
    public function deleteProfile(Profile $profile) {
        $query = "DELETE FROM profile WHERE idProfile = ?";
        $statement = $this->connection->prepare($query);

        try {
            $statement->execute([$profile->getIdProfile()]);
            return "Profile deleted successfully";
        } catch (\Throwable $th) {
            return "Error trying to delete this profile";
        }
    }
    
    public function getProfilesByEmail($email) {
        $host = 'localhost';
        $dbName = 'forum';
        $username = 'root';
        $password = '';

        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $username, $password);
        
        $query = "SELECT * FROM profile WHERE fk_email = ?";

        $request = $db->prepare($query);
        $request->execute([$email]);
    
        $profiles = [];
    
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $profiles[] = new Profile($row['id_profile'], $row['fk_email'], $row['username'], $row['profile_image'], $row['role']);
        }
    
        return $profiles;
    }
    
    public function getProfileByUsername($username) {
        $host = 'localhost';
        $dbName = 'forum';
        $user = 'root';
        $password = '';

        $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $password);

        $query = "SELECT * FROM profile WHERE username = ?";
        $request = $db->prepare($query);
        $request->execute([$username]);
        
        $row = $request->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return new Profile($row['id_profile'], $row['fk_email'], $row['username'], $row['profile_image'], $row['role']);
        }
        
        return null;
    }
    
}
