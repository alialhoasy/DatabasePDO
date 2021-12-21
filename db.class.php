<?php

// By Ali Alhoasy

class Database
{

    private $connection = null;

    // this function is called everytime this class is instantiated     
    public function __construct($dbhost = "localhost", $dbport = '', $dbname = "dbname", $username = "username", $password = "password")
    {
        $option = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        try {

            $this->connection = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname};", $username, $password, $option);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Insert a row/s in a Database Table
    public function Insert($statement = "", $parameters = [])
    {
        try {

            $this->executeStatement($statement, $parameters);
            return $this->connection->lastInsertId();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Select a row/s in a Database Table
    public function FetchAll($statement = "", $parameters = [])
    {
        try {

            $stmt = $this->executeStatement($statement, $parameters);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function RowCountData($statement = "", $parameters = [])
    {
        try {

            $stmt = $this->executeStatement($statement, $parameters);
            return $stmt->rowCount();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function Fetch($statement = "", $parameters = [])
    {
        try {

            $stmt = $this->executeStatement($statement, $parameters);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    // Update a row/s in a Database Table
    public function Update($statement = "", $parameters = [])
    {
        try {

            $this->executeStatement($statement, $parameters);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Remove a row/s in a Database Table
    public function Remove($statement = "", $parameters = [])
    {
        try {

            $this->executeStatement($statement, $parameters);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // execute statement
    private function executeStatement($statement = "", $parameters = [])
    {
        try {

            $stmt = $this->connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;
        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }
}

$db = new Database('localhost', '3306', 'test', 'root', '');
