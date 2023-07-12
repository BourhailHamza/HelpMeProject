<?php

class AccountRepository {
    
    public function __construct() {
        $this->connection = include_once __DIR__ . '/../db_connect.php';
    }
    
    public function newAccount(Account $account) {
        $query = "INSERT INTO account (email, password, creation_date) VALUES (?, ?, ?)";
        $request = $this->connection->prepare($query);
        
        try {
            $request->execute([$account->getEmail(), $account->getPassword(), $account->getCreationDate()]);
            return $this->connection->lastInsertId();
        } catch (\Throwable $th) {
            return "Error trying to create this account";
        }
    }
    
    public function updateAccount(Account $account) {
        $query = "UPDATE account SET email = ?, password = ?, creation_date = ? WHERE email = ?";
        $statement = $this->connection->prepare($query);

        try {
            $statement->execute([$account->getEmail(), $account->getPassword(), $account->getCreationDate(), $account->getEmail()]);
            return "Account updated successfully";
        } catch (\Throwable $th) {
            return "Error trying to update this account";
        }
    }
    
    public function deleteAccount(Account $account) {
        $query = "DELETE FROM account WHERE email = ?";
        $statement = $this->connection->prepare($query);

        try {
            $statement->execute([$account->getEmail()]);
            return "Account deleted successfully";
        } catch (\Throwable $th) {
            return "Error trying to delete this account";
        }
        
    }
    
    public function getAccountByEmail($email) {
        $query = "SELECT * FROM account WHERE email = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$email]);
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return new Account($row['email'], $row['password'], $row['creation_date']);
        }
        
        return null;
    }

    public function getAllAccounts() {
        $query = "SELECT * FROM account";
        $statement = $this->connection->prepare($query);
        $statement->execute();
    
        $accounts = [];
    
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $accounts[] = new Account($row['email'], $row['password'], $row['creation_date']);
        }
    
        return $accounts;
    }
    
}