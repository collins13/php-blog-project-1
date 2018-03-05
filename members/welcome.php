
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Area</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
     <link href="css/login.css" rel="stylesheet">
     <link href="css/forms.css" rel="stylesheet">




  </head>

  <body> <a href="adminlogout.php" style="float: left;" class="btn btn-default">Logout</a>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: purple; color:white;">
      <div class="container">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Dashbord
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_category.php">Add Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/blog1">Visit The Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<br><br><br><br><br><br>

<div id="wrapper">

<h2>Hello, Thank you for signing up please Login to your account</h2>

                   <?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=correct')) {
  echo "<span class='error'>Invalid username or password do you have </span>";
  echo "<p class='success'>You have account Register<a href='register.php'>here</div>";
}
?>
<!--<aside id="left_side">

<img src="../images/loginbanner.png">


</aside>-->

<section id="right_side">
    <h3>Login</h3>

    <?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=invalid')) {
  echo "<span class='error'>all fields are required</span>";
}
?>

<form action="login.php" method="POST" id="generalform">

<label for='author'>UserName</label>
     <div class='form-group'>
    <input type='text' name='username' class='form-control input'  placeholder='Enter username'>
  </div>
   <label for='author'>Password</label>
     <div class='form-group'>
    <input type='password' name='password' class='form-control input'  placeholder='password'>
  </div>
 <div style='margin-left: 100px;'>
  <button name='login' type='submit' class='tn btn-primary'>Login</button>
</div>

</form>
<br><br>
</section>

</div>

</body>
</html>
