<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>STUDENT FORM</title>
	<link rel="stylesheet" type="test/css" href="style.css">
</head>
<body>
	 <form action="logout.php">                                <!--logout button-->
		<button>LOG OUT</button>
	 </form>
	
	<form action="student.php">                                <!--back button-->
		<button><-</button>
	 </form>
	
	<?php
	 $conn=mysqli_connect("localhost","root","","login");           //connecting to database named login
	 if(!$conn)
	 {
		die("connection failed: ".mysql_connect_error());
	 } 
	
   	 $i=$_SESSION['Emailid'];
	 $sql1="SELECT* FROM alumni WHERE Emailid='$i'";
	 $result1 = $conn->query($sql1);
	 if (!($result1->num_rows > 0))
		 {?>
		 
		 <div id="studentfrm">
		 <form action="details.php" method="POST">
			  <p>PERSONAL DETAILS</p>
			  <p>FIRSTNAME: <?php echo$_SESSION['firstname'];?></p>
			  <p>LASTNAME: <?php echo$_SESSION['lastname'];?></p>
		      <p>BATCH<select name="batch" id="batch">
				<?php for ($i = 1; $i <= 70; $i++) : ?>
					<option value="<?php echo (1990+$i).'-'.(1990+($i+4)); ?>"><?php echo (1990+$i).'-'.(1990+($i+4)); ?></option>
				<?php endfor; ?>
				</select></p>
			  
			  <p>DOB<select name="date" id="date" >
				<?php for ($i = 1; $i <=31; $i++) : ?>
					<option value="<?php echo $i;?>"><?php echo ($i); ?></option>
				<?php endfor; ?>
				</select>
				
				<select name="month" id="month">
				<?php for ($i = 1; $i <=12; $i++) : ?>
					<option value="<?php echo $i;?>"><?php echo ($i); ?></option>
				<?php endfor; ?>
				</select>
				
				<select name="yy" id="yy">
				<?php for ($i = 100; $i >=1; $i--) : ?>
					<option value="<?php echo (1990+$i); ?>"><?php echo (1990+$i); ?></option>
				<?php endfor; ?>
				</select>
			  
			  <p>CITY<input type="text" id="city" name="city" /></p>
			  <p>MOBILE NO.<input type="text" id="mob" name="mob" required/></p>
			  <p>EMAIL ID: <?php echo$_SESSION['Emailid'];?></p>
			  <p>ADDRESS:<input type="text" id="address" name="address"/></p>
			  
			  <p>PRESENT STATUS:<select name="ps" id="ps">
				 <option value="studying">STUDYING</option>
				 <option value="working">WORKING</option>
				 </select></p>
				
			  <p><input type="submit" id="btn1" value="SAVE"</p>
		 </form>
		 </div>
		 
		 <?php	 	
			 mysqli_close($conn);		 
		 }
	else
		{
		 echo"DETAILS ALREADY PRESENT YOU CAN UPDATE OR VIEW YOUR INFO";
		 echo '<div>
			 <form action="studentupdate.php" method="POST">
				<p><input type="submit" id="stupdate" value="UPDATE DETAILS"/></p>
			  </form>
			  
			  <form action="studentview.php" method="POST">
				<p><input type="submit" id="stview" value="VIEW DETAILS"/></p>
			  </form>
		 </div>';
		 mysqli_close($conn);
		 return;
		}
	?>
 </body>
</html> 