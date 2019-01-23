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
$sql= "SELECT * FROM users WHERE username='$usrname'";
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
<p style="font-size:20px;text-align:left"><a href="http://localhost/openingpage.html" class="btn btn-info" role="button">LOOUT</a></p><br>
<p style="font-family: ARIAL BLACK;color:yellow;text-align: center;font-size: 25px"> LIST OF EVENTS </p>
<div class="btn-group">
<button  class="btn btn-primary" role="button">CREATE AN EVENT</button>
  <button  href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" role="button">EDIT AN EVENT<span class="caret"></span></button>
  <ul class="dropdown-menu" role="menu">
  	<li><a href="http://localhost/modifyevent.php">Modify</a></li>
  	<li><a href="http://localhost/deleteevent.php">Delete</a></li>
  </ul>
  <button  href="http://localhost/viewcreatedevents.php " class="btn btn-primary" role="button">VIEW CREATED EVENTS</button>
  <button href="http://localhost/viewrequests.php " class="btn btn-primary" role="button"> REQUSTS</button>
</div>
</div>
</body>
</html>
