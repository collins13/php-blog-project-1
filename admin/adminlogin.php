<?php
session_start();
if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];


	include ('db_connect.php');

	if (empty($username) || empty($password)) {
		echo "missing information";
	}else{

		$username = strip_tags($username);
		$username = $db->real_escape_string($username);
		$password = strip_tags($password);
		$password = $db->real_escape_string($password);
		$password = md5($password);


		$query = $db->query("SELECT * FROM admin WHERE username ='$username' AND password ='$password'");
		if ($query->num_rows === 1) {
			while ($row = $query->fetch_object()) {
				$_SESSION['id'] = $row->id;

			}
			header("Location: index.php?msg=welcome admin");
		    exit();
		}
	}
	if($username !=='username' && $password !=='password')  {
		header("Location: adminlogin.php?error=invalid");
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Community Trade Shop</title>

	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/forms.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../index.php">Community Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/cpanel.php">Admin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>

<div id="wrapper">


<aside id="left_side">

<img src="../images/loginbanner.png">


</aside>

<section id="right_side">
<form name="login" id="generalform" class="container" method="post" action="adminlogin.php">
<h3>Login</h3>
<label for="username">UserName: </label>
<input type="text" name="username" id="username" placeholder="enter username" class="input"  maxlength="20">
<p class="hint">20characters maximum (letters and numbers only)</p>

<label for="password">Password: </label>
<input type="password" id="password" name="password" placeholder="enter password" class="input">
<p class="hint">20 characters maximum</p>

<br><br>

<?php
$url ="http//:".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos($url, 'error=invalid') !== false){
	echo"<span class='error'>invalid username or password! </span>";
}

?>

<input type="submit" name="submit"  class="btn btn-success" value="submit">

</form>
<br><br>
</section>

</div>
</body>
</html>