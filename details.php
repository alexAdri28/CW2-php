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

   // if the form has been submitted
   if (isset($_POST['submit'])) {

      // build an sql statment to update the student details
      $sql = "update student set firstname ='" . $_POST['txtfirstname'] . "',";
      $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
      $sql .= "house ='" . $_POST['txthouse']  . "',";
      $sql .= "town ='" . $_POST['txttown']  . "',";
      $sql .= "county ='" . $_POST['txtcounty']  . "',";
      $sql .= "country ='" . $_POST['txtcountry']  . "',";
      $sql .= "postcode ='" . $_POST['txtpostcode']  . "' ";
      $sql .= "where studentid = '" . $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);

      $data['content'] = "<p>Your details have been updated</p>";

   }
   else {
      // Build a SQL statment to return the student record with the id that
      // matches that of the session variable.
      $sql = "select * from student where studentid='". $_SESSION['id'] . "'; ";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

      <h1 class="mt-5"> My Details</h1>
   
   <form name="frmdetails" action="" method="post">
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationCustom01" name="firstName" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" name="lastName" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomUsername" class="form-label">Number of house and street name</label>
    <input type="text" class="form-control" id="validationCustomUsername" name="streetAddress" required>
    <div class="invalid-feedback">
      Please enter the number of the house and the name of the street.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <select class="form-select" id="validationCustom04" name="City" required>
    <option value="">Choose your City</option>
    <option value="England">England</option>
    <option value="Scoland">Scoland</option>
    <option value="Wales">Wales</option>
    <option value="North Irland">North Irland</option>
    
  </select>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Country</label>
    <select class="form-select" id="validationCustom04" name="country" required>
      <option value="">Choose your country</option>
      <option value="USA">USA</option>
      <option value="Canada">Canada</option>
      <option value="Mexico">Mexico</option>
      <option value="UK">UK</option>
      <option value="France">France</option>
      <option value="Germany">Germany</option>
      <option value="Spain">Spain</option>
      <option value="Italy">Italy</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid country.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom05" class="form-label">Postcode</label>
    <input type="text" class="form-control" id="validationCustom05" name="postcode" required>
    <div class="invalid-feedback">
      Please provide a valid postcode.
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Save</button>
  </div>
</form>
EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

}
 else
 {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
