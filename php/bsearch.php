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

$sql = 'select book.*, users.userid from book left join loans on (book.inv = loans.bid) left join reservations on (book.inv = reservations.bid) left join users on (loans.uid = users.id or reservations.uid = users.id) where author like "%'.$auth.'%" and title like "%'.$title.'%" and year like "%'.$year.'%" and publisher like "%'.$publisher.'%" and isbn like "%'.$isbn.'%" and location like "%'.$location.'%"';

$cats = explode(' ',$cat);
if (count($cats) > 0 ){
  foreach ($cats as $c){
    $sql = $sql.' and category like "%'.$c.'%"';
  }
}

$sql = $sql.' order by book.inv';

$result = mysqli_query($con,$sql);
if (!$result) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$nrows = mysqli_num_rows($result);

echo '<p class="lead" >Search results:'.$nrows.' books</p><table id="books" class="table table-striped"><thead><tr class="warning"><th>Inv</th><th>Author</th><th>Title</th><th>Publisher</th><th>Year</th><th>ISBN</th><th>Category</th><th>Location</th><th>Loaned/Reserved</th></tr></thead><tbody>';
while ($row = mysqli_fetch_assoc($result)){
  echo '<tr class="book"><td>'.$row['inv'].'</td>';
  echo '<td>'.$row['author'].'</td>';
  echo '<td>'.$row['title'].'</td>';
  echo '<td>'.$row['publisher'].'</td>';
  echo '<td>'.$row['year'].'</td>';
  echo '<td>'.$row['isbn'].'</td>';
  echo '<td>'.$row['category'].'</td>';
  echo '<td>'.$row['location'].'</td>';
  echo '<td>'.$row['userid'].'</td></tr>';
}
echo '</tbody></table>';

mysqli_free_result($result);
mysqli_close($con);

?>