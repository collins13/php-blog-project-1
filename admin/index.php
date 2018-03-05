<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: adminlogin.php");
  }

?>

<?php include 'includes/header.php'; ?>

<?php

//another php db
$db = new Database;

$query = "SELECT posts.*, categories.name FROM posts 
          INNER JOIN categories
          ON posts.category = categories.id
          ORDER BY posts.title DESC";


          $posts = $db->select($query);


$query = "SELECT * FROM categories
          ORDER BY name DESC";


$categories = $db->select($query);


?>
<?php
$url ="http//:".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos($url, 'msg=welcome') !== false){
	echo"<div class='success'></div>";
}

?>
<h2>Posts Table</h2>
<table class="table table-striped">
 <tr>
   <th>post ID#</th>
   <th>post title</th>
   <th>category</th>
   <th>author</th>
   <th>date</th>

 </tr>
 
  <?php while($row = $posts->fetch_assoc()) : ?>
   <tr>  
   <td><?php  echo $row['id']; ?></td>
       <td><a href="edit_post.php?id=<?php  echo $row['id']; ?>"><?php  echo $row['title']; ?></a></td>
       <td><?php  echo $row['name']; ?></td>
       <td><?php  echo $row['author']; ?></td>
       <td><?php  echo formatDate($row['date']); ?></td>
  
  </tr>
<?php endwhile; ?>


</table>
<hr>
<br>

<h2>Category Table</h2>
<table class="table table-striped">
  <tr>
    <th>category #ID</th>
    <th>category name</th>

  </tr>

  <?php while($row = $categories->fetch_assoc()) : ?>
   <tr>  
        <td><?php  echo $row['id']; ?></td>
        <td><a href="edit_category.php?id=<?php  echo $row['id']; ?>"><?php  echo $row['name']; ?></a></td>
  
  </tr>
<?php endwhile; ?>
</table>
<hr>
<br>

<!--<?php 
/*include ('db_connect.php');
//posts count
$post_count = $db->query("SELECT * FROM posts");
//comments count
$comment_count = $db->query("SELECT * FROM commnts");

?>
<table class="table table-striped table-bordered table-condensed">
<tr class="active">
 <th>Total posts</th>
 <td><?php echo $post_count->num_rows ?></td>
 </tr>
 <tr class="info">
  <th>Total comments</th>
 <td><?php echo $comment_count->num_rows ?></td>
 </tr>
</table>   

*/
      
