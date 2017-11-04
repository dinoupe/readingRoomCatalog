<?php
require_once 'common_bits.php';

$page = $head_bit.'<script type="text/javascript" src="js/bsearch.js"></script>
  <script type="text/javascript" src="js/loan.js"></script>
  <script type="text/javascript" src="js/showusers.js"></script>
  <script type="text/javascript" src="js/loantouser.js"></script>
  <title>Loan Books</title>
  </head>
  <body>'.$menu_bar.'<div id="loanbox" class="inputbox">
      <div class="row row-eq-height">
        <div class="col-md-1 col-md-offset-1"><label for="bid">Book Inv</label><input class="form-control" type="text" id="bid"></input></div>
        <div class="col-md-1"><label for="uid">Client ID</label><input class="form-control" type="text" id="uid"></input></div>      
        <div class="col-md-1 searchbtn"><button class="bottom_btn" id="loanclic">Loan</button></div>
      </div>
    </div>
    <div id="showuserbox" class="inputbox" style="top:200px">
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
    <p id="warn" class="row bg-warning" style="display:none"></p>
    <div id="showuserresult" class="resultbox row"></div>
    <div id="loanresult" class="resultbox row"></div>'.$bottom_bit;
    
echo $page;

?>