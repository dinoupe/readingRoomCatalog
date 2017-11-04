<?php

session_start();

$con = mysqli_connect('localhost','id2988454_readingtester','reading!234','id2988454_rr_test');
if(!$con){
  die('Could not connect: ' . mysqli_error($con));
}

$id = $_POST['uid'];
$pwd = $_POST['upwd'];

$sql="select stat, type, id, userid from users where userid='".$id."' and pwd='".md5($pwd)."'";

$result= mysqli_query($con,$sql);
if(!$result){
  echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
  exit;
}

$stat = mysqli_fetch_assoc($result);
$_SESSION['login']= $stat['stat'];
$_SESSION['type']= $stat['type'];
$_SESSION['uid']= $stat['id'];  
$_SESSION['ucheck']= md5($stat['id'].$stat['userid'].$stat['type'].$stat['stat']);


echo json_encode($stat);

mysqli_free_result($result);
mysqli_close($con);
?>