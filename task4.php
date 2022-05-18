    <?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // if the form has been submitted
   if (isset($_POST['submit'])) {

      var_dump($_POST);

      //$hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT)
     

     $sql = "INSERT INTO student (studentid,password ,dob, firstname, lastname, house, town, county, country, postcode)
      VALUES ('{$_POST['stduent id']}', ' $hashed_password ', '{$_POST['DoB']}', '{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['house']}', '{$_POST['town']}', '{$_POST['country']}', '{$_POST['country']}',
      '{$_POST['postcode']}')";


        
      $result = mysqli_query($conn,$sql);

      $data['content'] = "<p>Your details have been updated</p>";
  }
    
    
  else {
      // Build a SQL statment to return the student record with the id that
      // matches that of the session variable.
      $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

   <h2>Add new student</h2>
   <form name="frmdetails" action="" method="post">
   Student ID :
   <input  name="studentid" type="text" value" "/><br/>
   First Name :
 <input name="firstname" type="text" value=" "  required/><br/>
  Surname :
   <input name="lastname" type="text"  value=" "  required/><br/>
   Date of birth:
   <input name="DoB" type= "getdate" value"dd/MM/yyyy" /><br/>
   Number and Street : 
   <input name="house" type="text"  value=" " /><br/>
   Town :
   <input name="town" type="text"  value=" " /><br/>
   County :
   <input name="county" type="text"  value=" " /><br/>
   Country :
   <input name="country" type="text"  value=" " /><br/>
   Postcode :
   <input name="postcode" type="text"  value=" " /><br/>
   <input type="submit" value="Save" name="submit"/>
   </form>

EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
       
