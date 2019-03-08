<!DOCTYPE html>
<html>
<body style="color:black;font-family:ARIAL BLACK;background-image: url('')"> 
<?php

if(isset($_POST['action']))
{
switch($_POST['action']){
							
		case 'deleteevent':$status=deleteevent();
							var_dump($status);
							print json_decode($status);
							    break;
		case 'updateevent':$status=updateevent();
							var_dump($status);
							print json_decode($status);
							break;				
						}
}
function deleteevent()
{
  if(isset($_POST['action'])&&isset($_POST['event_id']))
	{
	$eventid=$_POST['event_id'];
    }
    $servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
} 
$sql="DELETE FROM events WHERE EventId='$eventid'";
$result=$conn->query($sql);
if($result===TRUE)
{
   return 'done';
}
$conn->close();
}
function updateevent()
{
	
if(isset($_POST['action'])&&isset($_POST['event_id']))
	{$eventid=$_POST['event_id'];}
if(isset($_POST["theme"])){$theme = $_POST["theme"];var_dump($theme);}
if(isset($_POST["eventdate"])){$eventdate = $_POST["eventdate"];var_dump($eventdate);}
if(isset($_POST["venue"])){$venue = $_POST["venue"];var_dump($venue);}
if(isset($_POST["eventdetails"])){$eventdetails = $_POST["eventdetails"];var_dump($eventdetails);}

$servername="localhost";
$username="root";
$password="";
$dbname="MYDATABASE";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("Connection Failed".$conn->connect_error);
} 

$sql="UPDATE events SET Theme='$theme', Event_Date='$eventdate',Venue='$venue',EventDetails='$eventdetails' WHERE EventId='$eventid'";
$result=$conn->query($sql);
if($result===TRUE)
{
	
	return 'good';
}
else{
	echo "$result->error";
}
$conn->close();
}
				
?>
</body>
</html>