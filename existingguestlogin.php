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
<div class="container">
<?php if(isset($_POST["username"])){$uname= $_POST["username"];} var_dump($uname);?><br>
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
		
	 <p style="color:blsack">Hi</p> <?php echo "GuestID:-" .$row['Userid']."<br>"."Name:-".$row['Name'];	

	}
   
 }
else
{
	echo "Invalid Username & Password";
}

$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
} 
$sql="SELECT * FROM events ";
$result=$conn->query($sql);

?>
<p style="font-size:20px;text-align:right;margin-right: 10px"><a href="openingpage.html" class="btn btn-info" role="button">LOOUT</a></p><br>

 <h2>LIST OF EVENTS</h2>
<table style="width:100%">
<tr>
	<th>EVENT_ID</th>
	<th>THEME</th>
	<th>VENUE</th>
	<th>SCHEDULED DATE</th>
</tr>
<?php
if($result-> num_rows >0)
{
	while($row=$result->fetch_assoc())
	{
	?>	
<tr>
	<td><?php echo $row['EventId'];?></td>
	<td><?php echo $row['Theme'];?></td>
	<td><?php echo $row['Venue'];?></td>
	<td><?php echo $row['Event_Date'];?></td>
	<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">JOIN</button>
</td>
</tr>
<?php
	}
}
else
{
	echo"NO EVENT IS CREATED YET!!!!";
}
$conn->close();
?>
</table>
	
<form style="margin-top: 50px;margin-left: 512px;margin-right: 512px;text-align: center" action="event_guest.php" method="post">


</div>
</form>

</body>
</html>