<?php 
opcache_reset();
class Database{
    //127.0.0.1
    private  $host = "localhost";
    private  $db_type = "mysql";
    private  $db_name = "news_db";
    private  $user_name = "root";
    private  $password = "123456";
    public $pdo;
    
    function __construct()
    {
        $this->dsn =  "$this->db_type:host=$this->host;dbname=$this->db_name";
        $this->pdo = new PDO($this->dsn,$this->user_name,$this->password);
    }

    public function connect()
    {
        return $this->pdo;
    }

    
}

