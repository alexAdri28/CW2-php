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

  if (!empty($_POST['checkbox']))
  {
  for($i = 0; $i < count($_POST['checkbox']); $i++)
  {
    $sql= "DELETE from student where studentid ='" . $_POST['checkbox'][$i] . "';";
    mysqli_query($conn,$sql);
  }
  }
}
else
{
header("Location: index.php");
}
?>

<html>
<head>

   <h2>Delete Record</h2>
  </head>
<body >

<div >
<table class="table table-dark table-hover">

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
echo "<form action='' method='post'>";
while($row= mysqli_fetch_assoc($result)){
?>
    <tr>
      <td><?php echo $sr ;?> </td>    <td><?php echo $row['dob'] ;?> </td>
      <td><?php echo $row['firstname'] ;?> </td> <td><?php echo $row['lastname'] ;?> </td> <td><?php echo $row['house'] ;?> </td>
      <td><?php echo $row['town'] ;?> </td>  <td><?php echo $row['county'] ;?> </td>  <td><?php echo $row['country'] ;?> </td>
      <td><?php echo $row['postcode'] ;?> </td>

  <td> <input type= "checkbox" name= "checkbox[]" value=<?php echo $row['studentid'] ;?>></td>
</tr>
<?php $sr++;}

?>
</tbody>
</table>

<div class="row">
  <div class="form-group">
    
<input type="submit" name="delete" value="DELETE" class="btn btn-outline-dark">
  </div>
</div>
</form>
</div>

<?php

echo template("templates/partials/footer.php");
 ?>