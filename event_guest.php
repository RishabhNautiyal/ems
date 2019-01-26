<!DOCTYPE html>
<html>
<head>
	<style>
	
	h2{
		text-align: center;
		
		color: black;
		
	}
</style>
</head>
<body style="color:black;font-family:ARIAL BLACK;background-image: url('')"> 

<?php if(isset($_POST["name"])){$name= $_POST["name"];}?><br>
<?php if(isset($_POST["email"])){$mail= $_POST["email"];}?><br>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
}
$sql = "INSERT INTO events_guests (Name,GuestID) VALUES ('$name','$mail')";
$conn->query($sql);
var_dump($conn->query($sql));
if($conn->query($sql)===TRUE){
 
 echo "YOUR REQUEST HAS BEEN SENT TO THE ADMIN!! YOU WILL BE NOTIFIED ONCE REQUEST GET ACCEPTED";

}
else
{
	echo"error".$conn->error;
}

$conn->close();
?>
</body>
</html>




