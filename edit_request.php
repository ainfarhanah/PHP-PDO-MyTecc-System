<?php 
session_start();
	
	$userType = $_SESSION['userType'];
	$userEmail = $_SESSION['userEmail'];
	$userID = $_SESSION['userID'];
	$reqID = @$_GET['reqID'];

	include "listmenu.php";
	include "dbcon.php";
	
	if(isset($_POST['update']))
	{
		//$reqID = @$_GET['reqID'];
		$reqNam = $_POST['reqNam'];
		$reqPhone= $_POST['reqPhone'];
		$reqProgram = $_POST['reqProgram'];
		$reqOrganizer = $_POST['reqOrganizer'];
		$reqVenue = $_POST['reqVenue'];
		$reqDate = $_POST['reqDate'];
		$reqTime = $_POST['reqTime'];

		$update = dbConnect()->prepare("UPDATE requests SET reqNam = :reqNam, reqPhone = :reqPhone, reqProgram = :reqProgram, reqOrganizer = :reqOrganizer, reqVenue = :reqVenue, reqDate =:reqDate, reqTime = :reqTime WHERE reqID = :reqID");
		$update->bindParam(':reqID', $reqID); 
		$update->bindParam(':reqNam', $reqNam); 
		$update->bindParam(':reqPhone', $reqPhone); 
		$update->bindParam(':reqProgram', $reqProgram); 
		$update->bindParam(':reqOrganizer', $reqOrganizer); 
		$update->bindParam(':reqVenue', $reqVenue); 
		$update->bindParam(':reqDate', $reqDate);
		$update->bindParam(':reqTime', $reqTime);  
		$update->execute();
		

		header('Location: request_list.php');


	}
	$query = dbConnect()->prepare("SELECT * FROM requests 
									WHERE reqID = :reqID"); 
	$query->bindParam(':reqID',$reqID);
	$query->execute(); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Edit/Update Request</title>
   <link rel="icon" href="./img/logo.jpg" type="image/gif" sizes="16x16">

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		</head>
  	
	<script type="text/javascript">
		function getCookieBase() {
			return 'GETAFREE';
		}
	</script>

	<link href="css/homepage.css" type="text/css" rel="stylesheet" />
	<script src="js/modernizr2.6.2.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/dropdown.css" type="text/css">
	

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</style>
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
	<br><?php $result = $query->fetch(PDO::FETCH_LAZY); ?>		
	<center><legend><h4>Update/Edit a Request</h4><H5>Edit your request if any corrections</H5></legend></center>
	<form name="myForm" method="post" action="" onsubmit="return confirm('Are sure to edit your request?');" autocomplete="off" >
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" name="reqNam" id="reqNam" class="form-control" value="<?php echo $result['reqNam'];?>" required="required">
						</div>
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
							<input type="text" name="reqPhone" id="reqPhone" class="form-control" value="<?php echo $result['reqPhone'];?>" required="required">					
					</div>
				</li>
			</ul><p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							<input type="text" name="reqProgram" id="reqProgram" class="form-control" value="<?php echo $result['reqProgram'];?>" required="required">					
					</div>
				</li>
			</ul><p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
							<input type="text" name="reqOrganizer" id="reqOrganizer" class="form-control" value="<?php echo $result['reqOrganizer'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
							<input type="text" name="reqVenue" id="reqVenue" class="form-control" value="<?php echo $result['reqVenue'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
							<input type="date" name="reqDate" id="reqDate" class="form-control" value="<?php echo $result['reqDate'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
							<input type="time" name="reqTime" id="reqTime" class="form-control" value="<?php echo $result['reqTime'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<input type="submit" name="update" class="btn btn-default" value="Edit" />
					<input type="reset" name="clear" class="btn btn-default" value="Clear" />

					<?php
					if (isset($_POST['update'])){
						 echo "<div class='alert alert-success' role='alert' style='text-align:center'><strong>Update Successful!<strong>Proceed to Login</strong></a></div>";
					}
									if(isset($error)){
										foreach($error as $error){
											echo '<p class="bg-danger">'.$error.'</p>';
										}
									}?>
			

				</li>
			</ul>
		</form>		<br><br><br><br><br><br><br><br><br><br><br>
	</div> 
</div>					
				
</center></body>
</html>