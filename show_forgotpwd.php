<?php

$page = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/forgotpwd.js"></script>
  <title>Forgot password</title>
  </head>
  <body>
  <div class="row">
  <div class="col-md-10 col-md-offset-1 ptitle">
    <h1><abbr title="Alexandru Ioan Cuza University">UAIC</abbr> Reading Room and English Department Online Catalog</h1>
</div></div>
  <div id="forgotpwd" class="inputbox">
      <div class="row row-eq-height">
        <div class="col-md-3 col-md-offset-1"><label for="uemail">Please enter your email address</label><input class="form-control" type="text" id="uemail"></input></div>
        <div class="col-md-1" style="color:black; padding-top: 30px"><button id="getnewpwd">Send</button></div>
      </div>
    </div>
    <div class="row"><div class="col-md-offset-1 col-md-10" id="postmsg"></div></div>
   </body>
</html>';


    
echo $page;


?>