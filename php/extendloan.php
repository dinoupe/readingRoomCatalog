<?php
require_once 'dbcon.php';

session_start();

if ($_SESSION['type']!='Admin'){
  echo '<p class="bg-danger">You need to be logged in as admin to complete the taks</p>';
  exit;
}

$bid = $_GET['bid'];
$uid = $_GET['uid'];
$date = 
#$date = date($phpdate);


$sql = "update loans set returndate=ADDDATE(CURDATE(),7) where uid=".$uid." and bid=".$bid;
$result = mysqli_query($con,$sql);
if (!$result) {
    echo "<p class='bg-danger'>DB Error, could not query the database\n";
    echo "MySQL Error: " . mysqli_error($con)."</p>";
    exit;
}

$row_sql="select book.title, users.userid, loans.returndate, loans.bid, loans.uid from loans join book ON ( loans.bid = book.inv ) JOIN users ON ( loans.uid = users.id ) where bid=".$bid." and uid=".$uid;
$row =mysqli_fetch_assoc(mysqli_query($con,$row_sql));

echo $row['title']." to ".$row['userid']." extended until ".$row['returndate'];
  
mysqli_close($con);

?>