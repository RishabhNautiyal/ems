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

<?php if(isset($_POST["name"])){$guest_name= $_POST["name"];var_dump($guest_name);}?><br>
<?php if(isset($_POST["email"])){$mail= $_POST["email"];var_dump($mail);}?><br>

<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
}
$sql = "INSERT INTO guests (Guestname,EmailId) VALUES ('$guest_name','$mail')";
$check=$conn->query($sql);
if($check===TRUE)
{
$select = "SELECT Guest_Id FROM guests WHERE EmailId='$mail'";
$result=$conn->query($select);
var_dump($result);
$insert="INSERT INTO events_guests (EventId,GuestId) VALUES ('var li=document.getElementById('event_id');li.dataset.event_id','$result')";
var_dump($insert);
$conn->query($insert);
}
else{
	echo $conn->connect_error;
}

$conn->close();
?>
</body>
</html>

