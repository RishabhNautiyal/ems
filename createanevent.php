<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('https://ae01.alicdn.com/kf/HTB1QYWod0.LL1JjSZFEq6AVmXXaM/Floating-Lotus-Lanterns-Lotus-Water-Lamp-Wedding-Party-Decorations-Paper-Flower-Light-Drifting-Blessing.jpg')">
<div class="container">
  <h2 style="color: white;text-align: center">CREATE AN EVENT</h2>
  <form  class="form-horizontal" action="create.php" method="post">
    <div class="form-group">
    	<label style="color: white" class="control-label col-sm-2" for="Eventname">Event Name:</label>
    	<div class="col-sm-10">
      <input type="text" class="form-control" id="eventname" placeholder="Enter Theme" name="eventname">
    </div>
</div>
    <div class="form-group">
      <label style="color:white" class="control-label col-sm-2" for="venue">Venue:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="venue" placeholder="Enter Venue" name="venue">
    </div>
</div>
    <div class="form-group">
    	<label style="color:white" class="control-label col-sm-2" for="Scheduled Date">Scheduled Date:</label>
    	<div class="col-sm-10">
    	<input type="date" class="form-control" id="Scheduleddate" placeholder="Scheduled Date" name="scheduleddate">
    </div>
</div>
    <div class="form-group">
    	<label style="color: white" class="control-label col-sm-2" for="Event Details:">Event Details:</label>
    	<div class="col-sm-10">
    	<textarea class="form-control" row="5" id="Event Detail's" name="eventdetails"></textarea>
    </div>
    <div class="form-group">
    	<div class="col-sm-2 col-sm-10">
    <button style="margin-left:570px;margin-top:50px;font-family: ARIAL BLACK;" type="submit" class="btn btn-default">PUBLISH</button>
</div>
</div>
</div>
</form>
</body>
</html>