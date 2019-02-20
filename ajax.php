<?php
function acceptrequest()
{           
			if (($_POST['guest_id']!=null||$_POST['guest_id']!="")&&($_POST['event_id']!=null||$_POST['event_id']!="")) {
            $gustid = $_POST['guest_id'];
            $evntid = $_POST['event_id'];
			$servername="localhost";
			$username="root";
			$password="";
			$dbname="MYDATABASE";
            $conn = mysqli_connect($servername,$username,$password,$dbname);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql= "UPDATE events_guests SET Status='Approved' WHERE GuestID='$gustid'";
            $sql2= "SELECT * FROM events_guests WHERE GuestID='$gustid'";  
            mysqli_select_db($conn,$dbname);
            
            
            $retval2 = mysqli_query($conn,$sql2);
            $row = mysqli_fetch_array($retval2);
            if($row['Status']=='Approved'){
                return 'already';
                die();
            }
            else{$retval = mysqli_query($conn,$sql);}
            
            
            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            
        }
}


function declinerequest()
{
			if (($_POST['guest_id']!=null||$_POST['guest_id']!="")) {
             $gustid = $_POST['guest_id'];
            $evntid = $_POST['event_id'];
			$servername="localhost";
			$username="root";
			$password="";
			$dbname="MYDATABASE";
            $conn = mysqli_connect($servername,$username,$password,$dbname);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql= "UPDATE events_guests SET Status='Rejected' WHERE GuestID='$gustid'";
            $sql2= "SELECT Status FROM events_guests WHERE GuestID='$gustid'";  
            mysqli_select_db($conn,$dbname);
            $retval2 = mysqli_query($conn,$sql2);
            $row = mysqli_fetch_array($retval2);
            if($row['Status']=='REJECTED'){
            	return 'already';
            	die();
            }
            $retval = mysqli_query($conn,$sql);
            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            return "success";
        }
        else{
        	return "failure";
        }
}

if(isset($_POST['action'])&&isset($_POST['event_id'])&&isset($_POST['guest_id']))
{
	$evt_id=$_POST['event_id'];
	$gst_id=$_POST['guest_id'];
	var_dump($evt_id);
	var_dump($gst_id);


	switch($_POST['action']){
		case 'acceptrequest':$status=acceptrequest();
							var_dump($status);
							print json_encode($status);
								break;	
	  	case 'declinerequest':$status=declinerequest();
							var_dump($status);
							print json_encode($status);
							break;	
	}
}

?>