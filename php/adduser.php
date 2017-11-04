<?php
session_start();

if($_SESSION['type']!='Admin'){
  echo '<p class="bg-danger">You need to be logged in as admin to complete the taks</p>';
  exit;
}

require_once 'dbcon.php';

$uid = $_GET['uid'];
$pwd = $_GET['upwd'];
$email = $_GET['email'];
$type = $_GET['type'];
$phone = $_GET['phone'];

$id_sql = "select * from `users` order by `id` desc limit 1";

$res_id = mysqli_query($con,$id_sql);

if(!$res_id) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$res = mysqli_fetch_assoc($res_id);

$id=$res["id"]+1;

$sql="insert into `users` (`id`, `userid`, `pwd`, `email`, `phone`, `type`) values (".$id.", '".$uid."', '".md5($pwd)."', '".$email."', '".$phone."', '".$type."')";

if (!mysqli_query($con,$sql)) {
  die('<p class="text-danger">Error: ' . mysqli_error($con).'</p>');
}
echo '<p class="lead">added user with id '.$id.'</p>';


mysqli_close($con);
?>                                         