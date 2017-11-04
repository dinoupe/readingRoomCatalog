<?php
session_start();

if (empty($_SESSION)){
  header('Location: ../index.php');
  exit();
}

require_once('dbcon_u.php');

$newpwd = $_POST['newpwd'];

$sql = 'update `users` set `pwd`="'.md5($newpwd).'" where `id` = '.$_SESSION['uid'];

$result= mysqli_query($con,$sql);

if(!$result){
  echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
  exit;
}

mysqli_close($con);

echo 'Password changed successfully';

?>