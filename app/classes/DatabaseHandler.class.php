<?php
require_once('DotEnv.class.php');
(new DotEnv(__DIR__ . '/../../.env'))->load();

class DatabaseHandler{
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
            return $e->getMessage();
        }
    }

    public function disconnect(){
        $this->connection = null;
    }

    public function exec($query){
        if(!$this->_isConnect()) return;
        $statement = $this->connection->prepare($query);
        return $statement->execute();
    }

    public function isExist($statement){
        $result = $this->connection->prepare($statement);
        $result->execute();

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    private function _isConnect(){
        if(!$this->connection) return false;
        return true;
    }
}
?>