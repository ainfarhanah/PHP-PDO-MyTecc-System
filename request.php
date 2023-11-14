<?php session_start();

include "listmenu.php";
 ?>

<!DOCTYPE html>
<html lang="en">


<head>
  <title>Request</title>
		<link rel="icon" href="./img/logo.jpg" type="image/gif" sizes="16x16">

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		</head>

</head>

    <nav class="navbar navbar-default">	
  <div class="container-fluid">
  	 <div class="navbar-header">
     <img src="./img/logo.jpg" width="50" height="50">
    </div>

      <div class="navbar-header">
      <a class="navbar-brand" href="#">MyTecc UiTM</a>
    </div>
     <ul class="nav navbar-nav">
      <li><a href="dashboard.php">Home</a></li>
      
    </ul>
   
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
			<?php listmenu(); ?>
      </ul>
    </div>
  </div>
</nav> 


 
<div class="container">
  <div class="jumbotron">
  <br>
  <center><img src="./img/logo.jpg" height="70"></center>
		<fieldset><center><legend><h4>Request Form for Program Equipment Use</h4><h5>Equipment Provided: Bunting Stand, Extension Wire, Easel Stand, Red Carpet and LED Fairy Light</h5></legend></center>
		<?php if(!isset($_POST['signup'])) 
		{ 
		if($userUsername='')
			{
				$valid[]="<div class='alert alert-success' role='alert' style='text-align:center'><strong>Please see your username for verification link!</strong><br/><a href='login.php'><strong>Proceed to Login</strong></a></div>";

			}
			
					if(isset($valid))
					{
						foreach($valid as $valid){
							echo "<div class='alert alert-danger' role='alert' style='text-align:center'><strong>".$error."</strong><strong></strong></a></div>";
						}
					}
					if(isset($success))
					{
						foreach($success as $success){
							echo "<div class='alert alert-success' role='success' style='text-align:center'><strong>".$success."</strong><strong></strong></a></div>";
						}
					}
				
	?>
	
		
		<form align = "" role="form" method="post" data-toggle="validator" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
            <div class="col-xs-20">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input type="name" name="reqNam" class="form-control" placeholder="Full Name" >
                </div>
            </div>
		</li>
		<p><br>
		</ul>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
            <div class="col-xs-20">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
					<input type="username" name="reqPhone" class="form-control" placeholder="Phone Number">
                </div>
            </div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
            <div class="col-xs-20">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					<input type="text" name="reqProgram" class="form-control" placeholder="Program Name" >
                </div>
            </div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
			<div class="col-xs-20">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
					<input type="text" name="reqOrganizer" class="form-control" placeholder="Program Organizer" >
				</div>
			</div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
			<div class="col-xs-20">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
					<input type="text" name="reqVenue" class="form-control" placeholder="Program Venue" >
				</div>
			</div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
			<div class="col-xs-20">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					<input type="date" name="reqDate" class="form-control" placeholder="Program Date" >
				</div>
			</div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
			<div class="col-xs-20">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
					<input type="time" name="reqTime" class="form-control" placeholder="Program Time" >
				</div>
			</div>
		</li>
		</ul>
		<p><br>
		<ul>
		<p>
		<li style="list-style-type: none;" align="center">
			<input type="submit" class="btn btn-default" value="Request" name="signup">
        </li>
		</ul>
		</form></fieldset>
		<?php 
} else {
	$userID = $_SESSION['userID'];
	$reqNam = $_POST['reqNam'];
	$reqPhone = $_POST['reqPhone'];
	$reqProgram = $_POST['reqProgram'];
	$reqOrganizer =$_POST['reqOrganizer'];
	$reqVenue = $_POST['reqVenue']; 
	$reqDate = $_POST['reqDate'];   
	$reqTime = $_POST['reqTime'];  
	$appDate = date('Y-m-d');                 
 	
	$status = 'PENDING';  // set the status PENDING	
	
	require 'dbcon.php';
	
	$query = dbconnect()->prepare("INSERT INTO requests (userID, reqNam, reqPhone, reqProgram, reqOrganizer, reqVenue, reqDate, reqTime, appDate, 
	status) 
	VALUES (:userID, :reqNam, :reqPhone, :reqProgram, :reqOrganizer, :reqVenue, :reqDate, :reqTime, :appDate, :status)");
		$query->bindParam(':userID', $userID);
	    $query->bindParam(':reqNam', $_POST['reqNam']);
		$query->bindParam(':reqProgram', $_POST['reqProgram']);
		$query->bindParam(':reqOrganizer', $_POST['reqOrganizer']);
		$query->bindParam(':reqPhone', $_POST['reqPhone']);
		$query->bindParam(':reqVenue', $_POST['reqVenue']);
		$query->bindParam(':reqDate', $_POST['reqDate']);
		$query->bindParam(':reqTime', $_POST['reqTime']);
		$query->bindParam(':appDate', $appDate);
		$query->bindParam(':status', $status);
		
        if($query->execute()){
			
            echo "<div class='alert alert-success' role='alert' style='text-align:center'><strong>You have submitted the request!</strong><br/><a href='dashboard.php'><strong>Back to Home</strong></a></div>";

		} 	
	}	
	

?>
	</div>
</div>
</body>
</html>
