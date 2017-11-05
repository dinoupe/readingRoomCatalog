<?php

session_start();

$menu_bar;

if (empty($_SESSION) || ($_SESSION['type']!=='Admin' )){
  $menu_bar='<div class="row">
  <div class="col-md-10 col-md-offset-1 ptitle">
  <h1><abbr title="Alexandru Ioan Cuza University">UAIC</abbr> Reading Room and English Department Online Catalog</h1>
</div></div>
<div class="row pmenu">
  <div class="dropdown col-md-2 col-md-offset-2">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Book <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="show_bsearch.php">Book Search</a></li>
  </ul></div>
  <div class="dropdown col-md-2">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">User <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="show_change_pwd.php">Change Password</a></li>
        <li><a href="php/session_end.php">Log Out</a></li>
    </ul></div>
  <div class="dropdown col-md-2">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Loans <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href=""show_showloans.php">Show Loans</a></li>
</ul></div></div>';
}
else{
  $menu_bar='<div class="row">
  <div class="col-md-10 col-md-offset-1 ptitle">
    <h1><abbr title="Alexandru Ioan Cuza University">UAIC</abbr> Reading Room and English Department Online Catalog</h1>
</div></div>
<div class="row pmenu">
  <div class="dropdown col-md-2 col-md-offset-2">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Book <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="show_bsearch.php">Book Search</a></li>
      <li><a href="show_bedit.php">Edit Book</a></li>
      <li><a href="show_binput.php">Add Book</a></li>
  </ul></div>
  <div class="dropdown col-md-2">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">User <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="show_showusers.php">Show Users</a></li>
      <li><a href="show_edituser.php">Edit User</a></li>
      <li><a href="show_adduser.php">Add User</a></li>
      <li><a href="show_change_pwd.php">Change Password</a></li>
      <li><a href="php/session_end.php">Log Out</a></li>
  </ul></div>
  <div class="dropdown col-md-2">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Loans <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="show_showloans.php">Show Loans</a></li>
      <li><a href="show_loan.php">Loan Book</a></li>
      <li><a href="show_loanreports.php">Loan Reports</a></li>
</ul></div></div>';
}

$head_bit='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="js/login_check.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>';   
$bottom_bit='<div id="loginform" title="Login form">
      <div class="err" id="add_err"></div>
          <form action="./" method="post">
              <ul>
                  <li> <label for="name">Username </label>
                  <input type="text" size="30"  name="name" id="name"  /></li>
                  <li> <label for="name">Password</label>
                  <input type="password" size="30"  name="word" id="word"  /></li>                  
              </ul>
            </form>    
    </div>
    
  </body>
</html>';
?>