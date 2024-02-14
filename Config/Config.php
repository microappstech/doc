<?php 
$host="44.214.244.184";
$port=3306;
$socket="";
$user="fgvpfzkd_AdminDoc";
$password="Q!KYv9a*6e15Jq";
$dbname="fgvpfzkd_Doc2";


try{
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $ex){
	die("Connection failed : ". $ex->getMessage());
}
/* 
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="Doc";

// $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
// 	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

try{
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $ex){
	die("Connection failed : ". $ex->getMessage());
}
*/
