<?php
require_once("DBConnection.php");

class UsersDataManager{
	private $connection;
	/*
    parameters:
        DBConnection $connection
    */
	function __construct($connection){
		$this->connection = $connection;
	}
	/*
	@override
	output:
		[r1,r2,r3,...rn]  dove ri = ["userID":value, "nameSurname":value, "mail":value, "phone":value, "companyName":value, "pIVA":value] , if no error occurred. False otherwise.
	*/
	function getUsers(){
		return $this->connection->execSelectionQuery("SELECT * FROM utenti");
	}

	/*
	output:
		["nameSurname":value, "mail":value, "password":value, "phone":value, "companyName":value, "pIVA":value] if the user with id = $id exits. False otherwise(or if a query error occurred).
	*/
	function getUserById($id){
		$result = $this->connection->execSelectionQuery("SELECT * FROM utente WHERE userID = $id");
		return $result ? $result[0] : False;
	}

	function isEmailInUse($mail){
		$result = $this->connection->execSelectionQuery("SELECT * FROM utente WHERE mail = '$mail'");
		return $result ? True : False;
	}

	/*
	output:
		the id if exists an user whose mail=$mail and password=$password
		False otherwise(or if an error occurred)

	*/
	function getUserIdForAuth($mail,$password){
		//(FUNZIONE DA MODIFICARE SE SI SCEGLIE DI HASHARE LA PASSWORD)
		$result = $this->connection->execSelectionQuery("SELECT userID FROM utente WHERE mail = '$mail' AND password = '$password'");
		return $result ? $result[0]['userID'] : False;
	}

	/*
	parameters:
		$utente = ['nameSurname'=>value,''tipologia'=>value 'mail'=>value, 'phone'=>value, 'companyName'=>value, 'pIVA'=>value]
	output:
		True if no error occurred, False otherwise.
	*/
	private function insertUtente($utente){

		foreach ($utente as $key => $value) {
			if(is_null($utente[$key])) unset($utente[$key]);
		}

		$query =  "INSERT INTO utente (".implode(',',array_keys($utente)).") VALUES('".implode("','",array_values($utente))."')";
		return $this->connection->execUpdatingQuery($query);
	}

	/*
	output:
		True if no error occurred, False otherwise.
	*/
	function insertUtentePrivato($mail,$password,$nameSurname,$phone){
		return $this->insertUtente(['tipologia'=>'P','mail'=>$mail,'password'=>$password,'nameSurname'=>$nameSurname,'phone'=>$phone,'companyName'=>NULL,'pIVA'=>NULL]);
	}

	/*
	output:
		True if no error occurred, False otherwise.
	*/
	function insertUtenteNonPrivato($mail,$password,$phone,$companyName,$pIVA){
		return $this->insertUtente(['tipologia'=>'NP','mail'=>$mail,'password'=>$password,'nameSurname'=>NULL,'phone'=>$phone,'companyName'=>$companyName,'pIVA'=>$pIVA]);
	}

	/*
	parameters:
		$toModify = [x1:value,x2:value,...xn:value] dove xi€{'nameSurname','pIVA','mail','password','companyName','pIVA'}
	output:
		True if no error occurred, False otherwise.
	*/
	function updateUtente($user){
		$id=$user['userID'];
		unset($user['userID']);
		$query = 'UPDATE utente SET ';
		foreach ($user as $key => $value) {
			$query.= "$key='$value',";
		}
		$query=rtrim($query,',')." WHERE userID=$id";
		return $this->connection->execUpdatingQuery($query);
	}

}

?>