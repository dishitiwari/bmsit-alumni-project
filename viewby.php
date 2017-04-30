 <?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<title>viewby</title>
<link rel="stylesheet" type="test/css" href="style.css">
</head>
<body>
<form action="logout.php">                                <!--logout button-->
    <button>LOG OUT</button>
 </form>
 <form action="admin.php">                                <!--back button-->
    <button><-</button>
 </form>
<form action="viewby1.php" method="POST">
<p><select name="type1" id="type1">
     <option value="id">ID</option>
	 <option value="firstname">FIRST NAME</option>
     <option value="mobileno">MOBILE NO.</option>
	 <option value="batch">BATCH</option>
     <option value="eid">EMAILID</option>
  </select><input type="insert" id="insert" name="insert" placeholder="enter value to be searched" required/></p>
  <p><input type="submit" id="search" value="SEARCH"/></p>
 </form>
 </body>
</html>