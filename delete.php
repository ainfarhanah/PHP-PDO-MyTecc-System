<?php $conn = new PDO('mysql:host=localhost; dbname=mytecc','root', ''); 


$reqID=$_GET['reqID'];
 
// sql to delete a record
$sql = "Delete from requests where reqID = '$reqID'";
 
// use exec() because no results are returned
$conn->exec($sql);
header('location:request_list.php');
?>
