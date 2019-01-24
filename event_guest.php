<!DOCTYPE html>
<html lang-en>
<head>
	<title>htmltables</title>
	<style>
	table,th,td{
		border: 1px solid black;
		border-collapse: collapse;
		
		font-size: 20px;
	}
	td,th{
		padding:10px;
		text-align: center;
		color: pink;
	}
	th{
		color: red;
	}
	h2{
		text-align: center;
		
		color: black;
		
	}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="color:black;font-family:ARIAL BLACK;background-image: url('')"> 

<?php if(isset($_POST["eventid"])){$vntid= $_POST["eventid"];} var_dump($evntid);?><br>
<?php if(isset($_POST["theme"])){$thm= $_POST["theme"];} var_dump($thme);?><br>
<?php if(isset($_POST["guestname"])){$nm= $_POST["guestname"];}?><br>
<?php if(isset($_POST["guestid"])){$gustid= $_POST["guestid"];}?><br>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
};
$sql= "INSERT INTO events_guests (EventID,Theme,GuestID,Guestname) VALUES ('$evntid','$thme','$nme','$gustid')";
$result = $conn->query($sql);

if($result===TRUE)
{
	?>
	<div class="container">
  <h2>Simple Collapsible</h2>
  <p>Click on the button to toggle between showing and hiding content.</p>
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">CLICK TO CONFIRM</button>
  <div id="demo" class="collapse">
  	THANK YOU SO MUCH AS YOU HAVE SHOWN INTEREST TO ATTEND THE EVENTS. YOUR REQUEST HAS BEEN SENT TO THE ADMIN,YOU WILL BE NOTIFIED ONCE IT GET APPROVED.
  </div>
</div>

   <?php
 }
else
{
	echo "Invalid Username & Password";
}
$conn->close();
?>
<p style = "margin-bottom:200px;margin-left: 500px;margin-right: 500px;font-size:20px;font-style: bold;font-family: ARIAL BLACK;color: yellow"><a href="existingguest_login.html">GO BACK TO LOGIN PAGE!!</a></p>
</body>
</html>




