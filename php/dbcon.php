<?php

session_start();

if (empty($_SESSION) or ($_SESSION['type']!='Admin') ){
  echo '<p class="bg-danger">Please login as admin.</p>';
  exit();
}


$con = mysqli_connect('host','username','password','db_name');
if(!$con){
  die('Could not connect: ' . mysqli_error($con));
}

$sql_check = 'select stat, type, id, userid from users where id='.$_SESSION['uid'];

$result_check= mysqli_query($con,$sql_check);
if(!$result_check){
  echo '<p class="bg-danger">DB Error, could not query the database\n';
  echo 'MySQL Error: ' . mysqli_error($con).'</p>';
  exit;
}

$stat_check = mysqli_fetch_assoc($result_check);

$check = md5($stat_check['id'].$stat_check['userid'].$stat_check['type'].$stat_check['stat']);

if ($check != $_SESSION['ucheck']){
  echo 'false';
  mysqli_free_result($result_check);
  mysqli_close($con);
  exit ();
}

?>