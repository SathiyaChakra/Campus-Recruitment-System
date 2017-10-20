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
   global $name ;
   $name = $_POST["user"];
   $companypass = $_POST["pass"];
   $sql = "SELECT id,name,password FROM company where name='$name' and password='$companypass';";
   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) > 0)
   {
        //echo "Welcome $name" ;
        $sql2 = "SELECT * FROM students where company_applied='$name'";
        $result2 = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($result2) > 0)
        {
          echo "Welcome $name<br />" ;
          echo "<style>table, th, td {
    border: 1px solid black;
}</style>" ;
          echo "<b style='color:Gold;'>Student Details</b><br />" ;
          echo "<table class='container'><thead><tr><th>NAME</th>   &nbsp &nbsp <th>MOB.NO</th> &nbsp &nbsp <th>GENDER</th> &nbsp  &nbsp     <th>EMAIL</th> &nbsp &nbsp    <th>PREF.LOC</th> &nbsp &nbsp     <th>ADDRESS</th>  &nbsp &nbsp   <th>SSLC</th>  &nbsp &nbsp  <th>HSC</th>  &nbsp &nbsp  <th>CGPA</th>  &nbsp &nbsp  <th>LANGUAGES</th>  &nbsp &nbsp  <th>INTERNSHIPS</th> &nbsp  &nbsp    <th>APPLIED JOB</th></tr></thead><br />" ;
          echo "<tbody>" ;
          while($row = mysqli_fetch_assoc($result2))
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
        else
        {
          echo "Welcome $name <br />" ;
          echo "You haven't posted any jobs yet or students havent applied<br />" ;
          echo "<form method='post' action='applyjob.php'>
                  <input type='text' name='company' placeholder='Enter your company'/>
                  <input type='text' name='job' placeholder='Enter your vacancy'/>
                  <input type='text' name='salary' placeholder='Enter your salary'/>
                  <input type='text' name='eligibility' placeholder='Enter minimum GPA'/>
                  <button type='submit' value='submit'>SUBMIT</button>
               </form>" ;
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

</body>
</html>
