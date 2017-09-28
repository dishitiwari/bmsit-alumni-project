<html>
<body>
	<form action="logout.php">                                <!--logout button-->
		<button>LOG OUT</button>
	</form>
	<form action="student.php">                                <!--back button-->
		<button><-</button>
	</form>
<?php
	session_start(); 
	$conn=mysqli_connect("localhost","root","","login");           //connecting to database named login
	if(!$conn)
		{
			die("connection failed: ".mysql_connect_error());
		} 
 
	//displaying details 
	$i=$_SESSION['Emailid'];
	$sql1="SELECT* FROM alumni WHERE Emailid='$i'";
	include("updatefunction.php");
?>

 </body>
 </html>