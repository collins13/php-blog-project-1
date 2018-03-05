<php

$conn = myslqi_connect('localhost', 'root', '', mictec);

if(!$conn){
  die("connection failed! ".mysqli_connect_error());
}
