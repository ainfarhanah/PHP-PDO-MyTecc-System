<?php 
session_start();

	$userEmail = $_SESSION['userEmail'];
	$userID = $_SESSION['userID'];
	$userType = $_SESSION['userType'];
	include "listmenu.php";
	include "dbcon.php";
	
	$query = dbConnect()->prepare("SELECT * FROM users 
									WHERE userID = :userID"); 
	$query->bindParam(':userID',$userID);
	$query->execute(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
		<link rel="icon" href="./img/logo.jpg" type="image/gif" sizes="16x16">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">	
  <div class="container-fluid">
  	 <div class="navbar-header">
     <img src="./img/logo.jpg" width="50" height="50">
    </div>

      <div class="navbar-header">
      <a class="navbar-brand" href="#">MyTecc UiTM</a>
    </div>
   	  <ul class="nav navbar-nav">
      <li class="active"><a href="dashboard.php">Home</a></li>
      
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
		<center><H3>Hi! Welcome <?php $result = $query->fetch(PDO::FETCH_LAZY); echo $result['userFullname'];?>! </H3></center><br>
		<div class="row">
			<div class="col-lg-2"></div>
				<div class="col-lg-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-list"></i><span class="glyphicon glyphicon-user"></span>&nbsp;User Profile</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								
								<table class="table table-bordered table-hover table-striped">
									
									<tr>
										<th><center>Full Name</center></th>
										<td><?php echo $result['userFullname']; ?></th>
									</tr>
									<tr>
										<th><center>Email</center></th>
										<td><?php echo $result['userEmail']; ?></td>
									</tr>
									<tr>
										<th><center>Gender</center></th>
										<td><?php echo $result['userGender']; ?></td>
									</tr>
									<tr>
										<th><center>Address</center></th>
										<td><?php echo $result['userAddress']; ?></td>
									</tr>
									<tr>
										<th><center>City</center></th>
										<td><?php echo $result['userCity']; ?></td>
									</tr>
									<tr>
										<th><center>Postcode</center></th>
										<td><?php echo $result['userPostcode']; ?></td>
									</tr>
									<tr>
										<th><center>State</center></th>
										<td><?php echo $result['userState']; ?></td>
									</tr>
									<tr>
										<th><center>Country</center></th>
										<td><?php echo $result['userCountry']; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		<br><br><br><br>
	
     <div class="clearfix visible-lg"></div>
  </div>
  
  </div>

</body>
</html>
