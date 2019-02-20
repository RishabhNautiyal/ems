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
		color: black;
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
<?php if(isset($_POST["username"])){$usname= $_POST["username"];}?><br>
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
$sql= "SELECT * FROM users WHERE Username='$usname'";
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
		
	 <p style="color:blsack">Hi</p> <?php echo "Name:-".$row['Name'];	

	}
   
 }
else
{
	echo "Invalid Username & Password";
}


?>
<p style="font-size:20px;text-align:right;margin-right: 10px"><a href="openingpage.html" class="btn btn-info" role="button">LOOUT</a></p><br>

 <h2>LIST OF EVENTS</h2>
<table style="width:100%">
<tr>
	
	<th>THEME</th>
	<th>VENUE</th>
	<th>SCHEDULED DATE</th>
</tr>
<?php
$sql="SELECT * FROM events ORDER BY Theme ASC  ";
$result=$conn->query($sql);
if($result-> num_rows >0)
{
	while($row=$result->fetch_assoc())
	{
	?>	
<tr>
	<td><?php echo $row['Theme'];?></td>
	<td><?php echo $row['Venue'];?></td>
	<td><?php echo $row['Event_Date'];?></td>
	<td><button type="button" class="btn btn-info btn-lg join-btn " data-eventid="<?php echo $row['EventId']?>" data-toggle="modal" data-target="#myModal">JOIN</button>


<!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">


    	<!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Credentials:</h4>
        </div>
        <div class="modal-body">
          <form action="guests.php" method="post">
  Name:<input type="text" name="name"><br>
 EmailId:<input type="email" name="email"><br>
 <input type="hidden" name="event_id">
<input type="SUBMIT" class="btn btn-info" value="Submit">
</form>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
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
</div>

</body>
<script> 
	$(".join-btn").click(function(){
		
		var id = this.dataset.eventid;
	 	
	 	var datastring="action=hiddenid&event_id="+id;
	 	console.log(datastring);
	 	$.ajax({
	 		type : "POST",
	 		url  : "guests.php",
	 		data : datastring,
	success: function(result){
		console.log("namaste");
	}

	 	})
	})
</script>
</html>