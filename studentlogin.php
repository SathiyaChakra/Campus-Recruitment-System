<html>
<body>
  <?php if(isset($_POST["submit"])) : ?>
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
   global $studentname ;
   if(isset($_POST["textname"]))
   {
    $studentname = $_POST["textname"];
   }
   if(isset($_POST["pass"]))
   {
    $studentpass = $_POST["pass"];
   }
   else
   {
     # code...
     $studentpass = "null" ;
   }
   $sql = "SELECT name,password FROM students where name='$studentname' and password='$studentpass';";
   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) > 0)
   {
     echo "Welcome $studentname<br />" ;
     $sql2 = "SELECT * FROM company;";
     $result2 = mysqli_query($conn, $sql2);
     if(mysqli_num_rows($result2))
     {
       echo "<style>table, th, td {
 border: 1px solid black;</style>" ;
       echo "<table>" ;
       //echo "<th>Name</th>"   ;
       echo "<b style='color:blue;'>Company Details</b><br />" ;
       echo "<tbody>" ;
       echo "<th>Name</th>   <th>Post Job</th>  <th>Salary</th>  <th>GPA</th>  <th>Email</th> </b><br />" ;
       while($row = mysqli_fetch_assoc($result2))
       {
         echo "<tr><td> &nbsp "  . $row["name"] . " &nbsp </td>" ;
         echo " &nbsp <td>"  . $row["post_job"] . " &nbsp</td>" ;
         echo " &nbsp <td>"  . $row["salary"] . " &nbsp</td>" ;
         echo " &nbsp <td>"  . $row["eligibility_criteria"] . " &nbsp</td>" ;
         echo " &nbsp <td>"  . $row["email"] . " &nbsp</td></tr> <br />" ;
       }
       echo "</tbody>" ;
       echo "</table>" ;
       echo "<form method='post' action='studentapplyjob.php'>
               <input type='text' name='stud' placeholder='Enter your name' />
               <input type='text' name='company' placeholder='Enter company'/>
               <input type='text' name='job' placeholder='Enter your preferred job'/>
               <button type='submit' value='submit'>SUBMIT</button>
            </form>" ;
       echo "<a style='margin-left: 5%;' href=http://localhost/campus.html>LOGOUT</a>";
     }
     else
     {
        echo "No companies have applied" ;
        echo "<a style='margin-left: 5%;' href=http://localhost/campus.html>LOGOUT</a>";
     }
   }
   else
   {
      echo "Invalid Username or Password" ;
      echo "<a style='margin-left: 10%;' href=http://localhost/campus.html>BACK</a>" ;
   }
   mysqli_close($conn);
   ?>
   <?php endif; ?>
</body>
</html>
