<?php
require_once 'dbcon.php';

session_start();

if ($_SESSION['type']!='Admin'){
	echo '<p class="bg-danger">You need to be logged in as admin to complete the taks</p>';
	exit;
}

$auth = $_GET['author'];
$title = $_GET['title'];
$cat = $_GET['category'];
$yr = $_GET['year'];
$publish = $_GET['publisher'];
$isbn = $_GET['isbn'];
$location = $_GET['location'];

if($location==''){
  $location='Reading Room';
}


$sql_inv = "select `inv` from `book` order by `inv` desc limit 1";

$res_inv = mysqli_query($con,$sql_inv);
if(!$res_inv) {
    echo "<p class='bg-danger'>DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$invrow = mysqli_fetch_assoc($res_inv);
$inv = $invrow['inv'] + 1;
#mysql_close($con1);


$sql = 'insert into book (`inv`, `title`, `author`, `isbn`, `year`, `publisher`, `category`,`location`) values ('.$inv.',"'.$title.'","'.$auth.'","'.$isbn.'",'.$yr.',"'.$publish.'","'.$cat.'","'.$location.'")';
$result = mysqli_query($con,$sql);
if (!$result) {
    echo "DB Error, could not insert into the database\n";
    echo 'MySQL Error: ' . mysqli_error($con);
    exit;
}

echo '<p class="lead bg-success">Success - inv no. is '.$inv.'</p>';

mysqli_free_result($res_inv);
mysqli_close($con);

?>