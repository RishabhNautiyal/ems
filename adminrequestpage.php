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
<body style="background-image: url('https://www.youngisthan.in/wp-content/uploads/2017/10/diya-ideas.jpg')">
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
} 
$sql="SELECT * FROM events LIMIT 10 ";
$result=$conn->query($sql);

?> <h2>LIST OF EVENTS</h2>
<table style="width:100%">
<tr>
	<th>THEME</th>
	<th>VENUE</th>
	<th>INTEREST</th>
</tr>
<?php
if($result-> num_rows >0)
{
	while($row=$result->fetch_assoc())
	{
	?>	
<tr>
	<td><?php echo $row['Theme'];?></td>
	<td><?php echo $row['Venue'];?></td>
	<td>
<a style="color: green" href="#" role="button">REQUEST TO JOIN</a></div></td>
</tr>
<?php
	}
}
else
{
	echo"NO EVENT IS CREATED YET!!!!";
}
?>
</table>
</body>
</html>