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
 
 <div>
 <form action="studentform.php" method="POST">
  <p><input type="submit" id="stform" value="FILL DETAILS"/></p>
  </form>
 <form action="studentupdate.php" method="POST">
  <p><input type="submit" id="stupdate" value="UPDATE DETAILS"/></p>
  </form>
  <form action="studentview.php" method="POST">
  <p><input type="submit" id="stview" value="VIEW DETAILS"/></p>
  </form>
 </div>
 </body>
</html> 