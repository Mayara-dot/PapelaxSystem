<?php
class DB_CONNECT
{
    private $con;

    function __construct() {
        $this->connect();
    }

    function connect()
    {
        require_once (__DIR__.'/../../PHP/db_config.php');
        $this->con = mysqli_connect(HOST, USER, PASSWORD,DB) or die();
    }

    function getConnection()
    {
        return $this->con;
    }

}