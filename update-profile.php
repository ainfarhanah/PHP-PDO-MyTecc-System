<?php 
session_start();
	
	$userType = $_SESSION['userType'];
	$userEmail = $_SESSION['userEmail'];
	$userID = $_SESSION['userID'];
	include "listmenu.php";
	include "dbcon.php";
	
	if(isset($_POST['update']))
	{
		$userID = $_SESSION['userID'];
		$userFullname = $_POST['userFullname'];
		$userEmail= $_POST['userEmail'];
		$userPass = $_POST['userPass'];
		$userGender = $_POST['userGender'];
		$userAddress = $_POST['userAddress'];
		$userCity = $_POST['userCity'];
		$userPostcode = $_POST['userPostcode'];
		$userState = $_POST['userState'];
		$userCountry = $_POST['userCountry'];
		
		$update = dbConnect()->prepare("UPDATE users SET userFullname = :userFullname, userEmail = :userEmail, userPass = :userPass, userGender = :userGender, userAddress = :userAddress, userCity = :userCity, userPostcode = :userPostcode, userState = :userState, userCountry = :userCountry WHERE userID = :userID");
		$update->bindParam(':userID', $userID); 
		$update->bindParam(':userFullname', $userFullname); 
		$update->bindParam(':userEmail', $userEmail); 
		$update->bindParam(':userPass', $userPass); 
		$update->bindParam(':userGender', $userGender); 
		$update->bindParam(':userAddress', $userAddress);
		$update->bindParam(':userCity', $userCity);
		$update->bindParam(':userPostcode', $userPostcode);
		$update->bindParam(':userState', $userState);
		$update->bindParam(':userCountry', $userCountry);

		$update->execute();
		

		header('Location: update-profile.php');


	}

	$query = dbConnect()->prepare("SELECT * FROM users 
									WHERE userID = :userID"); 
	$query->bindParam(':userID',$userID);
	$query->execute(); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Edit/Update Profile</title>
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
	<center><legend><h4>Update/Edit Profile</h4></legend></center>
	<form name="myForm" method="post" action="" onsubmit="return confirm('Are sure to update your profile?');" autocomplete="off" >
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="username" name="userFullname" id="userFullname" class="form-control" value="<?php echo $result['userFullname'];?>" required="required">
						</div>
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
							<input type="text" name="userEmail" id="userEmail" class="form-control" value="<?php echo $result['userEmail'];?>" required="required">					
					</div>
				</li>
			</ul><p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" name="userPass" id="userPass" class="form-control" value="<?php echo $result['userPass'];?>" required="required">					
					</div>
				</li>
			</ul><p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-question-sign"></span></span>
							<input type="text" name="userGender" id="userGender" class="form-control" value="<?php echo $result['userGender'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
							<input type="text" name="userAddress" id="userAddress" class="form-control" value="<?php echo $result['userAddress'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
							<input type="text" name="userCity" id="userCity" class="form-control" value="<?php echo $result['userCity'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></span>
							<input type="text" name="userPostcode" id="userPostcode" class="form-control" value="<?php echo $result['userPostcode'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
				<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-send"></span></span>
							<input type="text" name="userState" id="userState" class="form-control" value="<?php echo $result['userState'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>	
				<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></span>
							<input type="text" name="userCountry" id="userCountry" class="form-control" value="<?php echo $result['userCountry'];?>" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<input type="submit" name="update" class="btn btn-default" value="Update" />
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
		</form>		<br>
	</div> 
</div>					
				
</center></body>
</html>