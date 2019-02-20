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
$sql= "ALTER TABLE guests ADD Invitees varchar(40) ";
$row=$conn->query($sql);
if($row===TRUE)
{
	
	echo "THE COLUMN AddED SUCCESSFULLY";
}
else
{
	echo "Error creating database: " . $conn->error;
}
$conn->close();
?>
</html>