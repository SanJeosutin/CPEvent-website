<?php
require_once('DotEnv.class.php');
(new DotEnv(__DIR__ . '/../../.env'))->load();

class DatabaseHandler{
    private $connection;
    private $host;
    private $user;
    private $password;
    private $db_name;
    private $db_dns;

    public function __construct(){
        $this->host = getenv('DB_HOST');
        $this->user = getenv('DB_USER');
        $this->password = getenv('DB_PASSWORD');
        $this->db_name = getenv('DB_NAME');
        $this->dns = sprintf('mysql:dbname=%s;host=%s', $this->db_name, $this->host); 

        try{
            $this->connection = new PDO(
                $this->dns,
                $this->user,
                $this->password
            );
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function disconnect(){
        $this->connection = null;
    }

    public function exec($query){
        if(!$this->_isConnect()) return;
        $this->connection->exec($query);
    }

    private function _isConnect(){
        if(!$this->connection) return false;
    }
}
?>