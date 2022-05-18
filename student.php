<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");
include("css/index.html");
include("js/index.html");

// check logged in
if (isset($_SESSION['id']))
{
   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");
// Build SQL statment that selects all student's database
?>
<html>
<head> Existing Students Records</head>
<body style="padding-top: 100px;" >
<div class= "container">
<table class='table' table border= "1px">
<?php
$sql = "select * from student; ";
$result = mysqli_query($conn, $sql);
?>
<tr>
<th>#</th>
<th>Student ID</th><th>D.O.B</th><th>First Name</th><th>Last Name</th><th>1st Line Address</th><th>Town</th><th>County</th>
<th>Counrty</th><th>Post Code</th>
</tr>
<?php
$sr=1;
while($row= mysqli_fetch_assoc($result))
{  ?>
    <tr>
    <form action="" method= "post" role = "form">
      <td><?php echo $sr ;?> </td>      <td><?php echo $row['studentid'] ;?> </td>   <td><?php echo $row['dob'] ;?> </td>
      <td><?php echo $row['firstname'] ;?> </td> <td><?php echo $row['lastname'] ;?> </td> <td><?php echo $row['house'] ;?> </td>
      <td><?php echo $row['town'] ;?> </td>  <td><?php echo $row['county'] ;?> </td>  <td><?php echo $row['country'] ;?> </td>
      <td><?php echo $row['postcode'] ;?> </td>
</tr>
<?php $sr ++ ;
 $data['content'] .= "</table>";
}
?><?php
}
else
{
  header("Location: index.php");
}
echo template("templates/partials/footer.php");
?>
</table>
</div>
</body>
</html>
