<!DOCTYPE html>
<html>
<body style="color:black;font-family:ARIAL BLACK;background-image: url('')"> 
<?php
if(isset($_POST['action'])&&isset($_POST['event_id']))
	{
	$eventid=$_POST['event_id'];
	var_dump($eventid);

 if(isset($_POST["name"])){$guest_name= $_POST["name"];}
 if(isset($_POST["email"])){$mail= $_POST["email"];}
switch($_POST['action']){
		case 'hiddenid':$Status=hiddeneventid();
						var_dump($Status);
						print json_encode($status);
								break;	
							}
						}
						
$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
}
$sql = "INSERT INTO guests (Guestname,EmailId) VALUES ('$guest_name','$mail')"; 
$check=$conn->query($sql);
var_dump()
  	function hiddeneventid()
  	{

  	
  	if($_POST['event_id']!=null||$_POST['event_id']!="")
  		{
  		$eventid=$_POST["event_id"];
  		$mail= $_POST["email"];
  		var_dump($eventid);
  		var_dump($mail);
  	$servername="localhost";
	$username="root";
	$password="";
	$dbname="MYDATABASE";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error){
	die("connection failed".$conn->connect_error);
	}
	$select="SELECT Guest_ID FROM guests WHERE EmailId='$mail'";
 	$result=$conn->query($select);
 	$row=$result->fetch_assoc();
 	$val= $row['Guest_ID'];
	if($val>0){
		$insert="INSERT INTO events_guests (EventID,GuestID,Status) VALUES ('$eventid','$val','Requested')";
		$conn->query($insert);
		if($insert===TRUE)
		{
			return 'success';
			die();
		}
		}
		$conn->close();
	}
}
}
	?>		
	<p>THANK YOU SO MUCH FOR SHOWING INTEREST TO PARTICIPATE IN THIS  EVENT. YOU WILL BE NOTIFIED ONCE REQUEST WOULD GET APPROVED!!</p>
	<p style="font-size:20px;text-align:right;margin-right: 10px"><a href="existingguest_login.html" class="btn btn-info" role="button">GO BACK TO THE LOGIN PAGE!!!!!!</a></p><br>
</div>
<script>
	window.alert("REQUEST SENT");
</script>
</body>
</html>