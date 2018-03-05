
<?php include 'db_connect.php'; ?>
<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $filename = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $fileExt = explode(".", $filename );
      $file_ext = strtolower(end( $fileExt));
      $fileActualExt = strtolower(end( $fileExt));
      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         $filenameNew = uniqid('', true).".". $fileActualExt;
         $fileDestination = 'images/'. $filenameNew;
         move_uploaded_file( $file_tmp,  $fileDestination);
         $sql = "INSERT INTO posts(image) VALUES('$filename')";
         $db->query($sql);
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>

      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>

   </body>
</html>
