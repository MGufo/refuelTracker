<?php

class Refuel {
    private $id;
    private $type;
    private $id_user;
    private $date;
    private $cost;
    private $cost_l;
    private $liters;
    private $kms;

    function __construct($id, $type, $id_user, $date, $cost, $cost_l, $liters, $kms){
        $this->id = $id;
        $this->type = $type;
        $this->id_user =  $id_user;
        $this->date = $date;
        $this->cost = $cost;
        $this->cost_l = $cost_l;
        $this->liters = $liters;
        $this->kms = $kms;
    }

    /*getters*/
	function getId(){return $this->id;}
	function getType(){return $this->type;}
	function getIdUser(){return $this->id_user;}
	function getDate(){return $this->date;}
	function getCost(){return $this->cost;}
    function getCostL(){return $this->cost_l;}
	function getLiters(){return $this->liters;}
	function getKms(){return $this->kms;}

/*setters*/
	function setId($id){$this->id = $id;}
    function setType($type){$this->type = $type;}
    function setIdUser($id_user){$this->id_user = $id_user;}
    function setDate($date){$this->date = $date;}
    function setCost($cost){$this->cost = $cost;}
    function setCostL($costL){$this->costL = $costL;}
    function setLiters($liters){$this->liters = $liters;}
    function setKms($kms){$this->kms = $kms;}
	

	function toString(){
		return
        "id:$this->id<br>
		tipologia:$this->tipologia<br>
		id_user:$this->id_user<br>
		date:$this->date<br>
		cost:".(!is_null($this->cost) ? $this->cost : "NULL")."<br>
        costL:".(!is_null($this->cost_l) ? $this->cost_l : "NULL")."<br>
        liters:".(!is_null($this->liters) ? $this->liters : "NULL")."<br>
        kms:".(!is_null($this->kms) ? $this->kms : "NULL");
	}
}

?>