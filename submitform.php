<?php
 session_start(); 
 $conn=mysqli_connect("localhost","root","","login");           //connecting to database named login
 if(!$conn)
 {
 die("connection failed: ".mysql_connect_error());
 } 
  if(isset($_POST['college']))
	 {
	 $i=$_POST['college'];
	 $sql="UPDATE alumni SET college='$i'";
	 $result = $conn->query($sql);
	 }
  if(isset($_POST['degree']))
	 {
	 $i=$_POST['degree'];
	 $sql="UPDATE alumni SET degree='$i'";
	 $result = $conn->query($sql);
	 }
 if(isset($_POST['stream']))
	 {
	 $i=$_POST['stream'];
	 $sql="UPDATE alumni SET stream='$i'";
	 $result = $conn->query($sql);
	 }
 if(isset($_POST['sem']))
	 {
	 $i=$_POST['sem'];
	 $sql="UPDATE alumni SET sem='$i'";
	 $result = $conn->query($sql);
	 }
 if(isset($_POST['year']))
	 {
	 $i=$_POST['year'];
	 $sql="UPDATE alumni SET yr='$i'";
	 $result = $conn->query($sql);
	 }
 if(isset($_POST['org']))
	 {
	 $i=$_POST['org'];
	 $sql="UPDATE alumni SET org='$i'";
	 $result = $conn->query($sql);
	 }
 if(isset($_POST['desg']))
	 {
	 $i=$_POST['desg'];
	 $sql="UPDATE alumni SET designation='$i'";
	 $result = $conn->query($sql);
	 }
 if(isset($_POST['offadd']))
	 {
	 $i=$_POST['offadd'];
	 $sql="UPDATE alumni SET offaddress='$i'";
	 $result = $conn->query($sql);
	 }
 if(isset($_POST['sal']))
	 {
	 $i=$_POST['sal'];
	 $sql="UPDATE alumni SET salary='$i'";
	 $result = $conn->query($sql);
	 }	 
  mysqli_close($conn);
 header("Location:studentview.php");
 ?>