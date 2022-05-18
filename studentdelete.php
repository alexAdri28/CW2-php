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
// Build SQL statment that selects a student's database
// Build sql statment that selects all the modules
?>

<html>
<head>

   <h2>Delete Record</h2>
  </head>
<body >

<div >
<table class='table' table border= "1px">

<thread>

<tr>
<th>#</th>
<th>D.O.B</th><th>First Name</th><th>Last Name</th><th>1st Line Address</th><th>Town</th><th>County</th>
<th>Counrty</th><th>Post Code</th><th>Select</th>
</tr>
</thread>

<tbody>
<?php
$sql = "select * from student; ";
$result = mysqli_query($conn, $sql);
$sr=1;
while($row= mysqli_fetch_assoc($result)){
?>
    <tr>
      <td><?php echo $sr ;?> </td>    <td><?php echo $row['dob'] ;?> </td>
      <td><?php echo $row['firstname'] ;?> </td> <td><?php echo $row['lastname'] ;?> </td> <td><?php echo $row['house'] ;?> </td>
      <td><?php echo $row['town'] ;?> </td>  <td><?php echo $row['county'] ;?> </td>  <td><?php echo $row['country'] ;?> </td>
      <td><?php echo $row['postcode'] ;?> </td>

  <form action="" method="post">
  <td> <input type= "checkbox" name= "checkbox[]" value=<?php echo $row['studentid'] ;?>></td>
</tr>
<?php $sr ++ ;}?>
</tbody>
</table>

<div class="row">
  <div class="form-group">
    <input type="submit" name="delete"value="DELETE" class-= "btn btn-info">
  </div>
</div>
</form>

<?php
if (isset($_POST['delete']))
{
 $checkedcheckbox =count ($_POST['checkbox']);
 $i=0;
 while($i<$checkedcheckbox)
 {
   $key=$_POST['checkbox'][$i];
   $sql= "DELETE from student  where studentid ='$key';";
   mysqli_query($conn,$sql);
   $i++;
 }
}
}
else
{
header("Location: index.php");
}
echo template("templates/partials/footer.php");
 ?>
</div>


        
</body>
</html>
