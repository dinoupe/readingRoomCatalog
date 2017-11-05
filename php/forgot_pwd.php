<?php
require_once 'dbcon_u.php';

$uemail = $_POST['useremail'];

$e_sql='select * from users where email="'.$uemail.'"';

$e_res=mysqli_query($con, $e_sql);
if(!$e_res){
	echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

if (mysqli_num_rows($e_res)!=1){
	echo '<p class="bg-danger">Please make sure the email you have entered is correct and it is the one you use for this site.</p>';
	exit;
}

$user_name=mysqli_fetch_assoc($e_res)['userid'];

$temp_pwd= uniqid();

$sql = 'update `users` set pwd = "'.md5($temp_pwd).'" where email="'.$uemail.'"';

$res=mysqli_query($con, $sql);
if(!$res){
	echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

$body = "Dear ".$user_name.",\n\nPlease follow this link to set a new password: https://readingroomtest.000webhostapp.com/catalog/show_change_pwd.php?token=".$temp_pwd." \n\nKind Regards,\nThe Reading Room Team";
$subj = 'Reading Room password recovery';
$headers = "From: library@reading-room.ro\r\n";

if(!mail($uemail,$subj,$body,$headers)){
  echo '<p class="bg-warning">Mail sening was unsuccessful.</p>';
  exit;
}
echo '<p>Please check your email for your password reset link.</p>';

mysqli_close($con);

?>