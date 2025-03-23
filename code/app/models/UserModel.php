<?php

class UserModel {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getUserByUsername($username): ?array{
        $statement = $this->db->prepare(<<<sql
            SELECT * 
            FROM users 
            WHERE username = :username
        sql);
        $statement->bindValue(':username', $username);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    

    /**
     * Creates a user in the database.
     * 
     * @param array{username, email, password, image, bio} $userData
     * @return void
     */
    public function createUser(array $userData) {
        // still TODO: insert profile picture
        $imageBlob = file_get_contents($userData['image']['tmp_name']);
        $statement = $this->db->prepare(<<<SQL
            INSERT INTO users(username, email, password, profile_picture, user_bio)
            VALUES(?, ?, ?, ?, ?);
        SQL);
        $statement->bindValue(1, $userData['username']);
        $statement->bindValue(2, $userData['email']);
        $statement->bindValue(3, $userData['password']);
        $statement->bindValue(4, $imageBlob); 
        $statement->bindValue(5, $userData['bio']);
        $statement->execute();
    }

    /**
     * Updates an existing user's data in the database
     * 
     * @param array{username, email, password, image, bio} $userData
     * @return void
     */
    public function updateUser(array $userData) {

    }

    /**
     * Returns an array of string usernames
     * @return array
     */
    public function getAllUsernames(): array {
        //for admin dashboard stuff, for example
        return [];
    }

    /**
     * @param string $email 
     * @param string $password
     * @return
     * Array representing an existing user matching the passed email and password, or null
     * if there is not a match.
     */
    public function validateUserLogin(string $email, string $password): ?array {
        $statement = $this->db->prepare(<<<SQL
            SELECT * 
            FROM users
            WHERE email = :email
        SQL);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['password'] === $password) {
            return $result;
        }
        return null;
    }
}

?>
