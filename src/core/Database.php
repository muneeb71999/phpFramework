<?php

/**
 * The Database class
 * 
 * => It is responsible for database operations such as connecting to 
 *    database and quering the database
 */

class Database
{

    private $host = HOST;
    private $db_name = DBNAME;
    private $username = USERNAME;
    private $password = PASSWORD;
    private $dbh;
    private $stmt;

    public function __construct()
    {

        $dsn = "mysql:host=$this->host;dbname=$this->db_name";
        $options = [
            PDO::ATTR_PERSISTENT  => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {

            // Creata a new Connection to the Database
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    // query the database with SQL Statment
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // bind the named paramters in the SQL Statment
    public function bind($param, $value, $type = null)
    {

        if (is_null($type)) {

            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the current query
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Get the list of the result
    public function getMany()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    // Get only one result from database
    public function getOne()
    {
        $this->execute();
        return $this->stmt->fetch();
    }

    // Counts the number of rows in result
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
