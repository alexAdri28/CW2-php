<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");
include("css/index.html");
include("js/index.html");


// check if user is logged in
if (isset($_SESSION['id'])) {
  echo template("templates/partials/header.php");
  echo template("templates/partials/nav.php");

  // Check if form submitted
  if(isset($_POST['submit'])) {
    // Get form data
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $house = mysqli_real_escape_string($conn, $_POST['house']);
    $town = mysqli_real_escape_string($conn, $_POST['town']);
    $county = mysqli_real_escape_string($conn, $_POST['county']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);

    // Insert student into database
    $sql = "INSERT INTO student (password, dob, firstname, lastname, house, town, county, country, postcode)
           VALUES ('$password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode')";

    if(mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  else {
    // Display form
    ?>
    <body style="padding-top: 100px;">
    <form class="row g-3">
      <div class= "col-md-4">
      <h1 class="mt-5"> Add New Student</h1>
      <form>
       <div class="mb-3">
    <label for="inputFirstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="inputFirstName" required>
  </div>
  <div class="mb-3">
    <label for="inputLastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="inputLastName" required>
  </div>
  <div class="mb-3">
    <label for="inputPassword" class="form-label"> New Password</label>
    <input type="password" class="form-control" id="inputPassword" required>
  </div>
  <div class="mb-3">
    <label for="inputDOB" class="form-label">Date of Birth</label>
    <input type="date" class="form-control" id="inputDOB" required>
  </div>
  <div class="mb-3">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" required>
  </div>
  <div class="mb-3">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity" required>
  </div>
  <div class="mb-3">
    <label for="inputCountry" class="form-label">Country</label>
    <select class="form-select" id="inputCountry" required>
      <option value="" selected disabled>Select a country</option>
      <option value="USA">United States</option>
      <option value="CA">Canada</option>
      <option value="UK">United Kingdom</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="inputPostcode" class="form-label">Postcode</label>
    <input type="text" class="form-control" id="inputPostcode" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

      <script type="text/javascript">
        // auto-generated script
      </script>
    </body>
    <?php
  }
  echo template("templates/partials/footer.php");
}
else {
  // If not logged in, redirect to login page
  header("Location: login.php");
  exit();
}
?>


