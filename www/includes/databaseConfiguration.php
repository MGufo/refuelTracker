<?php
require_once("./includes/Database.php");
require_once("./includes/UsersDataManager.php");
require_once("./includes/FuelDataManager.php");

$db_connection = (new Database("localhost", "root","toor", "refuelTracker"))->connect();
$usersDataManager = new UsersDataManager($db_connection);
$fuelDataManager= new FuelDataManager($db_connection);

?>
