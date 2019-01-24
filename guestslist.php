<!DOCTYPE html>
<html lang-en>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="color:yellow;font-family:ARIAL BLACK;background-image: url('http://el-simpatico.com/wp-content/uploads/2015/07/event_pict_039.jpg')"> 

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
$sql= "INSERT INTO guests (GuestName,EmailId) VALUES ('$guest_name','$emailid')";
$result = $conn->query($sql);
if($result->num_rows>0)
{
	echo "GUEST ADDED SUCCESSFULLY!!!"."<br>";
}
$conn->close();
?>
<p style = "margin-bottom:200px;margin-left: 500px;margin-right: 500px;font-size:20px;font-style: bold;font-family: ARIAL BLACK;color: yellow"><a href="addinvitees_admin.php">GO BACK TO LOGIN PAGE!!</a></p>