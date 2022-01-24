<?php
require_once 'config.php';

class Database
{
    private $username;
    private $password;
    private $host;
    private $database;

    /**
     * @param $username
     * @param $password
     * @param $host
     * @param $database
     */
    public function __construct()
    {
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
    }


    public function connect(){
        try{
            $conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode" => "preefer"]
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        }catch(PDOException $e){
            die("Connection failed:".$e->getMessage());

        }
    }

}


