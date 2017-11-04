<?php
require_once 'dbcon.php';

session_start();

if ($_SESSION['type']!='Admin'){
  echo '<p class="bg-danger">You need to be logged in as admin to complete the taks</p>';
  exit;
}

$inv = $_GET['inv'];
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


$sql = 'update book set title="'.$title.'", author="'.$auth.'", isbn="'.$isbn.'", year='.$yr.', publisher="'.$publish.'", category="'.$cat.'", location="'.$location.'" where inv='.$inv;
$result = mysqli_query($con,$sql);
if (!$result) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$row =mysqli_fetch_assoc(mysqli_query($con, 'select * from book where inv='.$inv));

echo '<table class="table"><thead><tr><th>Inv</th><th>Author</th><th>Title</th><th>Publisher</th><th>Year</th><th>ISBN</th><th>Category</th><th>Location</th></tr></thead><tbody><tr class="book"><td>'.$row['inv'].'</td>';
  echo '<td>'.$row['author'].'</td>';
  echo '<td>'.$row['title'].'</td>';
  echo '<td>'.$row['publisher'].'</td>';
  echo '<td>'.$row['year'].'</td>';
  echo '<td>'.$row['isbn'].'</td>';
  echo '<td>'.$row['category'].'</td>';
  echo '<td>'.$row['location'].'</td></tr></tbody></table><div class="confirmation">Book edited</div>';

mysqli_close($con);

?>