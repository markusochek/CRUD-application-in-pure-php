<?php 
class UserDB {
    private $dbConnect;

    function __construct($dbConnect) {
        $this->dbConnect = $dbConnect;
    }

    public function insertInto($user): bool
    {
        $query = '
        INSERT INTO users(password, email, token)
        VALUES (?, ?, ?)';

        $stmt = $this->dbConnect->prepare($query);
        $body = array_values((array) $user);

        if ($stmt->execute($body)) {
            return true;
        }
    }

    public function selectByPassword($password) {
        $query ="
        SELECT id
        FROM users
        WHERE password = '".$password."'";

        return $this->dbConnect->query($query)->fetchObject();
    }

    public function selectByToken($token) {
        $query ="
        SELECT id
        FROM users
        WHERE token = '".$token."'";

        return $this->dbConnect->query($query)->fetchObject();
    }

    public function updateToken(User $user)
    {
        $query = "UPDATE users
        SET token = '".$user->getToken()."'
        WHERE password = '".$user->getPassword()."'";
        return $this->dbConnect->query($query);
    }
}