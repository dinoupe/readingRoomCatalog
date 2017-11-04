<?php
require_once 'dbcon_u.php';
session_start();

$auth = $_GET['author'];
$title = $_GET['title'];
$cat = $_GET['category'];
$year = $_GET['year'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn'];
$location = $_GET['location'];

$sql = "select * from book where author like '%".$auth."%' and title like '%".$title."%' and category like '%".$cat."%' and year like '%".$year."%' and publisher like '%".$publisher."%' and isbn like '%".$isbn."%' and location like '%".$location."%'";
$result = mysqli_query($con,$sql);
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con);
    exit;
}

$row = mysqli_fetch_assoc($result);

echo "[\r\n";
echo '{"inv":'.$row['inv'].',"author": "'.$row['author'].'", "title": "'.$row['title'].'", "publisher": "'.$row['publisher'].'", "year": "'.$row['year'].'", "isbn": "'.$row['isbn'].'", "category": "'.$row['category'].'", "location": "'.$row['location'].'"}';

while ($row = mysqli_fetch_assoc($result)){
  echo ",\r\n";
/*  echo '{"inv": '.$row['inv'].', ';
  echo '"author": "'.$row['author'].'", ';
  echo '"title": "'.$row['title'].'", ';
  echo '"publisher": "'.$row['publisher'].'", ';
  echo '"year": "'.$row['year'].'", ';
  echo '"isbn": "'.$row['isbn'].'", ';
  echo '"category": "'.$row['category'].'", ';
  echo '"location": "'.$row['location'].'"}'; */
  echo json_encode($row);
}
echo "\r\n]";

mysqli_free_result($result);
mysqli_close($con);

?>