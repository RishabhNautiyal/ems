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

<?php if(isset($_POST["username"])){$uname= $_POST["username"];} ?><br>
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
$i=1;
$sql= "SELECT * FROM users WHERE Username='$uname'";
$result = $conn->query($sql);
if($result===FALSE)
{
	echo $conn->error;
	exit;
}
if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	
	{
		?>
		
	 <p style="color:yellow">Hi</p> <?php echo $row['Name']."<br>";	
	}
   
 }
else
{
	echo "Invalid Username & Password";
}

$conn->close();
?>
<div class="container">
<p style="font-size:20px;text-align:left"><a href="openingpage.html" class="btn btn-info" role="button">LOOUT</a></p><br>
<p style="font-family: ARIAL BLACK;color:yellow;text-align: center;font-size: 25px"> LIST OF EVENTS </p>
<div class="btn-group">
<a href="addinvitees_admin.php" class="btn btn-info" role="button">ADD INVITEES</a>
<a  href="guestlist.php" class="btn btn-info" role="button">INVITEES LIST</a>
<a  href="createanevent.php" class="btn btn-info" role="button">CREATE AN EVENT</a>
  <a  href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" role="button">EDIT AN EVENT<span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
  	<li><a href="http://localhost/ems/modifyevent.php">Modify</a></li>
  	<li><a href="http://localhost/ems/deleteevent.php">Delete</a></li>
  </ul>
  <a  href="viewcreatedevents.php " class="btn btn-info" role="button">VIEW CREATED EVENTS</a>
  <a href="viewrequests.php " class="btn btn-info" role="button"> REQUSTS</a>
</div>
</div>
</body>
</html>
