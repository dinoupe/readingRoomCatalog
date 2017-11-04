<?php

session_start();
require_once 'dbcon.php';

if ($_SESSION['type']!='Admin'){
  echo '<p class="bg-danger">You need to be logged in as admin to complete the taks</p>';
  exit;
}

$bid=$_GET['bid'];
$uid=$_GET['uid'];

//check that user exists
$sql_check = 'select * from users where id='.$uid;

$res_check = mysqli_query($con,$sql_check);

if (!$res_check){
  echo '<p class="bg-danger">DB Error, could not query the database ';
  echo 'MySQL Error: ' .$err.'</p>';
  exit;
}

$check = mysqli_num_rows($res_check);
if ($check == 0){
  echo '<p class="bg-danger">Please select an existing user</p>';
  exit;
} 

//insert loan in the loan table
$sql = 'insert into loans (`bid`,`uid`,`returndate`,`loandate`) values ('.$bid.','.$uid.', ADDDATE(CURDATE(),14), CURDATE() )';

$result = mysqli_query($con,$sql);

if (!$result) {
    $pattern = '/Duplicate entry .* for key/';
    $err = mysqli_error($con);
    if(preg_match($pattern,$err)){
      echo '<p class="bg-danger">This book is already taken</p>';
      exit;
    }
    echo '<p class="bg-danger">DB Error, could not query the database ';
    echo 'MySQL Error: ' .$err.'</p>';
    exit;
}

//insert loan into the archive table
$asql = 'insert into loan_archive (`bid`,`uid`,`loandate`) values ('.$bid.','.$uid.', CURDATE() )';

$aresult = mysqli_query($con,$asql);

if (!$aresult) {
    echo '<p class="bg-danger">DB Error, could not query the database ';
    echo 'MySQL Error: ' .mysqli_error($con).'</p>';
    exit;
}

//delete reservation for the book
$rsql = 'delete from reservations where `bid`='.$bid;

$rresult = mysqli_query($con,$rsql);

if (!$rresult){
    echo '<p class="bg-danger">DB Error, could not query the database ';
    echo 'MySQL Error: ' .mysqli_error($con).'</p>';
    exit;
}


echo '<p class="lead bg-success">Success - book loaned for 2 weeks</p>';

mysqli_close($con);

?>