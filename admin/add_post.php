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
/*
*create db object
*/
$db = new Database();

if (isset($_POST['submit'])) {


 //assign variables
  $title = mysqli_real_escape_string($db->link, $_POST['title']);

  $body = mysqli_real_escape_string($db->link, $_POST['body']);
  $category = mysqli_real_escape_string($db->link, $_POST['category']);
  $author = mysqli_real_escape_string($db->link, $_POST['author']);
  $tags = mysqli_real_escape_string($db->link, $_POST['tags']);


if ($title == ''  || $body == '' ||  $category == '' || $author == '' || $tags == '') {

        $errors = 'all fields are required';

      }
     if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../images/".$file_name);
        $query = "INSERT INTO posts(title, image, body, category, author, tags)
                      VALUES('$title', '$file_name',  '$body', $category, '$author', '$tags')";
            $insert_row = $db->insert($query);
      }else{
         print_r($errors);
      }
   }


}
?>


<?php



//create Query

$query = "SELECT * FROM categories";


$categories = $db->select($query);
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


<form role="form" method="POST" action="add_post.php" id="generalform" class="container" enctype="multipart/form-data">
  <label for="title" class="good">post title:</label>
  <div class="form-group">
    <input type="text" name="title" class="form-control input"  placeholder="add post title" >
</div>
 <label for="image" class="good">post image:</label>
  <div class="form-group">
    <input type="file" name="image" class="form-control "  placeholder="add post title" >
</div>

  <div class="form-group">
    <label for="body">post body</label>
    <textarea name="body" class="form-control textarea"  placeholder="add post body" ></textarea>
  </div>

    <div class="form-group">
      <label for="category">category</label>
    <select name="category" class="form-control input">

    <?php while($row = $categories->fetch_assoc()) : ?>

      <?php if($row['id'] == $post['category']) {

       $selected = '';

     }else{
$selected = '';

     }
?>

  <option <?php echo $selected; ?> value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></option>

<?php endwhile; ?>
</select>
  </div>
  </div>

    <label for="author">post author</label>
     <div class="form-group">
    <input type="text" name="author" class="form-control input"  placeholder="add post author">
  </div>
   <div class="form-group">
  <label for="tags">post tags</label>
    <input type="text" name="tags" class="form-control input"  placeholder="add post tags">
  </div>
  <br>
 <div style="margin-left: 100px;">
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>

  <a href="index.php" class="btn btn-warning">cancel</a>
  </div>
  <br>
</form>



<?php include 'includes/footer.php';  ?>

</html>
    </body>
