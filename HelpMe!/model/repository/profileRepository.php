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
    
    public function getProfileById($id) {
        $query = "SELECT * FROM profile WHERE idProfile = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$id]);
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return new Profile($row['idProfile'], $row['fk_email'], $row['username'], $row['profile_image'], $row['role']);
        }
        
        return null;
    }
    
    public function getProfileByUsername($username) {
        $query = "SELECT * FROM profile WHERE username = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$username]);
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return new Profile($row['idProfile'], $row['fk_email'], $row['username'], $row['profile_image'], $row['role']);
        }
        
        return null;
    }
    
}
