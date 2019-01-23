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
$sql= "ALTER TABLE events ADD 
 EventDetails VARCHAR(100) NOT NULL 
  after Venue";
$row=$conn->query($sql);
if($row===TRUE)
{
	
	echo "THE COLUMN ALTERED SUCCESSFULLY";
}
else
{
	echo "Error creating database: " . $conn->error;
}
$conn->close();
?>
</html>