<!DOCTYPE html>
<html lang-en>
<head>
	<style>
	a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}


a:hover, a:active {
  background-color: black;
}
	p{
		text-align: center;
		font-family: "TIMES ROMAN";
	}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('https://ae01.alicdn.com/kf/HTB1QYWod0.LL1JjSZFEq6AVmXXaM/Floating-Lotus-Lanterns-Lotus-Water-Lamp-Wedding-Party-Decorations-Paper-Flower-Light-Drifting-Blessing.jpg')">
<?php if(isset($_POST["eventname"])){$thme = $_POST["eventname"];} ?><br>
<?php if(isset($_POST["venue"])){$vnue = $_POST["venue"];}  ?><br>
<?php if(isset($_POST["scheduleddate"])){$date = $_POST["scheduleddate"];} ?><br>
<?php if(isset($_POST["eventdetails"])){$evntdetls = $_POST["eventdetails"];} ?><br>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
}
$create="INSERT INTO events (Theme,Venue,Event_Date,EventDetails) VALUES ('$thme','$vnue','$date','$evntdetls')";
$result=$conn->query($create);
echo "CREATED EVENT HAS BEEN PUBLISHED SUCCESSFULLY!!!"; 
$sql="SELECT EventId FROM events";
$select=$conn->query($sql);
$row=$select->fetch_assoc();
$conn->close();
?>

<div class="container">
<p style="
  margin-left: 80px;
  margin-right: 120px;font-size:20px;font-style: normal;font-family: ARIAL BLACK"><a href="existinguserlogin.php" class="btn btn-info" role="button">GO BACK TO THE WELCOME PAGE!</a></p>
</div>
</body>
</html>








