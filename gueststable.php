<!DOCTYPE html>
<html>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection Failed:".$conn->connect_error);
}
$sql="CREATE TABLE guests
(GuestID INT(8) NOT NULL,
Guestname VARCHAR(50) NOT NULL,
EmailId VARCHAR(50) NOT NULL)";
if($conn->query($sql)===TRUE){
	echo "THE TABLE CREATED SUCCESSFULLY";
}
else
{
	echo "ERROR CREATING TABLE".$conn->error;
}
$conn->close();
?>
</html>