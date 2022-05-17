<?php
    include("_includes/config.inc");
    include("_includes/dbconnect.inc");
    include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
       
         
         $sql ="SELECT * FROM student";
      
      $result = mysqli_query($conn,$sql);

      

      $data['content'] .="<form action='deletestudent.php 'method='POST'>";

      // prepare page content
      $data['content'] .= "<table border='1'>";
      //$data['content'] .= "<tr><th colspan='5' align='center'>Modules</th></tr>";
      $data['content'] .= "<tr><th>Student ID </th><th>Fristname</th><th>Level</th></tr>";



      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr>";
         $data['content'] .= "<td> {$row["studentid"] }</tr>";
         $data['content'] .= "<td> {$row["fristname"] }</tr>";
         $data['content'] .= "<td> <input type='checkbox'name'='students[] 'value='$row["studentid"]'/ > </tr>";
         $data['content']. = "</tr>"
      }
      
      $data['content'] .= "</table>";

     

      $data['content'] .="<input Type='Submit'name='deletebtn'value='Delete'/>";
      $data['content'] .="</form>

      

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
