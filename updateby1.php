<html>
<body>
<form action="logout.php">                                <!--logout button-->
    <button>LOG OUT</button>
 </form>
 <form action="admin.php">                                <!--back button-->
    <button><-</button>
 </form>
<?php 
 session_start();
 $conn=mysqli_connect("localhost","root","","login");
 if(!$conn)
 {
 die("connection failed: ".mysql_connect_error());
 } 
 $editby=$_POST['type1'];
 $insert=$_POST['insert'];
 $_SESSION['updateby']=$editby;
 $_SESSION['insert']=$insert;
 switch($editby)
 {
 case 'id':$sql1="SELECT* FROM alumini WHERE id='$insert'";
  break;
 case 'firstname':$sql1="SELECT* FROM alumini WHERE Fname='$insert'";
  break;
 case 'mobileno':$sql1="SELECT* FROM alumini WHERE MOBILENO='$insert'";
  break;
 case 'batch':$sql1="SELECT* FROM alumini WHERE BATCH='$insert'";
  break;
 case 'eid':$sql1="SELECT* FROM alumini WHERE Emailid='$insert'";
  break;
 }
 $result1 = $conn->query($sql1);
if ($result1->num_rows > 0) 
{
  while($row1 = $result1->fetch_assoc()) {
         echo "id: " . $row1["id"]."<br>";
		echo "firstname: " . $row1["Fname"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=firstname">Edit</a>'."<br>";
        echo "lastname: " . $row1["Lname"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=lastname">Edit</a>'."<br>";
        echo "batch: " . $row1["BATCH"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=batch">Edit</a>'."<br>";
		echo "DOB: ". $row1["DD"]."/".$row1["MM"]."/".$row1["YY"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=dob">Edit</a>'."<br>";
		echo "city: ". $row1["CITY"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=city">Edit</a>'."<br>";
	    echo "mobile No.: ". $row1["MOBILENO"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=mobileno">Edit</a>'."<br>";
        echo "Email: ". $row1["Emailid"]."     ";
		echo "address: ". $row1["ADDRESS"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=address">Edit</a>'."<br>";
		echo "present status: ". $row1["PRESENTST"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=presentstatus">Edit</a>'."<br>";
		echo "college: ". $row1["COLLEGE"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=college">Edit</a>'."<br>";
		echo "degree: ". $row1["DEGREE"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=degree">Edit</a>'."<br>";
		echo "stream: ". $row1["STREAM"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=stream">Edit</a>'."<br>";
		echo "sem: ". $row1["SEM"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=sem">Edit</a>'."<br>";
		echo "year: ". $row1["YR"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=year">Edit</a>'."<br>";
		echo "org: ". $row1["ORG"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=org">Edit</a>'."<br>";
		echo "desgnation: ". $row1["DESGNATION"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=desgnation">Edit</a>'."<br>";
		echo "office address: ". $row1["OFFADDRESS"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=officeaddress">Edit</a>'."<br>";
		echo "salary: ". $row1["SALARY"]."     ";
		echo '<a href="http://localhost/test/updateby2.php?Edit_type=salary">Edit</a>'."<br>";
	    echo"<br/><br/><br/>";
		 
		 }	
 mysqli_close($conn);
}
else
{
 echo"NO RESULT FOUND";
 mysqli_close($conn);
 return;
}
 ?>
 </body>
 </html>