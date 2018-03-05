<?php session_start(); ?>
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
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
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
              <a class="nav-link" href="add_post.php">About Your account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/blog1">Visit The Blog</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

     <div class="blog-header">
     <h2>Admin Area</h2>
     <hr>
     </div>

     <div class="row">
     <div class="col-sm-12 blog-main">
     <?php if (isset($_GET['msg'])) : ?>
      <div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>

     <?php endif; ?>
     </div>

   </div>


