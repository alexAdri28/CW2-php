 <h1 cl ass="mt-5"> Login</h1>
<?php echo $message; ?>

<form name="frmLogin" action="authenticate.php" method="post"class="mt-5">
  <div class="mb-5">
    <label class="txtid"class="form-control">Student ID </label>
    <input type="text" class="form-control" id="txtid"name="txtid">
</div>
    <div class="mb-3">
    <label for="txtpwd"class="form-label">Password</label>
    <input type="Password"class="form-control" id="txtpwd"name="txtpwd">
  </div>
  
  <input type="submit"name="btnlogin" class="btn btn-primary" value="Login"/>
</form>

