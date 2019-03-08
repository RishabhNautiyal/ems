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
		color: blue;
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
$sql="SELECT * FROM events";
$result=$conn->query($sql);
?> <h2>LIST OF EVENTS</h2>
<table style="width:100%" class="table table-bordered">
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
	
<tr id="row_<?php echo $row['EventId'] ?>">
	<td><?php echo $row['Theme'];?></td>
	<td><?php echo $row['Event_Date'];?></td>
	<td><?php echo $row['Venue'];?></td>
	<td><?php echo $row['EventDetails'];?></td>
	<td><button  type="button" class="btn-sm btn btn-primary btn-xs edit-btn "  data-eventid="<?php echo $row['EventId']?>" data-theme="<?php echo $row['Theme']?>" data-eventdate="<?php echo $row['Event_Date']?>" data-venue="<?php echo $row['Venue']?>" data-eventdetails="<?php echo $row['EventDetails']?>" data-toggle="modal" data-target="#myModal" id="<?php echo $row['EventId'] ?>"> EDIT</button>
	<button type="button" class="btn-sm btn btn-danger btn-xs delete-btn"  data-eventid="<?php echo $row['EventId']?>">DELETE</button>
</td>

		<!-- Modal -->
 <div class="modal fade" id=myModal  role="dialog" >
    <div class="modal-dialog ">


    	<!-- Modal content-->
      <div class="modal-content ">
        <div class="modal-header">
        <div id="user_dialog" title="Edit Event" >	
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Event:</h4>
        </div>
        
        <div class="modal-body ">
        	
          <form action="editevents.php"  method="post">
			 Theme:<input type="text" name="theme" id="row_1<?php echo $row['EventId'] ?>" ><br>
			 Event Date:<input type="text" name="eventdate" id="row_2<?php echo $row['EventId'] ?>"  ><br>
			 Venue:<input type="text" name="venue" id="<?php echo $row['EventId'] ?>" ><br>
			 Event Details:<input type="text" name="eventdetails" id="<?php echo $row['EventId'] ?>" ><br>
			 <input type="hidden" name="event_id">
		 </form>
</div>
<div id="action_alert" title="Action">
	</div>
</div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="submit"  class="btn btn-primary update-btn" >Update</button>
        </div>
     
      </div>
      
    </div>
  </div>

</tr>

</div>
<?php
	}
}
else
{
	echo "NO EVENT IS CREATED YET!!!!" ;
}
?>
</table>
</body>
<script> 
	$(".edit-btn").click(function()
	{
		
		var id = this.dataset.eventid;
		var theme = this.dataset.theme;
		var eventdate = this.dataset.eventdate;
		var venue = this.dataset.venue;
		var eventdetails = this.dataset.eventdetails;
	 	$('input[name=theme]').val(theme);
	 	$('input[name=eventdate]').val(eventdate);
	 	$('input[name=venue]').val(venue);
	 	$('input[name=eventdetails]').val(eventdetails);
	 	$('input[name=event_id]').val(id);
		
	});
	
	$(".delete-btn").click(function()
	{
		var id = this.dataset.eventid;
		var datastring="action=deleteevent&event_id="+id;
		console.log(datastring);
		$.ajax({
			type : "POST",
			url  : "editevents.php",
			data : datastring,
		success: function(result)
		{
			$('#row_'+id).hide();
		}
		})
	});

	$(".update-btn").click(function()
	{
		var id = $('input[name=event_id]').val();
		var theme = $('input[name=theme]').val();
	 	var eventdate = $('input[name=eventdate]').val();
	 	var venue = $('input[name=venue]').val();
	 	var eventdetails = $('input[name=eventdetails]').val();
		var datastring="action=updateevent&event_id="+id+"&theme="+theme+"&eventdate="+eventdate+"&venue="+venue+"&eventdetails="+eventdetails;
		console.log(datastring);
		$.ajax({
			type : "POST",
			url  : "editevents.php",
			data : datastring,
		success: function(result)
		{
			console.log("add");
		}
		})
		
	});
 </script>
</html>