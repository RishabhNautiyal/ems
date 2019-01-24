<!DOCTYPE html>
<html>
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
</head>
<body style="background-image: url('https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/BY8x1xp/videoblocks-group-of-active-business-people-putting-hands-together-for-teamwork-and-support_rortnv1zz_thumbnail-full05.png')"> 
<?php if(isset($_POST["name"])){$adminname= $_POST["name"];}?><br>
<?php if(isset($_POST["emailid"])){$mailid= $_POST["emailid"];}?><br>
<?php if(isset($_POST["role"])){$AsAn = $_POST["role"];}?><br>
<?php if(isset($_POST["username"])){$usrname= $_POST["username"];}?><br>
<?php if(isset($_POST["password"])){$pssword= $_POST["password"];}?><br>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
};
$sql="SELECT * FROM users WHERE EmailID = '$mailid'";
$result=$conn->query($sql);

if ( $result === FALSE )
	{
        echo $conn->error;
        exit;
    }
if($result->num_rows>0){
	?>

	<p  style="border:1px solid black;color:yellow;margin-top: 50px;margin-left: 100px;margin-right: 140px;font-size:20px;font-style: bold;font-family: ARIAL BLACK">USER WITH THIS USERNAME ALREADY EXISTS!!!! PLEASE TRY WITH DIFFERENT USERNAME</p>
<?php
}
else
	{
$sql="INSERT INTO users(Name,Emailid,Role,Username,Password)
VALUES('$adminname','$mailid','$AsAn','$usrname','$pssword');";
}
if($conn->query($sql)===TRUE)
{
	?>

	 <p  style="border:1px solid black;color:yellow;margin-top: 100px;margin-left: 512px;margin-right: 512px;font-size:20px;font-style: bold;font-family: ARIAL BLACK">REGISTERED SUCCESSFULLY!</p>
  <?php
}
else{
	echo "error".$conn->error;
}
$conn->close();
?>
<p style = "margin-bottom:200px;margin-left: 500px;margin-right: 500px;font-size:20px;font-style: bold;font-family: ARIAL BLACK;color: yellow"><a href="guestlogin.html">GO BACK TO LOGIN PAGE!!</a></p>
</body>
</html>
