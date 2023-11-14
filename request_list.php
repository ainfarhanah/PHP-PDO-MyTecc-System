<?php 
session_start();

	$userType = $_SESSION['userType'];
	$userID = $_SESSION['userID'];
	include "listmenu.php";
	include "dbcon.php";
 	$query = dbConnect()->prepare("SELECT * FROM requests where userID = $userID && status = 'PENDING' ");
 	$query->execute();
 	
 ?>
 
<!DOCTYPE html>
<html lang="en">

<head>
<style>

label.error {
    color: #FB3A3A;
    
}
</style>
    
<title>Request Lists</title>
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


		<center><H3>Request List</H3></center>
		<div class="row">
			
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-list"></i></h3><span class="glyphicon glyphicon-list"></span>&nbsp;The list of all application sent by you to be approved.
						</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
								<tr>
									<th>Request ID</th>
									<th width="150">Full Name</th>
									<th width="150">Phone Number</th>
									<th width="150">Program Name</th>
									<th width="150">Program Organizer</th>
									<th width="150">Program Venue</th>
									<th width="150">Program Date</th>
									<th width="150">Program Time</th>
									<th width="150">Program Date</th>
									<th width="150">Status</th>
									<th colspan=2>Action</th>
								</tr>
								<?php while ($row = $query->fetch(PDO::FETCH_ASSOC))
								{ ?>
								<tr>
									<td><?php echo $row['reqID'];?></td>
									<td><?php echo $row['reqNam'];?></td>
									<td><?php echo $row['reqPhone'];?></td>
									<td><?php echo $row['reqProgram'];?></td> 
									<td><?php echo $row['reqOrganizer'];?></td> 
									<td><?php echo $row['reqVenue'];?></td> 
									<td><?php echo $row['reqDate'];?></td> 
									<td><?php echo $row['reqTime'];?></td> 
									<td><?php echo $row['appDate'];?></td> 
									<td><?php echo $row['status'];?></td> 
									<td><a href="edit_request.php?reqID=<?php echo $row['reqID'] ?>" class="btn btn-primary my-2">Edit</a> </td>
									<td><a href="delete.php?reqID=<?php echo $row['reqID'] ?>" class="btn btn-danger my-2">Delete</a> </td>
								<?php } ?>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>