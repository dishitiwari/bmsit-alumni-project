<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<title>display</title>
<link rel="stylesheet" type="test/css" href="style.css">
</head>
<body>
<form action="logout.php">
    <button>LOG OUT</button>
 </form>
<div id="frm">
<form action="adminview.php" method="POST">
  <p><input type="submit" id="view" value="FULLDETAIL"/></p>
  </form>
<form action="viewby.php" method="POST">
  <p><input type="submit" id="viewby" value="viewby"/></p>
 </form>
<form action="updateby.php" method="POST">
  <p><input type="submit" id="updateby" value="updateby"/></p>
</form>  
 </div>
 </body>
</html> 