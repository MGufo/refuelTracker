<?php

require_once("./includes/DBConnection.php");
require_once("./includes/Refuel.php");
require_once("./includes/sessionManager.php");

class FuelDataManager{
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    private function fromRecordToObj($record){
        return new Refuel(
            $record['ID_refuel'],
            $record['Type'],
            $record['ID_user'],
            $record['Date'],
            $record['Cost'],
            $record['Cost/L'],
            $record['Liters'],
            $record['Kms']
        );
    }

    private function fromObjToRecord($refuel){
        $record = array(
            'Type' => $refuel->getType(),

            'Date' => $refuel->getDate(),
            'Cost' => $refuel->getCost(),
            'Cost/L' => $refuel->getCostL(),
            'Liters' => $refuel->getLiters(),
            'Kms' => $refuel->getKms()
        );

        if(!is_null($refuel->getId())) $record['ID_refuel'] = $refuel->getId();

    }
}
?>