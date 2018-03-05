<?php include 'includes/header.php'; ?>


<?php

$db = new Database();

if (isset($_GET['category'])) {

  $category = $_GET['category'];
  
  //create Query


$query = "SELECT * FROM posts WHERE category = ".$category." ORDER BY id DESC";

//run query

$posts = $db->select($query);


}else{
  //create Query


$query = "SELECT * FROM posts ORDER BY id DESC";

//run query

$posts = $db->select($query);

}
/*
*create db object
*/




$query = "SELECT * FROM categories";


$categories = $db->select($query);


?>


 <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
          <?php if ($posts) : ?>

  <?php while($row = $posts->fetch_assoc()) : ?>
           
              <h2 class="card-title"><?php echo $row['title']; ?></h2>
              <p class="card-text"><?php echo $row['body']; ?></p>
              <a href="post.php?id=<?php echo urldecode($row['id']);   ?>" class="btn btn-primary">Read More</a>
              <br><br>
              <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>

             <?php endwhile; ?>
   

      <?php else : ?>

       <div class="alert alert-danger">
         <p>there are no posts yet</p>
       </div>

      <?php endif; ?>

      <hr>
<?php include 'includes/footer.php'; ?>