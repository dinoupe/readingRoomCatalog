<?php
require_once 'common_bits.php';

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
    
echo $page;

?>