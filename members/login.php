<?php

session_start();

include 'connect.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
      $password = $_POST['password'];

      if (empty($username)) {
          header("Location: welcome.php?error=invalid");
          exit();
      }if (empty($password)) {
          header("Location: welcome.php?error=invalid");
          exit();
      }else {
                
   $sql = "SELECT id FROM members WHERE username='$username' AND password='$password' LIMIT 1";

   $query = mysqli_query($conn, $sql);

   $result = mysqli_num_rows($query);

   	if ($result == 1) {
			while ($row = mysqli_fetch_assoc($query)) {
          $id = $row["id"];
          
           }
           $_SESSION['username'] = $username;
              header("Location: account.php");
              exit();

              }

      }if ($username !=='username' && $password !=='password') {

                 header("Location: welcome.php?error=correct");
              exit();
                  
              }
    if ($results !== 1) {
       header("Location: index.php");
       exit();
    }
}
?>

   