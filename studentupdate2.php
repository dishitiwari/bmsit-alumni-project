<!DOCTYPE html>
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
	 
	 $i=$_SESSION['Emailid'];
	 $sql1="SELECT* FROM alumni WHERE Emailid='$i'";
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
				 <p>FIRSTNAME<input type="text" id="fn" name="fn" required placeholder=';
				 if(isset($_POST['fn'])) $i=$_POST['fn']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['fn']))
					 {
					 $i=$_POST['fn'];
					 $sql_users="UPDATE users SET Firstname='$i' WHERE Email='$_SESSION[Emailid]'";
					 $sql2="UPDATE alumni SET Fname='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
			 
			 case 'lastname':                                        //to edit LASTNAME
				 $i =$row1["Lname"];
				 echo '<form action=" " method="POST">
				 <p>LASTNAME<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql_users="UPDATE users SET Lastname='$i' WHERE Email='$_SESSION[Emailid]'";
					 $sql2="UPDATE alumni SET Lname='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				 break;

				case 'batch':                                        //to edit batch
				 $i =$row1["BATCH"];
				 echo '<form action=" " method="POST">
				 <p>BATCH<select name="edit" id="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p>';
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
					 $sql2="UPDATE alumni SET BATCH='$i' WHERE Emailid='$_SESSION[Emailid]'";
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
					 $sql2="UPDATE alumni SET DD='$p' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				  if(isset($_POST['edit2']))
					 {
					 $q=$_POST['edit2'];
					 $sql3="UPDATE alumni SET MM='$q' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				 //error
				 if(isset($_POST['edit3']))
					 {
					 $r=$_POST['edit3'];
					 $sql4="UPDATE alumni SET YY='$r' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
			   case 'city':                                        //to edit city
				 $i =$row1["CITY"];
				 echo '<form action=" " method="POST">
				 <p>CITY<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET CITY='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'mobileno':                                        //to edit mobileno
				 $i =$row1["MOBILENO"];
				 echo '<form action=" " method="POST">
				 <p>MOBILE NO<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET MOBILENO=$i WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'address':                                        //to edit address
				 $i =$row1["ADDRESS"];
				 echo '<form action=" " method="POST">
				 <p>ADDRESS<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET ADDRESS='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;

				case 'presentstatus':                                        //to edit presentstatus
				 $i =$row1["PRESENTST"];
				 echo '<form action=" " method="POST">
				 <p>PRESENT STATUS:<select name="edit" id="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo '>
				 <option value="studying">STUDYING</option>
				 <option value="working">WORKING</option>
				 <option value="selfemp">SELF-EMPLOYED</option>
			    </select></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET PRESENTST='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'college':                                        //to edit college
				 $i =$row1["COLLEGE"];
				 echo '<form action=" " method="POST">
				 <p>COLLEGE<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET COLLEGE='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'degree':                                        //to edit degree
				 $i =$row1["DEGREE"];
				 echo '<form action=" " method="POST">
				 <p>DEGREE<input type="text" id="edit" name="edit"  required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET DEGREE='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'stream':                                        //to edit stream
				 $i =$row1["STREAM"];
				 echo '<form action=" " method="POST">
				 <p>STREAM<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET STREAM='$i'";
					 }
				break;

				case 'sem':                                        //to edit sem
				 $i =$row1["SEM"];
				 echo '<form action=" " method="POST">
				 <p>SEM<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET SEM='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'year':                                        //to edit year
				 $i =$row1["YR"];
				 echo '<form action=" " method="POST">
				 <p>YEAR<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET YR=$i WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'org':                                        //to edit org
				 $i =$row1["ORG"];
				 echo '<form action=" " method="POST">
				 <p>ORG<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET ORG='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'designation':                                        //to edit designation
				 $i =$row1["DESIGNATION"];
				 echo '<form action=" " method="POST">
				 <p>designation<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET designation='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'officeaddress':                                        //to edit officeaddress
				 $i =$row1["OFFADDRESS"];
				 echo '<form action=" " method="POST">
				 <p>OFFADDRESS<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET OFFADDRESS='$i' WHERE Emailid='$_SESSION[Emailid]'";
					 }
				break;
				
				case 'salary':                                        //to edit salary
				 $i =$row1["SALARY"];
				 echo '<form action=" " method="POST">
				 <p>SALARY<input type="text" id="edit" name="edit" required placeholder=';
				 if(isset($_POST['edit'])) $i=$_POST['edit']; echo $i;
				 echo ' ></p><p><input type="submit" id="submit" name="submit" value="UPDATE"</p>
				 </form>';
				 if(isset($_POST['edit']))
					 {
					 $i=$_POST['edit'];
					 $sql2="UPDATE alumni SET SALARY='$i' WHERE Emailid='$_SESSION[Emailid]'";
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
			   if(isset($sql_users))
					{ if ($conn->query($sql_users) === TRUE); } 
			   if(isset($sql2))
					if ($conn->query($sql2) === TRUE) 
						echo "Record updated successfully".'<br>';
					else 
						echo "Error updating record: " . $conn->error;
			  
		  }
		}
	 }
	  include("updatefunction.php");
	?>
</body>
</html>
