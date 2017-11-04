<?php
require_once 'dbcon.php';

session_start();

if ($_SESSION['type']!='Admin'){
  echo '<p class="bg-danger">You need to be logged in as admin to complete the taks</p>';
  exit;
}

$bid = $_GET['bid'];
$uid = $_GET['uid'];

$asql = 'select loandate from loans where uid='.$uid.' and bid='.$bid;
$aresult = mysqli_query($con,$asql);
if (!$aresult) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$arow = mysqli_fetch_assoc($aresult);

$ldate = $arow['loandate'];


$upd = "update `loan_archive` set `returndate`=curdate() where `loan_archive`.`bid`=".$bid." and `loan_archive`.`uid`=".$uid." and loandate='".$ldate."'";

if (!mysqli_query($con,$upd)) {
  die('Error: ' . mysqli_error($con));
}

$sql = "delete from loans where uid=".$uid." and bid=".$bid;
$result = mysqli_query($con,$sql);
if (!$result) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

echo 'Book Returned';
  
mysqli_close($con);

?>