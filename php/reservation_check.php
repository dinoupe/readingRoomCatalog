<?php

require_once 'dbcon_u.php';

$bid = $_GET['bid'];

$sql_ck='select * from reservations where `bid` = '.$bid;

$res_ck=mysqli_query($con,$sql_ck);
if(!$res_ck){
    echo "<p class='bg-danger'>DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

mysqli_close($con);

if(mysqli_num_rows($res_ck)>0){
  echo 'Already';
  exit();
}

echo 'Free';
exit();

?>