<?php
require_once 'dbcon.php';

session_start();

if ($_SESSION['type']!='Admin'){
  echo '<p class="bg-danger">You need to be logged in as admin to complete the taks</p>';
  exit;
}

$id = $_GET['id'];
$uid = $_GET['uid'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$type = $_GET['type'];


$sql = "update users set userid='".$uid."', email='".$email."', phone='".$phone."', type='".$type."' where id=".$id;
$result = mysqli_query($con,$sql);
if (!$result) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$row =mysqli_fetch_assoc(mysqli_query($con,'select * from users where id='.$id));

echo '<table><thead><tr><th>Id</th><th>User Name</th><th>Email</th><th>Tel#</th><th>User Type</th></tr></thead><tbody><tr class="user"><td>'.$row['id'].'</td>';
  echo '<td>'.$row['userid'].'</td>';
  echo '<td>'.$row['email'].'</td>';
  echo '<td>'.$row['phone'].'</td>';
  echo '<td>'.$row['type'].'</td></tr></tbody></table>';
  
mysqli_close($con);

?>