<?php
require_once 'dbcon.php';
session_start();

$uid = $_GET['uid'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$type = $_GET['type'];

$sql = "select * from `users` where `userid` like '%".$uid."%' and email like '%".$email."%' and phone like '%".$phone."%'";

if($type !=''){
 $sql= $sql."and `type`='".$type."'";
}

$result = mysqli_query($con,$sql);
if (!$result) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$nrows = mysqli_num_rows($result);

echo '<p class="lead">Search results: '.$nrows.' users</p><table class="table table-striped"><thead><tr><th>Id</th><th>User Name</th><th>Email</th><th>Tel#</th><th>User Type</th></tr></thead><tbody>';
while ($row = mysqli_fetch_assoc($result)){
  echo '<tr class="user"><td>'.$row['id'].'</td>';
  echo '<td>'.$row['userid'].'</td>';
  echo '<td>'.$row['email'].'</td>';
  echo '<td>'.$row['phone'].'</td>';
  echo '<td>'.$row['type'].'</td></tr>';
}
echo '</tbody></table>';

mysqli_free_result($result);
mysqli_close($con);

?>