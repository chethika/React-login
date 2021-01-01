<?php
$url='localhost';
$username='root';
$password='';
$dbname = "mydb";
$conn= new mysqli($url, $username, $password, $dbname);
if($con->connect_error){
 die('Could not Connect My Sql:' .mysql_error());
}
?>