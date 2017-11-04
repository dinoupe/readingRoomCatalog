<?php
require_once 'common_bits.php';

$page = $head_bit.'<script type="text/javascript" src="js/showloans.js"></script>
  <script type="text/javascript" src="js/editloan.js"></script>
  <title>Edit Loans</title>
  </head>
  <body>'.$menu_bar.'<div id="loanbox" class="inputbox">
      <div class="row row-eq-height">
        <div class="col-md-1 col-md-offset-1"><label for="bid">Book inv</label><input class="form-control" type="text" id="bid"></input></div>
      <div class="col-md-2"><label for="title">Book title</label><input class="form-control" type="text" id="title"></input></div>
      <div class="col-md-1"><label for="uid">Client id</label><input class="form-control" type="text" id="uid"></input></div>
      <div class="col-md-2"><label for="uname">Client</label><input class="form-control" type="text" id="uname"></input></div>
      <div class="col-md-1"><label for="date">Date</label><input class="form-control" type="text" id="date"></input></div>
      <div class="col-md-1 searchbtn"><button class="bottom_btn" id="showloanclic">Search</button></div>
      </div>
    </div>
    <div id="loanresult" class="resultbox row"></div>
    <div id="editloan" class="editbox row" style="display: none; top:250px">
      <div class="col-md-6 col-md-offset-1">
        <div class="row" id="tofill"></div>
      </div>
      <div class="col-md-1"><button id="loanedit">Edit</button></div>
      <div class="col-md-1"><button id="loandelete">Delete</button></div>
      <div class="col-md-1"><button id="canceledit">Cancel</button></div>
    </div>
    <div id="editloanresult" class="resultbox"></div>'.$bottom_bit;
    
echo $page;

?>