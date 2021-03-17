<?php
    
// Classe che modella una connessione a un database (cioè un'istanza della classe DB) 
class DBConnection {
    protected $mysqli_connection;

    function __construct($connection){
        $this->mysqli_connection = $connection;
        
    }

    public function isAlive(){
        return !$this->mysqli_connection->connect_errno && $this->mysqli_connection->ping();
    }

    public function hasAnyError(){
        return $this->mysqli_connection->connect_errno;
    }

    public function getAnyError(){
        return $this->mysqli_connection->error;
    }

    public function execUpdatingQuery($query){
        return $this->mysqli_connection->query($query);
    }

    public function execSelectionQuery($query){
        //Execute query
        $queryResult = $this->mysqli_connection->query($query);
       
        if(!$queryResult || $queryResult->num_rows == 0){
            return FALSE;
        }else{
            $result = array();
            while($row = $queryResult->fetch_assoc()){
                array_push($result, $row);
            }
            return $result;
        }
    }

    public function escapeString($str){
        return $this->mysqli_connection->real_escape_string($str);
    }
}
?>
