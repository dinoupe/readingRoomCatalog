<?php
require_once 'dbcon_u.php';
session_start();

if ($_SESSION['type']!='Admin'){
  $bid = $_GET['bid'];
  $uid = $_SESSION['uid'];
  $title = $_GET['title'];
  $uname = $_GET['uname'];
  $date = $_GET['date'];
  
  $sql = "select book.title, book.author, users.userid, loans.returndate, loans.bid, loans.uid, loans.loandate, IF(loans.returndate < curdate(), 'overdue', 'in_time') as due from loans join book ON ( loans.bid = book.inv ) JOIN users ON ( loans.uid = users.id ) where book.title like '%".$title."%' and users.userid like '%".$uname."%'";
  
  
  if($date!=''){
    $sql= $sql." and loans.returndate='".$date."'";
  }
  
  if($bid!=''){
      $sql = $sql." and loans.`bid`=".$bid;
  }
  
  if($uid!=''){
      $sql = $sql." and loans.`uid`=".$uid;      
  }
  
  $result = mysqli_query($con,$sql);
  if (!$result) {
      echo '<p class="bg-danger">DB Error, could not query the database\n';
      echo 'MySQL Error: ' . mysqli_error($con).'</p>';
      exit;
  }
  
  $nrows = mysqli_num_rows($result);
  
  echo '<p class="lead">Search results: '.$nrows.' loans</p><table class="table table-striped"><thead><tr><th>Book Title</th><th>Author</th><th>Client Name</th><th>Loan Date</th><th>Due Date</th></tr></thead><tbody>';
  while ($row = mysqli_fetch_assoc($result)){
    if ($row['due']=='overdue'){
      echo '<tr class="loan lateloan"><td bid="'.$row['bid'].'">'.$row['title'].'</td>';
    }
    else {echo '<tr class="loan"><td bid="'.$row['bid'].'">'.$row['title'].'</td>';}
    echo '<td>'.$row['author'].'</td>';
    echo '<td uid="'.$row['uid'].'">'.$row['userid'].'</td>';
    echo '<td>'.$row['loandate'].'</td>';
    echo '<td>'.$row['returndate'].'</td></tr>';
  }
  echo '</tbody></table>';
  
  mysqli_free_result($result);
  mysqli_close($con);
  
  exit();  
}

$bid = $_GET['bid'];
$uid = $_GET['uid'];
$title = $_GET['title'];
$uname = $_GET['uname'];
$date = $_GET['date'];

$sql = "select book.title, book.author, users.userid, loans.returndate, loans.bid, loans.uid, loans.loandate, IF(loans.returndate < curdate(), 'overdue', 'in_time') as due from loans join book ON ( loans.bid = book.inv ) JOIN users ON ( loans.uid = users.id ) where book.title like '%".$title."%' and users.userid like '%".$uname."%'";


if($date!=''){
  $sql= $sql." and loans.returndate='".$date."'";
}

if($bid!=''){
    $sql = $sql." and loans.`bid`=".$bid;
}

if($uid!=''){
    $sql = $sql." and loans.`uid`=".$uid;      
}

$result = mysqli_query($con,$sql);
if (!$result) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$nrows = mysqli_num_rows($result);

echo '<p class="lead">Search results: '.$nrows.' loans</p><table class="table table-striped"><thead><tr><th>Book Title</th><th>Author</th><th>Client Name</th><th>Loan Date</th><th>Due Date</th></tr></thead><tbody>';
while ($row = mysqli_fetch_assoc($result)){
  if ($row['due']=='overdue'){
    echo '<tr class="loan lateloan"><td bid="'.$row['bid'].'">'.$row['title'].'</td>';
  }
  else {echo '<tr class="loan"><td bid="'.$row['bid'].'">'.$row['title'].'</td>';}
  echo '<td>'.$row['author'].'</td>';
  echo '<td uid="'.$row['uid'].'">'.$row['userid'].'</td>';
  echo '<td>'.$row['loandate'].'</td>';
  echo '<td>'.$row['returndate'].'</td><td class="sendmailbutton" style="display: none"><button class="sendmail">Email</button></td><td class="extendbutton" style="display: none"><button class="extend">Extend</button></td><td class="returnbutton" style="display: none"><button class="return">Return</button></td></tr>';
}
echo '</tbody></table>';

mysqli_free_result($result);
mysqli_close($con);

?>