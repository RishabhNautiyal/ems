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
$sql="CREATE TABLE events_guests
(EventID INT(8) NOT NULL,
Theme VARCHAR(50) NOT NULL,
GuestID INT(8) NOT NULL,
Guestname VARCHAR(50) NOT NULL)";
if($conn->query($sql)===TRUE){
	echo "THE TABLE CREATED SUCCESSFULLY";
}
else
{
	echo "ERROR CREATING TABLE";
}
$conn->close();
?>
</html>
