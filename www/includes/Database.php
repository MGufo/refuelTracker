<?php
include_once("DBConnection.php");
//Classe che modella un'istanza di DB, rappresentata dai seguenti campi dati 
class Database {
    private $HOST_DB;
    private $USER;
    private $PWD;
    private $DB_NAME;
    
    function __construct($HOST_DB, $USER, $PWD, $DB_NAME){
        $this->HOST_DB = $HOST_DB;
        $this->USER = $USER;
        $this->PWD = $PWD;
        $this->DB_NAME = $DB_NAME;
    }

    /*
    outputs:
        DBConnection $connection
    */
    public function connect (){
        return new DBConnection(new mysqli($this->HOST_DB, $this->USER, $this->PWD, $this->DB_NAME));
    }
}   
?>
