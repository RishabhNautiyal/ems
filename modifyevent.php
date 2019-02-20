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
		text-align: center;
		color: red;
	}
	h2{
		text-align: center;
		color: yellow;
	}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
</head>
<body style="background-image: url('')">
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
} 
$sql="SELECT * FROM events";
$result=$conn->query($sql);
?> <h2>LIST OF EVENTS</h2>
<table style="width:100%">
<tr>
	<th style="text-align: center">THEME</th>
	<th style="text-align: center">EVENT DATE</th>
	<th style="text-align: center">VENUE</th>
	<th style="text-align: center ">EVENT DETAILS</th>
	<th style="text-align: center">ACTION</th>
</tr>
<?php
if($result-> num_rows >0)
{
	while($row=$result->fetch_assoc())
	{
	?>	
<tr>
	<td><?php echo $row['Theme'];?></td>
	<td><?php echo $row['Event_Date'];?></td>
	<td><?php echo $row['Venue'];?></td>
	<td><?php echo $row['EventDetails'];?></td>
	<td><button  type="button" class="btn-sm btn btn-info edit-btn "  data-eventid="<?php echo $row['EventId']?>" data-theme="<?php echo $row['Theme']?>" data-eventdate="<?php echo $row['Event_Date']?>" data-venue="<?php echo $row['Venue']?>" data-eventdetails="<?php echo $row['EventDetails']?>" data-toggle="modal" data-target="#myModal" >EDIT</button>
	<button type="button"  class="btn-sm btn btn-info delete-btn "  data-eventid="<?php echo $row['EventId']?>">DELETE</button>
</td>

		<!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">


    	<!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Event:</h4>
        </div>
        <div class="modal-body">
          <form action="editevents.php" method="post">
  Theme:<input type="theme" name="theme" class="theme" ><br>
 Event Date:<input type="text" name="eventdate" class="edit-btn" ><br>
 Venue:<input type="venue" name="venue" class="edit-btn" ><br>
 Event Details:<input type="eventdetails" name="eventdetails" class="edit-btn"><br>
 <input type="hidden" name="event_id">
 <input type="hidden" name="theme">
 <input type="hidden" name="eventdate">
 <input type="hidden" name="venue">
 <input type="hidden" name="eventdetails">
<input type="save" class="btn btn-info" value="Save Changes">
</form>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
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
<script> 
	$(".edit-btn").click(function(){
		
		var id = this.dataset.eventid;
	 	var datastring="action=editevent&event_id="+id;
	 	console.log(datastring);
	 	$.ajax({
	 		type : "POST",
	 		url  : "editevents.php",
	 		data : datastring,
	success: function(result){
		console.log("namaste");
	}

	 	})
	})
	
	$(".delete-btn").click(function(){
		var id = this.dataset.eventid;
		var datastring="action=deleteevent&event_id="+id;
		console.log(datastring);
		$.ajax({
			type : "POST",
			url  : "editevents.php",
			data : datastring,
		success: function(result){
			console.log("barkhaast");
		}
		})
		window.alert("DELETED");
	})
		
</script>
</html>