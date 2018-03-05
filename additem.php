<?php

session_start();

include ('auth/auth.php');

 include ('includes/header.php');
 include ('html_codes.php');


 ?>


 <div id="wrapper">

 <php headerAndSearchCode();  ?>

 <aside id="main_aside">
 	<?php accountlinks(0);  ?>

 </aside>

 </div>