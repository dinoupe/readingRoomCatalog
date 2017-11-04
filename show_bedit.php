<?php
require_once 'common_bits.php';

$page = $head_bit.'<script type="text/javascript" src="js/bsearch.js"></script>
  <script type="text/javascript" src="js/bedit.js"></script>
  <title>Edit Books</title>
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
      </div>
    </div>
    <div id="searchresult" class="resultbox row"></div>
    <div id="bookedit" class="editbox row" style="display: none">
      <div id="tofill">
      </div>
      <div class="col-md-1 col-md-offset-7 searchbtn">
        <button class="top_btn" id="editbook">Edit</button>
      </div>
      <div class="col-md-1 searchbtn">
        <button class="top_btn" id="deletebook">Delete Entry</button>
      </div>
      <div class="col-md-1 searchbtn">
        <button class="top_btn" id="canceledit">Back</button>
      </div>
    </div>
    <div id="editresult" class="resultbox row"></div>'.$bottom_bit;
    
echo $page;

?>