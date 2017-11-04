<?php
require_once 'dbcon.php';

session_start();

if ($_SESSION['type']!='Admin'){
  echo '<p class="bg-danger">You need to be logged in as admin to complete the taks</p>';
  exit;
}

#echo 'this is test';

$bsd = $_GET['bsd'];
$bed = $_GET['bed'];

if ($bed == ''){
  $bed = date('Y-m-j');
}

$sql='select `book`.`author`, count(`loan_archive`.`bid`) as bcount from `loan_archive` join `book` on (`loan_archive`.`bid`=`book`.`inv`) where `loandate`<="'.$bed.'"';



if($bsd != ''){
  $sql = $sql.' and `loandate`>="'.$bsd.'"';
}

$sql = $sql.' group by `author` order by `bcount` desc';

$result = mysqli_query($con,$sql);
if (!$result) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

echo '<p class="lead">Repor for loaned books</p><table class="table table-striped"><thead><tr><th>Author</th><th>Loan Count</th></tr></thead><tbody>';
while ($row = mysqli_fetch_assoc($result)){
  echo '<tr><td>'.$row['author'].'</td>';
  echo '<td>'.$row['bcount'].'</td></tr>';
}
echo '</tbody></table>';

mysqli_free_result($result);
mysqli_close($con);
?>