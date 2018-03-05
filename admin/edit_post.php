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


$query = "SELECT * FROM posts WHERE id = ". $id;

//run query

$post = $db->select($query)->fetch_assoc();


$query = "SELECT * FROM categories";


$categories = $db->select($query);
?>

<?php
$db = new Database();

if (isset($_POST['submit'])) {

 //assign variables
  $title = mysqli_real_escape_string($db->link, $_POST['title']);
   $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
     $author = mysqli_real_escape_string($db->link, $_POST['author']);
      $tags = mysqli_real_escape_string($db->link, $_POST['tags']);


      if ($title == '' || $body == '' || $category == '' || $author == '' || $tags == '') {

        $errors = 'all fields are required';
      }else{

$query = "UPDATE posts
          SET 
          title = '$title',
          body = '$body',
          category = '$category',
          author = '$author',
          tags = '$tags'
          WHERE id =".$id;


        $update_row = $db->update($query);

      }

}


?>
<?php  

if (isset($_POST['delete'])) {

  $query = "DELETE FROM posts WHERE id =".$id;

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
     <link rel="stylesheet" type="text/css" href="css/forms.css">

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
            <li class="nav-item">
              <a class="nav-link" href="add_post.php">Add Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_category.php">Add Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/blog1">Visit The Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminlogout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <br><br><br><br>

<form role="form" method="POST" action="edit_post.php?id=<?php echo $id; ?>" id="generalform" class="container">
  <div class="form-group">
    <label>post title</label>
    <input type="text" name="title" class="form-control input"  placeholder="edit post title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group">
    <label>post body</label>
    <textarea name="body" class="form-control textarea"  placeholder="edit post body">
      <?php echo $post['body']; ?>
    </textarea>
  </div>
  <label>category</label>
  <div class="form-group">
    <select name="category" class="form-control input">

    <?php while($row = $categories->fetch_assoc()) : ?>

      <?php if($row['id'] == $post['category']) {

       $selected = 'selected'; 

     }else{
$selected = '';

     }
?>

  <option value="<?php echo $row['id'];  ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>

<?php endwhile; ?>
</select>
  </div>
   <div class="form-group">
    <label for="author">post author</label>
    <input type="text" name="author" class="form-control input"  placeholder="edit post author" value="<?php echo $post['author']; ?>">
  </div>
   <div class="form-group">
    <label>post tags</label>
    <input type="text" name="tags" class="form-control input"  placeholder="edit post tags" value="<?php echo $post['tags'] ?>">
    </div>
     <div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>

  <a href="index.php" class="btn btn-warning">cancel</a>
  <button name="delete" type="submit" class="btn btn-danger">delete</button>
  </div>
  <br>
</form>



<?php include 'includes/footer.php';  ?>