
<?php

if (isset($_POST['submit'])) {


$file = $_FILES['file'];
$filename = $_FILES['file']['name'];
$fileTmpname = $_FILES['file']['tmp_name'];
$filesize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$filetype = $_FILES['file']['type'];

$fileExt = explode(".", $filename );
$fileActualExt = strtolower(end( $fileExt));
$allowed = array('jpg', 'png', 'jpeg', 'pdf', );

if (in_array( $fileActualExt,  $allowed)) {
      if ($fileError === 0) {
        if ( $filesize < 1000000) {
          $filenameNew = uniqid('', true).".". $fileActualExt;
          $fileDestination = 'images/'. $filenameNew;
          move_uploaded_file( $fileTmpname,  $fileDestination);

        }else {
          echo "your file is too big";
        }

      }else {
            echo "there was an error uploading the file";
      }
}else{
  $query = "INSERT INTO posts( image)
            VALUES('$image',)";
  $insert_row = $db->insert($query);
}

}
 ?>
 <html>
    <body>

       <form action="" method="POST" enctype="multipart/form-data">
          <input type="file" name="image" />
          <input type="submit" name="submit"/>
       </form>

    </body>
 </html>
