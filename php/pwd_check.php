<?php

require_once('dbcon_u.php');

$oldpwd = $_GET['oldpwd'];

$sql = 'select pwd from `users` where `id` = '.$_SESSION['uid'];

$result= mysqli_query($con,$sql);

if(!$result){
  echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
  exit;
}

$row = mysqli_fetch_assoc($result);

mysqli_close($con);

if($row['pwd'] == md5($oldpwd)){
  echo 'true';
  exit();
}

echo 'false';

?>