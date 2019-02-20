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
 <h2>LIST OF INVITEES</h2>
<table style="width:100%">
<tr>
	<th style="text-align: center;">GUESTNAME</th>
	<th style="text-align: center;">EMAIL-ID</th>
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
$sql="SELECT Guestname,EmailId FROM guests WHERE Invitees='AsInvitee'";
$result=$conn->query($sql);


if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
		$guestname=$row['Guestname'];
		
		$mailid=$row['EmailId'];
		
		?>
		<tr>
		<td><?php echo $guestname ?></td>
		<td><?php echo $mailid ?></td>
	</tr>
	<?php
	}
}
?>
</body>
</html>