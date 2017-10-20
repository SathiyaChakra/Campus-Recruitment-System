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
   $adminuser = $_POST["textname"];
   $adminpass = $_POST["pass"];
   $sql = "SELECT name,password FROM admin where name='$adminuser' and password='$adminpass';";
   $result = mysqli_query($conn, $sql);
   if(mysqli_num_rows($result) > 0)
   {
     echo "Welcome $adminuser<br />" ;
     $sql2 = "SELECT * FROM company;";
     $result2 = mysqli_query($conn, $sql2);
     if(mysqli_num_rows($result2))
     {
       echo "<style>table, th, td {
 border: 1px solid black;</style>" ;
       echo "<table>" ;
       //echo "<th>Name</th>"   ;
       echo "<b>Company Details</b>" ;
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
       echo "<br /> <br /> <br /> <br /> <br /> <br /><br /><br /><br /><br /><br />" ;
       $sql3 = "SELECT * from students ;" ;
       $result3 = mysqli_query($conn,$sql3);
       if(mysqli_num_rows($result3))
       {
         echo "<style>table, th, td {
   border: 1px solid black;
}</style>" ;
         echo "<b>Student Details</b><br />" ;
         echo "<table class='container'><thead><tr><th>NAME</th>   &nbsp &nbsp <th>MOB.NO</th> &nbsp &nbsp <th>GENDER</th> &nbsp  &nbsp     <th>EMAIL</th> &nbsp &nbsp    <th>PREF.LOC</th> &nbsp &nbsp     <th>ADDRESS</th>  &nbsp &nbsp   <th>SSLC</th>  &nbsp &nbsp  <th>HSC</th>  &nbsp &nbsp  <th>CGPA</th>  &nbsp &nbsp  <th>LANGUAGES</th>  &nbsp &nbsp  <th>INTERNSHIPS</th> &nbsp  &nbsp    <th>APPLIED JOB</th></tr></thead><br />" ;
         echo "<tbody>" ;
         while($row = mysqli_fetch_assoc($result3))
         {
           echo "<tr> &nbsp <td>"  . $row["name"] . " &nbsp</td> " ;
           //echo "<th>Mobile No</th>" ;
           echo " &nbsp <td>"  . $row["mobile_no"] .  " &nbsp</td>  " ;
           echo " &nbsp <td>"  . $row["gender"]   .        " &nbsp</td>  " ;
           echo " &nbsp <td>"  . $row["email"]   .        " &nbsp</td>  " ;
           echo " &nbsp <td>"  . $row["preferred_loc"]   .        " &nbsp</td>  " ;
           echo " &nbsp <td>"  . $row["address"]   .        " &nbsp</td>  " ;
           echo " &nbsp <td>"  . $row["sslc"]   .        " &nbsp </td> " ;
           echo " &nbsp <td>"  . $row["hsc"]   .        " &nbsp </td> " ;
           echo " &nbsp <td>"  . $row["cgpa"]   .        " &nbsp </td> " ;
           echo " &nbsp <td>"  . $row["languages"]   .        " &nbsp </td> " ;
           echo " &nbsp <td>"  . $row["internships"]   .        " &nbsp </td>" ;
           echo " &nbsp <td>"  . $row["applied_job"]   .        " &nbsp </td></tr> <br />" ;
         }
         echo '</tbody>' ;
         echo '</table>' ;
         echo "<a style='margin-left: 5%;' href=http://localhost/campus.html>LOGOUT</a>";
       }
     }
   }
   else
   {
      echo "Invalid username or password" ;
      echo "<a style='margin-left: 10%;' href=http://localhost/campus.html>BACK</a>" ;
   }
   mysqli_close($conn);
   ?>
</body>
</html>
