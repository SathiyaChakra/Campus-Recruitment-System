<html>
<body>
  <?php
  $servername = 'localhost';
  $username = 'root';
  $password = 'helloworld';
  $dbname = 'campus';

  // Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   if(!$conn)
   {
     die("Connection failed: " . mysqli_connect_error());
   }
   $name = $_POST["firstname"];
   $studentpass = $_POST["password"];
   $mobno = (int)$_POST["mobile"];
   $gender = $_POST["gender"];
   $email = $_POST["email"];
   $address = $_POST["address"];
   $sslc = (int)$_POST["SSLC"];
   $hsc = (int)$_POST["HSC"];
   $cgpa = (int)$_POST["cgpa"];
   $languages = $_POST["lang"];
   $intern = $_POST["intern"];
   $preferred = $_POST["country"];
   $sql = "insert into students (name,mobile_no,gender,email,address,sslc,hsc,cgpa,languages,internships,preferred_loc,password,applied_job,company_applied) values ('$name',$mobno,'$gender','$email','$address',$sslc,$hsc,$cgpa,'$languages','$intern','$preferred','$studentpass','null','null');";
   $result = mysqli_query($conn, $sql);
   if($result)
   {
      echo "Registered successfully" ;
      echo "<a style='margin-left: 10%;' href=http://localhost/campus.html>BACK</a>" ;

   }
   else
   {
      echo "Error in registration" ;
      echo "<a style='margin-left: 10%;' href=http://localhost/campus.html>BACK</a>" ;
   }
   mysqli_close($conn);
   ?>
</body>
</html>
