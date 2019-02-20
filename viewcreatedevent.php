<!DOCTYPE html>
<html>
<style>
	table,th,td
	{
		border: 1px solid black;
		border-collapse: collapse;
		font-size: 20px;
		text-align: center;
	}
	td,th
	{
		padding:10px;
	}
	th
	{
		color: red;
	}
	h2
	{
		text-align: center;
	}

</style>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="color:black;font-family:ARIAL BLACK;background-image: url('')"> 
 <h2>LIST OF EVENTS</h2>
<table style="width:100%">
<tr>
	<th style="text-align: center;">THEME</th>
	<th style="text-align: center;">EVENT DATE</th>
	<th style="text-align: center;">VENUE</th>
	<th style="text-align: center;">EVENT DETAILS</th>
	
</tr>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
};
$sql="SELECT Theme,Event_Date,Venue,EventDetails FROM events ";
$result=$conn->query($sql);

if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
		$theme=$row['Theme'];
		
		$eventdate=$row['Event_Date'];
		
		$vnue=$row['Venue'];
		
		$eventdtls=$row['EventDetails'];
		
		?>
		<tr>
		<td><?php echo $theme ?></td>
		<td><?php echo $eventdate ?></td>
		<td><?php echo $vnue ?></td>
		<td><?php echo $eventdtls ?></td>
	</tr>
<?php
	}
}
?>
</body>
</html>

