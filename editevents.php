<!DOCTYPE html>
<html>
<body style="color:black;font-family:ARIAL BLACK;background-image: url('')"> 
<?php
if(isset($_POST['action'])&&isset($_POST['event_id']))
	{
	$eventid=$_POST['event_id'];
	var_dump($eventid);
}
 
switch($_POST['action']){
		case 'editevent':$status=editevent();
						var_dump($status);
						print json_encode($status);
								break;	
							
		case 'deleteevent':$status=deleteevent();
							var_dump($status);
							print json_decode($status);
							    break;
						}
function deleteevent()
{
  if(isset($_POST['action'])&&isset($_POST['event_id']))
	{
	$eventid=$_POST['event_id'];
	var_dump($eventid);
    }
$sql="DELETE FROM events WHERE EventId='$eventid'";
$result=$conn->query($sql);
return 'done';
}

function editevent()
{
	if(isset($_POST['action'])&&isset($_POST['event_id']))
	{
		$eventid=$_POST['event_id'];
		var_dump($eventid);
	}
}
				
						?>
					</body>
					</html>
