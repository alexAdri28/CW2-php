<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");
   include("css/index.html");
   include("js/index.html");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "select * from studentmodules sm, module m where m.modulecode = sm.modulecode and sm.studentid = '" . $_SESSION['id'] ."';";
      $result = mysqli_query($conn,$sql);

      // prepare page content
      $data['content'] .= "<table  border= 2px";
      $data['content'] .= "<tr><th colspan='5' align='center'>Modules</th></tr>";
      $data['content'] .= "<tr><th>Student ID</th><th>Module Code</th><th>Type</th><th>Level</th></tr>";

      // Display the modules within the html table
      //if($checkresult >0 )
    //  {
     while($row = mysqli_fetch_array($result))
      {

         $data['content'] .= "<tr><td> $row[studentid] </td><td> $row[name] </td> <td> $row[modulecode] </td>";
         $data['content'] .= "<td> $row[level] </td> </tr>";
         //echo $row['studentid'] ."<br>";
    }
    //}
      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);
}

   else
   {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
