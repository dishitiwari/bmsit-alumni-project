<?php 
 session_start();
 $conn=mysqli_connect("localhost","root","","login");                //connecting to database named login
 if(!$conn)                                                                   //to check the connection
 {
 die("connection failed: ".mysql_connect_error());
 } 
 $username=$_POST['user'];
 $password=$_POST['pass'];
 $type=$_POST['type'];
 $sql="SELECT* FROM users WHERE Email='$username' AND pwd='$password' AND type='$type'";
 $result = $conn->query($sql);
if(!$row=$result->fetch_assoc())
{
 echo"your username or password is incorrect please try again!";
 echo '<!DOCTYPE html>
<html>
<head>
</head>
<body>
 <div id="frm1">                                               
 <form action="login1.php" method="POST">                                         <!--login-->
  <p>Email:<input type="text" id="user" name="user" placeholder="                eg @gmail.com" required /></p>
  <p>password:<input type="password" id="pass" name="pass" required/></p>
  <p><select name="type" id="type">
     <option value="admin">ADMIN</option>
     <option value="student">STUDENT</option>
  </select></p>
  <p><input type="submit" id="btn" value="Login"/></p>                         
 </form>
 </div>
<div id="frm2">
<form action="signup1.html" method="POST">                                            <!-- signup-->
  <p>Dont have an account?<input type="submit" id="btn" value="Sign up"/></p>
 </form>
 </div>
 </body>
 </head>';
 return;
}
else
{
 $_SESSION['Emailid']=$row['Email'];
 $_SESSION['type']=$row['type'];
 }
 mysqli_close($conn);
 header("Location:second.php");
 
 ?>