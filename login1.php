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
 echo"your username or password is incorrect!";
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