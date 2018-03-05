<?php include 'includes/header.php' ?>

<?php



$id = $_GET['id'];


//create db object

$db = new Database();


//create Query


$query = "SELECT * FROM posts WHERE id =".$id;

//run query

$post = $db->select($query)->fetch_assoc();


$query = "SELECT * FROM categories";


$categories = $db->select($query);

?>


 <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
              <h2 class="card-title"><?php echo $post['title']; ?></h2>
              <p class="card-text"><?php echo $post['body']; ?></p>
              <br><br>
              <p class="blog-post-meta"><?php echo formatDate($post['date']); ?> by <a href="#"><?php echo $post['author']; ?></a></p>
              <hr>
              <br>
             
          
        
        <br>

  
       <?php include 'includes/footer.php'; ?>   

          <!-- Pagination -->