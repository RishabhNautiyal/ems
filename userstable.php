<!DOCTYPE html>
<html>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}
$sql1 ="CREATE TABLE users
(Userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(40) NOT NULL,
Role VARCHAR(40) NOT NULL,
EmailID VARCHAR(100) NOT NULL,
MobileNo VARCHAR(11),
Username VARCHAR(40) NOT NULL ,
Password VARCHAR(40) NOT NULL,
Reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP())";
if($conn->query($sql1) === TRUE)
{
	echo"THE TABLE HAS BEEN CREATED SUCCESSFULLY";
}
else{
	echo"ERROR CREATING TABLE".$conn->error;
}
$conn->close();
?>
</html>