<?php
require_once 'dbcon.php';
session_start();
                        
$book = $_GET['book'];
$userid=$_GET['to'];

$sql = "select book.author, book.title, users.email, users.userid from loans join book ON ( loans.bid = book.inv ) JOIN users ON ( loans.uid = users.id ) where loans.uid=".$userid." and loans.bid=".$book;

$result = mysqli_query($con,$sql);
if (!$result) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$row = mysqli_fetch_assoc($result);
$to = $row['email'];
$booktitle = $row['title'];
$body = "Dear ".$row['userid'].",\n\n Since your loan is overdue, we kindly ask you to return your copy of ".$booktitle." by ".$row['author']." to the Library as soon as possible.\nIf you wish to extend your loan, please contact us.\n\nKind Regards,\n";
$subj = "Book Return Reminder";
$headers = "From: your_email_address@domain.ex\r\n"; 

if (($_SESSION['sentmail'] == $to)and ($_SESSION['emailfor'] == $booktitle)){
  echo 'already sent';
  exit;
}

$_SESSION['sentmail'] = $to;
$_SESSION['emailfor'] = $booktitle;

if(!mail($to,$subj,$body,$headers)){
  echo '<p class="bg-warning">Mail sening was unsuccessful.</p>';
  exit;
}
echo 'Email sent to '.$row['userid'];

mysqli_close($con);

?>