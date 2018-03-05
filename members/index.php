<?php
include 'includes/header.php';

?>


<table class="table">
  <tr>
<td>

<h3>Already a Member? </h3>
<h2>Login</h2>
<form action="login.php" method="POST" id="generalform" class="container">
<label for='author'>UserName</label>
     <div class='form-group'>
    <input type='text' name='username' class='form-control input'  placeholder='Enter username'>
  </div>
   <label for='author'>Password</label>
     <div class='form-group'>
    <input type='password' name='password' class='form-control input'  placeholder='password'>
  </div>
 <div style='margin-left: 100px;'>
         <?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=correct')) {
  echo "<span class='error'>Invalid username or password</span>";
}
?>
  <button name='login' type='submit' class='tn btn-primary'>Login</button>
</div>

</form>
</td>

<td>
<h3>Not a Member? </h3>
<h2>Create Account</h2>
<?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=empty')) {
  echo "<span class='error'>all fields are required</span>";
}
?>
<br>
<form role="form" method="POST" action="signup.php" id="generalform" class="container">

    <label for='author'>First Name</label>
     <div class='form-group'>
    <input type='text' name='firstname' class='form-control input'  placeholder='Enter firstname'>
  </div>
  <label for='author'>Lastname</label>
     <div class='form-group'>
    <input type='text' name='lastname' class='form-control input'  placeholder='Enter lastname'>
  </div>
  <label for='author'>UserName</label>
        <?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=used')) {
  echo "<span class='error'>username is already used</span>";
}
?>
     <div class='form-group'>
    <input type='text' name='username' class='form-control input'  placeholder='Enter username'>
  </div>

  <label for='author'>Email</label>
     <div class='form-group'>
    <input type='text' name='email' class='form-control input'  placeholder='Enter Email'>
  </div>
    <?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=email')) {
  echo "<span class='error'>Email exist</span>";
}
?>
  <label for='author'>Password</label>
     <div class='form-group'>
    <input type='password' name='password' class='form-control input'  placeholder='password'>
  </div>
 <div style='margin-left: 100px;'>
  <button name='submit' type='submit' class='tn btn-primary'>Submit</button>
  </div>
  <br>
</form>
</td>

  </tr>
</table>

</html>
    </body>