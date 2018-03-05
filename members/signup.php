



<?php
include 'connect.php';

if(isset($_POST['submit'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = preg_match("/^([a-zA-Z0-9z])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email']);
  $password = $_POST['password'];

 if(empty($firstname)){
    header("Location: index.php?error=empty");
    exit();
           }
  if(empty($lastname)){
    header("Location: index.php?error=empty");
    exit();
           }
   if(empty($username)){
    header("Location: index.php?error=empty");
    exit();
        }
   if(empty($email)){
      header("Location: index.php?error=empty");
    exit();
   }
   if(empty($password)){
    header("Location:  index.php?error=empty");
    exit();
    }
  else {

  
      $sql = " INSERT INTO members (firstname, lastname, username, email, password) VALUES('$firstname', '$lastname', '$username', '$email', '$password')";
  
      $result = $conn->query($sql);
    header("Location: welcome.php");
  }

   $sql = "SELECT username FROM members WHERE username='$username'";

   $result = mysqli_query($conn, $sql);

   if ($result == 0) {
  
   }else {
       header("Location: index.php?error=used");
    exit();
   }
 
}
?>