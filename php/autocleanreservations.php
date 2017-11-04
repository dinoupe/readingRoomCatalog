<?php
require_once 'dbcon_u.php';

$sql = 'delete from reservations where `date` < subdate(curdate(),14)';

$result = mysqli_query($con,$sql);
  if (!$result) {
      echo '<p class="bg-danger">DB Error, could not query the database\n';
      echo 'MySQL Error: ' . mysqli_error($con).'</p>';
      exit;
  }
  
mysqli_close($con);

?>