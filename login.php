<?php

include("_includes/config.inc");
include("_includes/functions.inc");
echo template("templates/partials/header.php");

if (isset($_GET['return'])) {
  $msg = "";
  if ($_GET['return'] == "fail") {
    $msg = "Login Failed. Please try again.";
  }
  $data['message'] = "<p>$msg</p>";
}

echo template("templates/login.php");

echo template("templates/partials/footer.php");

?>