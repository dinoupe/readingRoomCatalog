<?php
require_once 'common_bits.php';

$page = $head_bit.'<script src="js/bsearch.js"></script>
  <script src="js/urlparse.js"></script>
  
  <title>Search for books</title>
  </head>
  <body>'.$menu_bar.'<div id="searchbox" class="inputbox">
      <div class="row row-eq-height" style="padding-left:50px">
        <div class="col-md-2"><label for="auth">Author</label><input class="form-control" type="text" id="auth"></input></div>
        <div class="col-md-2"><label for="title">Title</label><input class="form-control" type="text" id="title"></input></div>
        <div class="col-md-1"><label for="categ">Categories</label><input class="form-control" type="text" id="categ"></input></div>
        <div class="col-md-1"><label for="year">Year</label><input class="form-control" type="text" id="year"></input></div>
         <div class="col-md-1"><label for="publisher">Publisher</label><input class="form-control" type="text" id="publisher"></input></div>
        <div class="col-md-1"><label for="isbn">ISBN</label><input class="form-control" type="text" id="isbn"></input></div>
        <div class="col-md-1"><label for="location">Location</label><input class="form-control" type="text" id="location"></input></div>
        <div class="col-md-1 searchbtn"><button class="bottom_btn" id="searchbookclic">Search</button></div>
        <div class="col-md-1 searchbtn"><button class="bottom_btn" id="reserve">Reserve</button></div>
      </div>
      
    </div>
    <div id="searchresult" class="resultbox row"></div>'.$bottom_bit;
    
echo $page;
?>