<?php
class DB {
    private PDO $dbConnect;

    function __construct() {
        try {
            $this->dbConnect = new PDO(
                'mysql:host=localhost; dbname=project',
            'root',
            ''
            );
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    /**
     * @return PDO
     */
    public function getDbConnect(): PDO
    {
        return $this->dbConnect;
    }

    /**
     * @param PDO $dbConnect
     */
    public function setDbConnect(PDO $dbConnect)
    {
        $this->dbConnect = $dbConnect;
    }
}