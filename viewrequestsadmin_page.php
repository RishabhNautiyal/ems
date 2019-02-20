<!DOCTYPE html>
<html lang-en>
<head>
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
} 
?> <h2>NUMBER OF REQUESTS</h2>
<table style="width:75%">
<tr>
	<th style="text-align: center;">EVENT THEME</th>
	<th style="text-align: center;">GUEST NAME</th>
	<th style="text-align: center;">ACTION</th>
</tr>
<?php
$sql="SELECT EventID,GuestID FROM events_guests WHERE Status='Requested'";
$result=$conn->query($sql);
if($result-> num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{	
		$evtid=$row['EventID'];
		
		$gstid=$row['GuestID'];
		
		if(($evtid!="null"||$evtid="")&&($gstid!="null"||$gstid=""))
		{
			$query="SELECT Theme FROM events  WHERE EventId='$evtid'";
			$check=$conn->query($query);
			$theme=$check->fetch_assoc();			
	?>	
<tr>
	<td><?php echo $theme['Theme'];?></td>
	<?php 
			$query2="SELECT Guestname FROM guests WHERE Guest_ID='$gstid'";
			$check2=$conn->query($query2);
			$data=$check2->fetch_assoc();

			}
			?>

	<td><?php echo $data['Guestname'];?></td>
	
	<td><button  type="button" class="btn-sm accept-btn"   data-guestid="<?php echo $gstid?>" data-eventid="<?php echo $evtid?>" >ACCEPT</button>
	 <button type="button" class="btn-sm reject-btn"   data-guestid="<?php echo $gstid?>" data-eventid="<?php echo $evtid?>" >REJECT</button>
</td>		
</td>
</tr>
<?php
}
}
else
{
	echo"NO REQUESTS NOW!!";
}
$conn->close();
?>
</table>
</div>
</body>
	<script>
		$(".accept-btn").click(function(){
			var xapt_evntid="";
			var xapt_gstid = this.dataset.guestid;console.log(xapt_gstid);
	 		var xapt_evntid = this.dataset.eventid;console.log(xapt_evntid);
	 	

			var datastring = "action=acceptrequest&event_id="+xapt_evntid+"&guest_id="+xapt_gstid;
			console.log(datastring);
		
			$.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : datastring,
success : function(result){
	console.log("hello");
			}
			})
		})
	
		$(".reject-btn").click(function(){
		
		var rjct_gstid = this.dataset.guestid;console.log(rjct_gstid);
	 	var rjct_evntid =this.dataset.eventid;console.log(rjct_evntid);
	 	
			var datastring = "action=declinerequest&event_id="+rjct_evntid+"&guest_id="+rjct_gstid;
			console.log(datastring);
			$.ajax({
			type 		:"POST",
			url			:"ajax.php",
			data  		:datastring,
success : function(result){
	console.log("hey");
			}
				})
		})
	</script>
		}

</html>











