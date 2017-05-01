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
  $result = $conn->query("SELECT* FROM alumni");
  
	 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]."<br>";
		echo "firstname: " . $row["Fname"]."<br>";
        echo "lastname: " . $row["Lname"]."<br>";
		echo "batch: " . $row["BATCH"]."<br>";
		echo "DOB: ". $row["DD"]."/".$row["MM"]."/".$row["YY"]."<br>";
		echo "city: ". $row["CITY"]."<br>";
		echo "mobile No.: ". $row["MOBILENO"]."<br>";
		echo "Email: ". $row["Emailid"]."<br>";
		echo "address: ". $row["ADDRESS"]."<br>";
		echo "present status: ". $row["PRESENTST"]."<br>";
		echo "college: ". $row["COLLEGE"]."<br>";
		echo "degree: ". $row["DEGREE"]."<br>";
		echo "stream: ". $row["STREAM"]."<br>";
		echo "sem: ". $row["SEM"]."<br>";
		echo "year: ". $row["YR"]."<br>";
		echo "org: ". $row["ORG"]."<br>";
		echo "designation: ". $row["designation"]."<br>";
		echo "office address: ". $row["OFFADDRESS"]."<br>";
	    echo "salary: ". $row["SALARY"]."<br>";
		echo"<br/><br/><br/>";
		echo '<form action="viewby.php" method="POST">
         <input type="submit" id="viewby" value="viewby"/>
         </form>
          <form action="updateby.php" method="POST">
         <input type="submit" id="updateby" value="updateby"/>
          </form>';
		 }	
		 mysqli_close($conn);
	}
	else
	{
	echo "NO RECORDS PRESENT THE ALUMNI DATABASE IS EMPTY";
	mysqli_close($conn);
	}
  ?>

 </body>
 </html>