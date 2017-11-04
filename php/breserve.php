<?php
require_once 'dbcon_u.php';

session_start();

$bid = $_GET['bid'];
                                              
$sql_insert = 'insert into reservations (`uid`, `bid`,`date`) values('.$_SESSION['uid'].','.$bid.', CURDATE())';

$res_insert = mysqli_query($con,$sql_insert);
if(!$res_insert){
    echo "<p class='bg-danger'>DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
}

echo 'success';

mysqli_close($con);

?>