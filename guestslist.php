<!DOCTYPE html>
<html lang-en>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="color:yellow;font-family:ARIAL BLACK;background-image: url('')"> 

<?php if(isset($_POST["name"])){$guest_name= $_POST["name"];} var_dump($guest_name);?><br>
<?php if(isset($_POST["emailid"])){$mlid= $_POST["emailid"];}?><br>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
};
$sql= "INSERT INTO guests (Guestname,EmailId,Invitees) VALUES ('$guest_name','$mlid','AsInvitee')";
  $result=$conn->query($sql);
  var_dump($result);
if($result===TRUE)
{
	
	echo "GUEST ADDED SUCCESSFULLY!!!"."<br>";
}
else
{
	echo "result error".$conn->error;
}
$conn->close();
?>
<p style = "margin-bottom:200px;margin-left: 500px;margin-right: 500px;font-size:20px;font-style: bold;font-family: ARIAL BLACK;color: yellow"><a href="addinvitees_admin.php">GO BACK TO LOGIN PAGE!!</a></p>
</body>
</html>
