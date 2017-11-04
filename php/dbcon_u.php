<?php

$con = mysqli_connect('host','username','password','db_name');
if(!$con){
  die('Could not connect: ' . mysqli_error($con));
}

?>