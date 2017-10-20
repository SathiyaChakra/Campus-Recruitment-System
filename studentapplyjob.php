<html>
<body>
  <?php
  $servername = 'localhost';
  $username = 'root';
  $password = 'helloworld';
  $dbname = 'campus';

  include 'studentlogin.php' ;
  // Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   $company = $_POST["company"];
   $job = $_POST["job"];
   $name = $_POST["stud"] ;
   if(!$conn)
   {
     die("Connection failed: " . mysqli_connect_error());
   }
   $sql = "UPDATE students set company_applied='$company' , applied_job='$job' where name='$name';";
   $result = mysqli_query($conn, $sql);
   if($result)
   {
     echo "Successfully applied for job" ;
     echo "<a style='margin-left: 5%;' href=http://localhost/campus.html>LOGOUT</a>";
   }
   else
   {
     echo "Error in applying for job" ;
     echo "<a style='margin-left: 5%;' href=http://localhost/campus.html>LOGOUT</a>";
   }
   mysqli_close($conn);
   ?>
</body>
</html>
