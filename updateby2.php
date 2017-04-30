<!DOCTYPE html>
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
 $conn=mysqli_connect("localhost","root","","login");           //connecting to database named login
 if(!$conn)
 {
 die("connection failed: ".mysql_connect_error());
 } 
 $editby=$_SESSION['updateby'];
 $insert=$_SESSION['insert'];
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
  $Edit_type = $_GET['Edit_type']; 
 switch($Edit_type)                                        /*editing student details acc to edit_type*/
 {
  case 'firstname':                                        //to edit firstname
     $i =$row1["Fname"];
     echo '<form action=" " method="POST">
     <p>FIRSTNAME<input type="text" id="fn" name="fn"  placeholder=';
	 if(isset($_POST['fn'])) $i=$_POST['fn']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['fn']))
	 {
	 $i=$_POST['fn'];
	 $sql2="UPDATE alumini SET Fname='$i'";
	 }
    break;
  case 'lastname':                                        //to edit LASTNAME
     $i =$row1["Lname"];
     echo '<form action=" " method="POST">
     <p>LASTNAME<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET Lname='$i'";
	 }
    break;
	case 'batch':                                        //to edit batch
     $i =$row1["BATCH"];
     echo '<form action=" " method="POST">
	 <p>BATCH<select name="edit" id="edit" placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p>';
    for ($i = 1; $i <= 70; $i++) : 
     echo '<option value="'; echo (1990+$i).'-'.(1990+($i+4)); echo'">'; echo (1990+$i).'-'.(1990+($i+4)); 
	 echo'</option>';
    endfor; 
    echo '</select></p>
     <input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET BATCH='$i'";
	 }
    break;
	case 'dob':                                        //to edit dob
     echo '<form action=" " method="POST"><p>DOB<select name="edit1" id="edit1" >';
    for ($i = 1; $i <=31; $i++) : 
    echo '<option value="';echo $i;echo'">';echo ($i);echo'</option>';
    endfor; 
    echo'</select><select name="edit2" id="edit2">';
    for ($i = 1; $i <=12; $i++) : 
    echo '<option value="';echo $i;echo'">'; echo ($i);echo'</option>';
    endfor;
	echo'</select><select name="edit3" id="edit3">';
    for ($i = 100; $i >=1; $i--) :
    echo'  <option value="';echo (1990+$i);echo'">';echo (1990+$i);echo'</option>';
    endfor;
    echo'</select></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 //error
	 
	 if(isset($_POST['edit1']))
	 {
	 $p=$_POST['edit1'];
	 $sql2="UPDATE alumini SET DD='$p'";
	 }
	  if(isset($_POST['edit2']))
	 {
	 $q=$_POST['edit2'];
	 $sql3="UPDATE alumini SET MM='$q'";
	 }
	 //error
	 if(isset($_POST['edit3']))
	 {
	 $r=$_POST['edit3'];
	 $sql4="UPDATE alumini SET YY='$r'";
	 }
    break;
	
  case 'city':                                        //to edit city
     $i =$row1["CITY"];
     echo '<form action=" " method="POST">
     <p>CITY<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET CITY='$i'";
	 }
    break;
	case 'mobileno':                                        //to edit mobileno
     $i =$row1["MOBILENO"];
     echo '<form action=" " method="POST">
     <p>MOBILE NO<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET MOBILENO=$i";
	 }
    break;
	case 'address':                                        //to edit address
     $i =$row1["ADDRESS"];
     echo '<form action=" " method="POST">
     <p>ADDRESS<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET ADDRESS='$i'";
	 }
    break;
	case 'presentstatus':                                        //to edit presentstatus
     $i =$row1["PRESENTST"];
     echo '<form action=" " method="POST">
	 <p>PRESENT STATUS:<select name="edit" id="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo '/>
     <option value="studying">STUDYING</option>
     <option value="working">WORKING</option>
	 <option value="selfemp">SELF-EMPLOYED</option>
  </select></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET PRESENTST='$i'";
	 }
    break;
	
	case 'college':                                        //to edit college
     $i =$row1["COLLEGE"];
     echo '<form action=" " method="POST">
     <p>COLLEGE<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET COLLEGE='$i'";
	 }
    break;
	
	case 'degree':                                        //to edit degree
     $i =$row1["DEGREE"];
     echo '<form action=" " method="POST">
     <p>DEGREE<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET DEGREE='$i'";
	 }
    break;
	
	case 'stream':                                        //to edit stream
     $i =$row1["STREAM"];
     echo '<form action=" " method="POST">
     <p>STREAM<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET STREAM='$i'";
	 }
    break;
	case 'sem':                                        //to edit sem
     $i =$row1["SEM"];
     echo '<form action=" " method="POST">
     <p>SEM<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET SEM='$i'";
	 }
    break;
	
	case 'year':                                        //to edit year
     $i =$row1["YR"];
     echo '<form action=" " method="POST">
     <p>YEAR<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET YR=$i";
	 }
    break;
	case 'org':                                        //to edit org
     $i =$row1["ORG"];
     echo '<form action=" " method="POST">
     <p>ORG<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET ORG='$i'";
	 }
    break;
	case 'desgnation':                                        //to edit designation
     $i =$row1["DESGNATION"];
     echo '<form action=" " method="POST">
     <p>DESGNATION<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET DESGNATION='$i'";
	 }
    break;
	case 'officeaddress':                                        //to edit officeaddress
     $i =$row1["OFFADDRESS"];
     echo '<form action=" " method="POST">
     <p>OFFADDRESS<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo ' required/></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET OFFADDRESS='$i'";
	 }
    break;
	case 'salary':                                        //to edit salary
     $i =$row1["SALARY"];
     echo '<form action=" " method="POST">
     <p>SALARY<input type="text" id="edit" name="edit"  placeholder=';
	 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
	 echo '></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
	 </form>';
	 if(isset($_POST['edit']))
	 {
	 $i=$_POST['edit'];
	 $sql2="UPDATE alumini SET SALARY='$i'";
	 }
    break;
		
 }
  if(isset($_POST['submit']))
  {
	if((isset($sql3))&&(isset($sql4)))
	{
    if ($conn->query($sql3) === TRUE); 
	if ($conn->query($sql4) === TRUE);
   }
   
   if ($conn->query($sql2) === TRUE) 
	echo "Record updated successfully".'<br>';
   else 
	echo "Error updating record: " . $conn->error;
  
  }
 }
 }
 
 $result1 = $conn->query($sql1);
if ($result1->num_rows > 0) 
{
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
 echo"NO RESULT FOUND";
 mysqli_close($conn);
 return;
}

?>
</body>
</html>
