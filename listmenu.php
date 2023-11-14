<?php

function home()
{
	if(empty($_SESSION['userType']))
	{
		echo '<a class="navbar-brand" href="home.php">Crowdsourcing</a>';
	}
	else
	{
		echo '<a class="navbar-brand" href="dashboard.php">Home</a>';
	}
}
function listmenu()
{
	if(empty($_SESSION['userType']))
	{
		echo '<li class="hidden">
								<a href="#page-top"></a>
							</li>
							<li>
								<a class="page-scroll" href="signup.php">
									<span class="glyphicon glyphicon-user"></span>&nbsp;Sign Up
								</a>
							</li>
							<li>
								<a class="page-scroll" href="login.php">
									<span class="glyphicon glyphicon-log-in"></span>&nbsp;Login
								</a>
							</li>';
	}
	else
	{
		$userEmail=$_SESSION['userEmail'];
		$userType = $_SESSION['userType'];
		if($userType == 'admin')
		{
			echo '<li class="hidden">
								<a href="#page-top"></a>
							</li>
							
							<li>
								<a class="page-scroll" href="request_approval.php">
								<span class="glyphicon glyphicon-paperclip"></span>&nbsp;Application Request</a>
							</li>
							<li>
								<a class="page-scroll" href="approved-request.php">
								<span class="glyphicon glyphicon-list"></span>&nbsp;Request Lists</a>
							</li>
							<li>
								<a class="page-scroll" href="users.php">
									<span class="glyphicon glyphicon-user"></span>&nbsp;User Lists
								</a>
							</li>
							
							<li>
								<a class="page-scroll" href="logout.php">
									<span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout
								</a>
							</li>';
		}
		else if($userType == 'user')
		{
			echo '<li class="hidden">
								<a href="#page-top"></a>
							</li>
							
							<li>
								<a class="page-scroll" href="request.php">
									<span class="glyphicon glyphicon-paperclip"></span>&nbsp;Request
								</a>
							</li>
							<li>
								<a class="page-scroll" href="request_list.php">
									<span class="glyphicon glyphicon-list"></span>&nbsp;Request List
								</a>
							</li>
							<li>
								<a class="page-scroll" href="status.php">
									<span class="glyphicon glyphicon-list-alt"></span>&nbsp;Request Status
								</a>
							</li>
							<li>
								<a class="page-scroll" href="update-profile.php">
									<span class="glyphicon glyphicon-user"></span>&nbsp;View Profile
								</a>
							</li>
							<li>
								<a class="page-scroll" href="logout.php">
									<span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout
									</a>
							</li>';
		}
	}
}
?>