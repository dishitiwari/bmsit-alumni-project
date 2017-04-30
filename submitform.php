<?php
 session_start(); 
 $conn=mysqli_connect("localhost","root","","login");           //connecting to database named login
 if(!$conn)
 {
 die("connection failed: ".mysql_connect_error());
 } 
 $first=$_POST['fn']; $last=$_POST['ln'];                //insert values in database
 $batch=$_POST['batch'];$date=$_POST['date'];
 $month=$_POST['month']; $yy=$_POST['yy'];
 $city=$_POST['city'];$mob=$_POST['mob'];
 $Emailid=$_SESSION['Emailid'];
 $address=$_POST['address'];$ps=$_POST['ps'];
 $college=$_POST['college']; $degree=$_POST['degree'];
 $stream=$_POST['stream'];$sem=$_POST['sem'];
 $year=$_POST['year'];$org=$_POST['org'];
 $desg=$_POST['desg'];$offadd=$_POST['offadd'];
 $sal=$_POST['sal'];
 $sql="INSERT INTO alumini(Fname,lname,batch,dd,mm,yy,city,mobileno,Emailid,address,presentst,college,degree,stream,sem,yr,org,desgnation,offaddress,salary) 
 VALUES('$first','$last','$batch','$date','$month','$yy','$city','$mob','$Emailid','$address','$ps','$college','$degree','$stream','$sem','$year','$org','$desg','$offadd','$sal')";
  $result = $conn->query($sql);
  mysqli_close($conn);
 header("Location:studentview.php");
 ?>