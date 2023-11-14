<?php include "listmenu.php"; ?>
<!DOCTYPE html>
<html lang="en">
<style>

</style>

<head>
  <title>Log in</title>
	<link rel="icon" href="./img/logo.jpg" type="image/gif" sizes="16x16">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
      <li class=""><a href="#">Home</a></li>
      <li><a href="about-us.php">About Us</a></li>
      <li><a href="gallery.php">Gallery</a></li>
    </ul>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="sign-up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
  </nav>
<body>
  
<div class="container">
  <div class="jumbotron">
  <br>
 
  <center><img src="./img/logo.jpg" height="70"></center>
		
		<center><legend><h2>Log in</h2></legend></center>
		<H4 align="center">Enter your email and password</H4><br>
		<?php 
		session_start();
		//require 'lib/password.php';
		require 'dbcon.php';

		if(!isset($_POST['loginUser'])) 
		{ ?>
	  <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" name="userEmail" id="userEmail" class="form-control" placeholder="Email" required="required">
						</div>
					</div>
				</li>
			</ul><p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<div class="col-xs-20">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" name="userPass" id="userPass" class="form-control" placeholder="Password" required="required">					
					</div>
				</li>
			</ul>
			<p><br>
			<ul align="center">
				<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
					<input type="submit" class="btn btn-default btn-md" name="loginUser" value="Login"> 
				</li>
			</ul>
		</form>
		<?php 
} else {
	$userEmail = $_POST['userEmail'];
	$userPass = $_POST['userPass'];
	// Encrypt Password
	//$encrypted = md5($userpassword);
	// Include Database Connection
	require_once 'dbcon.php';
	
	$result = dbConnect()->prepare("SELECT userType, userEmail, userID, userPass FROM users WHERE userEmail = :userEmail AND userPass= :userPass");
	$result->bindParam(':userEmail', $userEmail);
	$result->bindParam(':userPass', $userPass);
	$result->execute();
	$rows = $result->fetch();
	
	$userType = @$rows['userType'];
	$userID = @$rows['userID'];
	
	
	if($rows > 0) 
	{
	
		session_start();
		$_SESSION['userType'] = $userType;
		$_SESSION['userEmail']= $userEmail;
		$_SESSION['userID']= $userID;
		header("Location: dashboard.php");
	}
	else 
	{
		echo "<div class='alert alert-danger' role='alert' style='text-align:center'><strong>Your details did not match or you are not yet registered!<br/></strong><a href='forgotten_password.php'><strong>Request a new password?</strong></a><br/><a href='login.php'><strong>Retry Login?</strong></a></div>";
	
	}
}
?>
		
  
  

	
   <div class="clearfix visible-lg"></div>
  </div>
  
  </div>

 
</body>
</html>
