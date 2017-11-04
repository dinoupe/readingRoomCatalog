<?php
require_once 'common_bits.php';

$page = $head_bit.'<script type="text/javascript" src="js/showusers.js"></script>
  <title>Show Users</title>
  </head>
  <body>'.$menu_bar.'<div id="showuserbox" class="inputbox">
      <div class="row row-eq-height">
        <div class="col-md-2 col-md-offset-1"><label for="userid">Name</label><input class="form-control" type="text" id="userid"></input></div>
        <div class="col-md-2"><label for="email">Email</label><input class="form-control" type="text" id="email"></input></div>
        <div class="col-md-2"><label for="phone">Tel.#</label><input class="form-control" type="text" id="phone"></input></div>
        <div class="col-md-2"><label for="type">User Type</label><select class="form-control" name="decision" id="type">
                                <option selected></option>
                                <option>Student</option>
                                <option>Staff</option>
                                <option>Admin</option>
                                </select></div>    
        <div class="col-md-1 searchbtn"><button class="bottom_btn" id="showuserclic">Show</button></div>
      </div>
    </div>
    <div id="showuserresult" class="resultbox row"></div>'.$bottom_bit;
    
echo $page;

?>