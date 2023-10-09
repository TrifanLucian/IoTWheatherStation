<?php
class Meteo{
	public $link='';
	function __construct($temperature, $humidity, $pressure){
		$this->connect();
		$this->storeInDb($temperature, $humidity, $pressure);
	}
	
	function connect() {
		//$this->link = mysqli_connect("localhost", "root", "", "arduino") or die('Cannot connect to the DB');
	$this->link = mysqli_connect("fdb1030.awardspace.net", "4294037_arduino", "Abcd1234", "4294037_arduino") or die('Cannot connect to the DB');
	}
	
	function storeInDb($temperature, $humidity, $pressure){
		$query = "insert into sensordata2 set boardTEMP='" .$temperature. "', boardHUMID='" .$humidity. "', boardPRES='" .$pressure. "'";
		$result = mysqli_query($this->link, $query) or die('Eroare query: '.$query);
	}
}
	
	if($_GET['temperature'] != '' and $_GET['humidity'] != '' and $_GET['pressure'] != ''){
		$meteo = new Meteo($_GET['temperature'], $_GET['humidity'], $_GET['pressure']);
	}
	
	?>
