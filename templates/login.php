
<?php echo $message; ?>

<form name="frmLogin" action="authenticate.php" method="post">
  <div class="mb-3">
    <label class="txtid"class="form-control">Student ID </label>
    <input type="text" class="form-control" id="txtid"name="txtid">
  
   <div class="mb-3">
    <label for="txtpwd"class="form-label">Password</label>
    <input type="Password"class="form-control" id="txtpwd"name="txtpwd">
  </div>
  
  <input type="submit"name="btnlogin" class="btn btn-primary" value="Login"/>
</form>
