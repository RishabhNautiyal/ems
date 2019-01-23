<!DOCTYPE html>
<html>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}
$sql="CREATE TABLE events
(EventId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Theme VARCHAR(30) NOT NULL,
Event_Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP())";
if($conn->query($sql)===TRUE)
{
	echo "THE TABLE CREATE SUCCESSFULLY";
}
else
{
	echo "ERROR CREATING TABLE";
}
$conn->close();
?>
</html>