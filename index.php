
<include 'includes/nav.php'; ?>
<?php include 'includes/header.php'  ?>

<php include ('html_codes.php'); ?>
<?php

/*
*create db object
*/
$db = new Database();
 

$query = "SELECT * FROM posts ORDER BY id DESC";

//run query

$posts = $db->select($query);


$query = "SELECT * FROM categories ORDER BY id DESC";


$categories = $db->select($query);


?>
<div class="side">
<ul class="side-b">
  <li><a href="default.asp">Sighn Up</a></li>
  <li><a href="news.asp">Login</a></li>
  <li><a href="news.asp">Admin</a></li>
</ul>

</div>

    <!-- Page Content -->
    <div class="container">


      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
        <br><br>

          <!-- Blog Post -->
          <?php if ($posts) : ?>

  <?php while($row = $posts->fetch_assoc()) : ?>

              <h2 class="card-title"><?php echo $row['title']; ?></h2>
              <img src="images/<?php echo $row['image'];?>" style="height:200px;">
              <p class="card-text"><?php echo shortentext($row['body']); ?></p>
              <div class="card-footer">
              <a href="post.php?id=<?php echo urldecode($row['id']);   ?>" class="btn btn-primary">Read More</a>
              </div>
              <br><br>
              <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>

             <?php endwhile; ?>


      <?php else : ?>

       <div class="alert alert-danger">
         <p>there are no posts yet</p>
       </div>

      <?php endif; ?>
      <hr>
      <hr>


      <br><br>



       <?php include 'includes/footer.php'; ?>

          <!-- Pagination -->
