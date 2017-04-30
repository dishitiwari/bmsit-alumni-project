<html>
<body>
<form action="logout.php">                                <!--logout button-->
    <button>LOG OUT</button>
 </form>
  <form action="student.php">                                <!--back button-->
    <button><-</button>
 </form>
<?php
 session_start(); 
 $conn=mysqli_connect("localhost","root","","login");           //connecting to database named login
 if(!$conn)
 {
 die("connection failed: ".mysql_connect_error());
 } 
 //displaying details 
 $i=$_SESSION['Emailid'];
 $sql1="SELECT* FROM alumini WHERE Emailid='$i'";
 $result1 = $conn->query($sql1);
if ($result1->num_rows > 0) 
{
  echo "your details are"."</br>";
  while($row1 = $result1->fetch_assoc()) {
        echo "id: " . $row1["id"]."<br>";
		echo "firstname: " . $row1["Fname"]."<br>";
        echo "lastname: " . $row1["Lname"]."<br>";
		echo "batch: " . $row1["BATCH"]."<br>";
		echo "DOB: ". $row1["DD"]."/".$row1["MM"]."/".$row1["YY"]."<br>";
		echo "city: ". $row1["CITY"]."<br>";
		echo "mobile No.: ". $row1["MOBILENO"]."<br>";
		echo "Email: ". $row1["Emailid"]."<br>";
		echo "address: ". $row1["ADDRESS"]."<br>";
		echo "present status: ". $row1["PRESENTST"]."<br>";
		echo "college: ". $row1["COLLEGE"]."<br>";
		echo "degree: ". $row1["DEGREE"]."<br>";
		echo "stream: ". $row1["STREAM"]."<br>";
		echo "sem: ". $row1["SEM"]."<br>";
		echo "year: ". $row1["YR"]."<br>";
		echo "org: ". $row1["ORG"]."<br>";
		echo "desgnation: ". $row1["DESGNATION"]."<br>";
		echo "office address: ". $row1["OFFADDRESS"]."<br>";
	    echo "salary: ". $row1["SALARY"]."<br>";
		echo"<br/><br/><br/>";
		 }	
     mysqli_close($conn);		 
}
else
{
 echo"NO RESULT FOUND,PLEASE FILL THE DETAILS";
 mysqli_close($conn);
 return;
}
?>
 </body>
 </html>