<?php
require_once 'common_bits.php';

$page = $head_bit.'<script type="text/javascript" src="js/loanreports.js"></script>
  <title>Show Loan Reports</title>
  </head>
  <body>'.$menu_bar.'<div id="bookreport" class="row row-eq-height">
      <div class="col-md-1 col-md-offset-1">
        <label for="bstartdate">Start Date</label>
        <input type="text" class="form-control" id="bstartdate" placeholder="YYYY-MM-DD"></input>
      </div>
      <div class="col-md-1">
        <label for="benddate">End Date</label>
        <input type="text" class="form-control" id="benddate" placeholder="YYYY-MM-DD"></input>
      </div>
      <div class="col-md-1 searchbtn">
        <button class="bottom_btn" id="breport">Show Report</button>
      </div>
      <div class="col-md-1 searchbtn">
        <button class="bottom_btn" id="areport">Authors Top</button>
      </div>
    </div>
    <div id="showbrep" class="resultbox row"></div>
    <div id="showarep" class="resultbox row"></div>'.$bottom_bit;
    
echo $page;

?>