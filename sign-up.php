<!DOCTYPE html>
<html lang="en">
<style>
body{
	background-image: url("Images/grid.gif");
	background-repeat: repeat;
	background-attachment: fixed;
}


</style>

<head>
  <title>Sign Up</title>
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
      <li><a href="index.php">Home</a></li>
      <li><a href="about-us.php">About Us</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      
    </ul>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="sign-up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
  </nav>

 
<div class="container">
  <div class="jumbotron">
  <br>
  <center><img src="./img/logo.jpg" height="70"><br><h5>Complete your details and submit</h5></center>
		<fieldset><center><legend><h2>Sign up as MyTecc Member</h2></legend></center>
		<?php if(!isset($_POST['signup'])) 
		{ 
		if($userEmail='')
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
					<input type="name" name="userFullname" class="form-control" placeholder="Full Name" >
                </div>
            </div>
		</li>
		<p><br>
		</ul>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
            <div class="col-xs-20">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
					<input type="text" name="userEmail" class="form-control" placeholder="Email">
                </div>
            </div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
            <div class="col-xs-20">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="userPass" class="form-control" placeholder="Password" >
                </div>
            </div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
			<div class="col-xs-20">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-question-sign"></span></span>
					<select name="userGender" id="userGender" class="form-control">
						<option class="form-control">--Gender--</option>
  						<option value="Male" class="form-control">Male</option>
  						<option value="Female">Female</option>
					</select>
				</div>
			</div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
            <div class="col-xs-20">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
					<input type="text" name="userAddress" class="form-control" placeholder="Address" >
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
					<input type="text" name="userCity" class="form-control" placeholder="City" >
                </div>
            </div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
            <div class="col-xs-20">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></span>
					<input type="text" name="userPostcode" class="form-control" placeholder="Postcode" >
                </div>
            </div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
            <div class="col-xs-20">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-send"></span></span>
					<input type="text" name="userState" class="form-control" placeholder="State" >
                </div>
            </div>
		</li>
		</ul>
		<p><br>
		<ul align="center">
		<li class="col-md-4 col-md-offset-4" style="list-style-type: none;">
            <div class="col-xs-20">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></span>
					<input type="text" name="userCountry" class="form-control" placeholder="Country" >
                </div>
            </div>
		</li>
		</ul>
		<ul>
		<p><br>
		<li style="list-style-type: none;" align="center">
			<input type="submit" class="btn btn-default btn-lg" value="Confirm Sign Up" name="signup">
        </li>
		</ul>
		</form></fieldset>
		<?php 
} else {
	$userFullName = $_POST['userFullname'];
	$userEmail = $_POST['userEmail'];
	$userPass = $_POST['userPass'];
	$userGender = $_POST['userGender'];
	$userAddress = $_POST['userAddress'];
	$userCity = $_POST['userCity'];
	$userPostcode = $_POST['userPostcode'];
	$userState = $_POST['userState'];
	$userCountry = $_POST['userCountry'];
	
	$userType = 'user';  // usertype	
	
	require 'dbcon.php';
	// Check if username already exist
	$sthandler = dbConnect()->prepare("SELECT userEmail FROM users WHERE userEmail = :userEmail");
	$sthandler->bindParam(':userEmail', $userEmail);
	$sthandler->execute();

	//if($sthandler->rowCount() > 0){
	//	echo "<div class='alert alert-danger' role='alert' style='text-align:center'><strong>The username has been used</strong><a href='forgotten_password.php'><strong>Request a new password?</strong></a></div>";
	///} else {
	// Prepaire SQL Statement
	$query = dbconnect()->prepare("INSERT INTO users (userFullname, userEmail, userPass, userGender, userAddress, userCity, userPostcode, userState, userCountry, userType) 
	VALUES (:userFullname, :userEmail, :userPass, :userGender, :userAddress, :userCity, :userPostcode, :userState, :userCountry, :userType)");
	
	    $query->bindParam(':userFullname', $_POST['userFullname']);
		$query->bindParam(':userEmail', $_POST['userEmail']);
		$query->bindParam(':userPass', $_POST['userPass']);
		$query->bindParam(':userGender', $_POST['userGender']);
		$query->bindParam(':userAddress', $_POST['userAddress']);
		$query->bindParam(':userCity', $_POST['userCity']);
		$query->bindParam(':userPostcode', $_POST['userPostcode']);
		$query->bindParam(':userState', $_POST['userState']);
		$query->bindParam(':userCountry', $_POST['userCountry']);
		$query->bindParam(':userType', $userType);
		
        if($query->execute()){
			
            echo "<div class='alert alert-success' role='alert' style='text-align:center'><strong>You just registered your email!</strong><br/><a href='login.php'><strong>Proceed to Login</strong></a></div>";

		} 	
	}	
	

?>
	</div>
</div>
</body>
</html>
