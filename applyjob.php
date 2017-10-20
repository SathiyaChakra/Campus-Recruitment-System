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
   //var_dump($_POST);
   $company = $_POST["company"];
   $job = $_POST["job"];
   $salary = $_POST["salary"];
   $eligibility = $_POST["eligibility"];
   $sql = "UPDATE company
           SET
           post_job='$job',
           salary=$salary,
           eligibility_criteria=$eligibility
           WHERE name='$company' ;";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
       echo "Job posted" ;
       echo "<a style='margin-left: 5%;' href=http://localhost/campus.html>LOGOUT</a>";3
    }
    else
    {
       echo "Error in job posting" ;
       echo "<a style='margin-left: 10%;' href=http://localhost/campus.html>BACK</a>" ;
    }
    mysqli_close($conn);
    ?>
 </body>
 </html>
