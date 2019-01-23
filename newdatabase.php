<!DOCTYPE html>
<html>
<?php
$servername="localhost";
$username="root";
$password="";
$conn= new mysqli($servername,$username,$password);
if($conn->connect_error){
	die("Connection Failed:".$conn->connect_error);
}
$sql= "CREATE DATABASE MYDATABASE";
if ($conn->query($sql)===TRUE){
	echo "DATABASE CREATED SUCCESSFULLY";
}
else{
	echo "ERROR CREATING DATABASE";
}
$conn->close();
?>
</html>