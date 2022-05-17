
<?php echo $message; ?>

<form name="frmLogin" action="authenticate.php" method="post">
  <div class="mb-3">
    <label class="form-label">Student ID </label>
    <input type="txt" class="form-control" id="txtid"name="txtid">
  
  <div class="mb-3">
    <label for="txtpwd"class="form-label">Password</label>
    <input type="{Password}" class="form-control" id="txtpwd"name="txtid">
  </div>
  </div>
  <input ="submit" name="btnlogin" class="btn btn-primary" value="Login"/>
</form>
