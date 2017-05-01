<?php
 session_start(); 
 $conn=new mysqli("localhost","root","","login");                   //connecting to database named login
 if($conn->connect_error)                                             //to check the connection
 {
 die("connection failed: ".connect_error());
 } 
 $firstname=$_POST['first'];
 $lastname=$_POST['last'];
 $username=$_POST['user'];
 $password=$_POST['pass'];
 $type=$_POST['type'];
  $_SESSION['type']=$type;
  $_SESSION['Emailid']=$username;
  $_SESSION['firstname']=$firstname;
  $_SESSION['lastname']=$lastname;
  $i=$_SESSION['Emailid'];
 
  $result1 =$conn->query("SELECT * FROM `users` WHERE Email='$i'");      /*to check if email id is present in users database or not*/
 $row = $result1->fetch_assoc();
if ( $row!=NULL)
    {
        echo 'EMAIL ID ALREADY EXIST!'; 
    mysqli_close($conn);
	}
else
    {                                                                  /*if email id is not present insert info into user database*/
    $sql="INSERT INTO users(Firstname,Lastname,Email,pwd,type) 
 VALUES('$firstname','$lastname','$username','$password','$type')";
  $result = $conn->query($sql);
   mysqli_close($conn);
  header("Location:second.php");
    }
?>