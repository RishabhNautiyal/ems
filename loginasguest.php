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
		
		color: yellow;
		
	}
</style>
</head>
<body>
<?php
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

?> <h2>LIST OF EVENTS</h2>
<table style="width:100%">
<tr>
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
	<td><?php echo $row['Theme'];?></a></td>
	<td><?php echo $row['Venue'];?></td>
	<td><?php echo $row['Event_Date'];?></td>
	

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
<p style="text-align: center"><a style="color: green" href="guestlogin.html" role="button"> "NOTE:- PLEASE CLICK ON THE RESPECTIVE THEME IF YOU WISH TO ATTEND THE EVENT";</p>
</body>
</html>