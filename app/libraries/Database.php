<?php


class Database
{

    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;


    /* A constructor that allows us to connect to the Database directly */
    public function __construct()
    {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;

        $options = array(
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {

            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {

            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /* A method that allows us to write prepared queries */
    public function query($sql)
    {

        $this->statement = $this->dbHandler->prepare($sql);
    }


    /* A method that allows us to bind values to prepared queries */
    public function bind($parameter, $value, $type = null)
    {

        switch (is_null($type)) {
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
        }

        $this->statement->bindValue($parameter, $value, $type);
    }



    /* A method that allows us to execute prepared statements */
    public function execute()
    {

        return $this->statement->execute();
    }


    /* A method that allows us to  return a single row from a table as an array*/
    public function single()
    {

        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    /* A method that allows us to fetch multiple rows from the database as an array result set */
    public function resultSet()
    {

        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    /* A method that allows us to get row count of a table */
    public function rowCount()
    {

        return $this->statement->rowCount();
    }
}
