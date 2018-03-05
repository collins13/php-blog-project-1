<?php

$conn = mysqli_connect("localhost", "root", "", "blog");
if(!$conn){
    echo "coonection failed please try again".mysqli_connect_error();
}


?>