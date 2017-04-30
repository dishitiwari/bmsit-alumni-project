<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<body>
<?php
   if(($_SESSION['type'])==='admin')
   {
    header("Location:admin.php");
   }
   else
   {
    header("Location:student.php");
   }
?>
  </body>
  </html>