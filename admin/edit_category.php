<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: adminlogin.php");
  }

?>

<?php include '../config/config.php'; ?>
<?php include '../libraries/database.php'; ?>
<?php include '../helpers/format_helper.php';  ?>



<?php

$id = $_GET['id'];
/*
*create db object
*/
$db = new Database();


//create Query


$query = "SELECT * FROM categories WHERE id = ". $id;

//run query

$category = $db->select($query)->fetch_assoc();


$query = "SELECT * FROM categories";


$categories = $db->select($query);
?>

<?php
$db = new Database();

if (isset($_POST['submit'])) {

 //assign variables
  $name = mysqli_real_escape_string($db->link, $_POST['name']);

      if ($name == '') {

        $errors = 'all fields are required';
      }else{

$query = "UPDATE categories
          SET 
          name = '$name'
          WHERE id =".$id;


        $update_row = $db->update($query);

      }

}


?>

<?php  

if (isset($_POST['delete'])) {

  $query = "DELETE FROM categories WHERE id =".$id;

  $delete_row = $db->delete($query);

}

?>
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
     <link href="css/forms.css" rel="stylesheet">

  </head>

  <body> <a href="adminlogout.php" style="float: left;" class="btn btn-default">Logout</a>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: purple; color:white;">
      <div class="container">
        <a class="navbar-brand" href="#">Frank Blog</a>
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
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>

<form role="form" action="edit_category.php?id=<?php echo $id;  ?>" method="POST" class="container" id="generalform">
  <div class="form-group">
    <label>Add category</label>
    <input type="text" name="name" class="form-control" placeholder="Edit category" value="<?php echo $category['name']; ?>">
  </div>
  <div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
   <a href="index.php" class="btn btn-warning">cancel</a>
  <button name="delete" type="submit" class="btn btn-danger">delete</button>
  </div>

  <br>
</form>

<?php include 'includes/footer.php';  ?>