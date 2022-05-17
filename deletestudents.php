<?php
    include("_includes/config.inc");
    include("_includes/dbconnect.inc");
    include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {
    
    var_dump($_POST['students']);
     die();
    //loop over $POST['stuedents']- foreach()
    //build SQL query to  delete item  
        $sql ="DELETE FROM...";

    // run and then 

    $sql ="mysqli_query($conn,$sql);

   // redirect
     
     header("students.php");

     } else {
      header("Location: index.php");
   }
