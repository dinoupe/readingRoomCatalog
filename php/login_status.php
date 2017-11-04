<?php

session_start();

if (empty($_SESSION)){
  echo 'false';
  exit();
}

require_once 'dbcon_u.php';

$sql = 'select stat, type, id, userid from users where id='.$_SESSION['uid'];

$result= mysqli_query($con,$sql);
if(!$result){
  echo '<p class="bg-danger">DB Error, could not query the database\n';
  echo 'MySQL Error: ' . mysqli_error($con).'</p>';
  exit;
}

$stat = mysqli_fetch_assoc($result);

$check = md5($stat['id'].$stat['userid'].$stat['type'].$stat['stat']);

if ($check != $_SESSION['ucheck']){
  echo 'false';
  exit ();
}


$login = array($_SESSION['login'],$_SESSION['type'],$_SESSION['uid'],$_SESSION['ucheck']);

echo json_encode($login);

mysqli_free_result($result);
mysqli_close($con);

?>