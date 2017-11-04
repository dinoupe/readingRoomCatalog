<?php
require_once 'common_bits.php';

$page = $head_bit.'<script type="text/javascript" src="js/binput.js"></script>
  <title>Enter New Books</title>
  </head>
  <body>'.$menu_bar.'<div id="bookinput" class="inputbox">
      <div class="row row-eq-height">
        <div class="col-md-2 col-md-offset-1"><label for="auth">Author</label><input class="form-control" type="text" id="auth"></input></div>
        <div class="col-md-2"><label for="title">Title</label><input class="form-control" type="text" id="title"></input></div>
        <div class="col-md-2"><label for="categ">Categories</label><input class="form-control" type="text" id="categ"></input></div>
        <div class="col-md-2"><label for="year">Year</label><input class="form-control" type="text" id="year"></input></div>
      </div>
      <div class="row row-eq-height">
        <div class="col-md-2 col-md-offset-1"><label for="publisher">Publisher</label><input class="form-control" type="text" id="publisher"></input></div>
        <div class="col-md-2"><label for="isbn">ISBN</label><input class="form-control" type="text" id="isbn"></input></div>
        <div class="col-md-2"><label for="location">Location</label><input class="form-control" type="text" id="location"></input></div>
        <div class="col-md-1 searchbtn"><button class="bottom_btn" id="inputbookclic">Assign</button></div>
      </div>
    </div>
    
    <div id="inputresult" class="resultbox row"></div>'.$bottom_bit;
    
echo $page;

?>