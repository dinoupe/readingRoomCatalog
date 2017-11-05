<?php
require_once 'common_bits.php';
require_once 'php/dbcon_u.php';

if(!empty($_GET)){
  //set new temp password
  $temp_pwd=$_GET['token'];

  //check if temp password is valid
  $sql = 'select `id` from `users` where pwd="'.md5($temp_pwd).'"';
  $result = mysqli_query($con,$sql);

  if (!$result) {
    echo '<p class="bg-danger">DB Error, could not query the database\n';
    echo 'MySQL Error: ' . mysqli_error($con).'</p>';
    exit;
  }

  //if temp password is not correct or link is invalid
  if (mysqli_num_rows($result)!=1) {
    $err_page='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <title>Password Recovery Link Invalid</title>
  </head>
  <body>
  <div class="row">
  <div class="col-md-10 col-md-offset-1 ptitle">
    <h1><abbr title="Alexandru Ioan Cuza University">UAIC</abbr> Reading Room and English Department Online Catalog</h1>
</div></div>
  <div class="row"><div class="col-md-10 col-md-offset-1"><p>This pasword recovery link is invalid or it has already been used. Please contact your librarian.</div></div>
  </body></html>';
  echo $err_page;
  exit;
  }

  //password is correct - now setting session user id
  $uid = mysqli_fetch_assoc($result)['id'];
  $_SESSION['uid']=$uid;
  $_SESSION['type']='unknown';
  $_SESSION['login']='unknown';
  $_SESSION['ucheck']='unknown';

  //create page for password recovery
  $page='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/change_pwd.js"></script>
  <title>Pasword Recovery</title>
  </head>
  <body>
  <div class="row">
  <div class="col-md-10 col-md-offset-1 ptitle">
    <h1><abbr title="Alexandru Ioan Cuza University">UAIC</abbr> Reading Room and English Department Online Catalog</h1>
</div></div>
  <div class="row row-eq-height">
        <div class="col-md-2 col-md-offset-1">
          <label for="oldpwd">Old Password</label>
          <input class="form-control" type="password" id="oldpwd" value="'.$temp_pwd.'"></input>
        </div>
        <div class="col-md-2"><label for="newpwd">New Password</label><input class="form-control" type="password" id="newpwd"></input></div>
        <div class="col-md-2"><label for="confirmpwd">Confirm Password</label><input class="form-control" type="password" id="confirmpwd"></input></div>
        <div class="col-md-1" style="padding-top:30px; color:black"><button id="change_pwd">Change</button></div>
      </div>
    </div>
  </body></html>';


}
else{
  //password change on request page
$page = $head_bit.'<script type="text/javascript" src="js/change_pwd.js"></script>
  <title>Change your password</title>
  </head>
  <body>'.$menu_bar.'<div id="pwdbox" class="inputbox">
      <div class="row row-eq-height">
        <div class="col-md-2 col-md-offset-1">
          <label for="oldpwd">Old Password</label>
          <input class="form-control" type="password" id="oldpwd"></input>
        </div>
        <div class="col-md-2"><label for="newpwd">New Password</label><input class="form-control" type="password" id="newpwd"></input></div>
        <div class="col-md-2"><label for="confirmpwd">Confirm Password</label><input class="form-control" type="password" id="confirmpwd"></input></div>
        <div class="col-md-1 searchbtn"><button class="bottom_btn" id="change_pwd">Change</button></div>
      </div>
    </div>'.$bottom_bit;
}
    
echo $page;

?>