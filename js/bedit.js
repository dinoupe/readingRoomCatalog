$(document).ready(function(){
    $('#searchresult').click(function(){
      $('.book').click(function(){
        var inv = $(this).children(':first').html();
        var auth = $(this).children(':nth-child(2)').html();
        var title = $(this).children(':nth-child(3)').html();
        var publisher = $(this).children(':nth-child(4)').html();
        var year = $(this).children(':nth-child(5)').html();
        var isbn = $(this).children(':nth-child(6)').html();
        var categ = $(this).children(':nth-child(7)').html();
        var location = $(this).children(':nth-child(8)').html();
        var $newbook ='<div class="row"><div class="col-md-1 col-md-offset-1"><label id="editinv">' + inv + '</label></div><div class="col-md-2"><label for="editauth">Author</label><input class="form-control" type="text" id="editauth" value="' + auth + '"></input></div><div class="col-md-2"><label for="edittitle">Title</label><input class="form-control" type="text" id="edittitle" value="' + title + '"></input></div><div class="col-md-2"><label for="editcateg">Category</label><input class="form-control" type="text" id="editcateg" value="' + categ + '"></input></div><div class="col-md-1"><label for="edityear">Year</label><input class="form-control" type="text" id="edityear" value="' + year + '"></input></div></div><div class="row"><div class="col-md-2 col-md-offset-2"><label for="editpublisher">Publisher</label><input class="form-control" type="text" id="editpublisher" value="' + publisher + '"></input></div><div class="col-md-2"><label for="editisbn">ISBN</label><input class="form-control" type="text" id="editisbn" value="' + isbn + '"></input></div><div class="col-md-2"><label for="editlocation">Location</label><input class="form-control" type="text" id="editlocation" value="' +location + '"></input></div></div>';
        $('#searchresult').hide();
        $('#bookedit').show();
        $('#tofill').html($newbook);
      });      
    });
    
    function editbook(){
      var $inv = $('#editinv').html(); 
      var $auth = $('#editauth').val();
      var $title = $('#edittitle').val();
      var $cat = $('#editcateg').val();
      var $year = $('#edityear').val();
      var $publisher = $('#editpublisher').val();
      var $isbn = $('#editisbn').val();
      var $location = $('#editlocation').val();
      $.get('php/bedit.php', {inv:$inv,author:$auth,title:$title,category:$cat,year:$year,publisher:$publisher,isbn:$isbn,location:$location} ,function(data,status){
        $('#editresult').html(data);
        $('#editresult').show();      
      }, 'text');
    };
    
    $('#editbook').click(function(){
      editbook();
    });
    $('#bookedit').keypress(function(e){
      var $key = e.which;
      if($key == 13){
        editbook();
    }});
    
    $('#deletebook').click(function(){
      var $inv = $('#editinv').html(); 
      $.get('php/bdelete.php', {inv:$inv} ,function(data,status){
        $('#editresult').html(data);      
      }, 'text');
      $('#searchresult').show();
      $('#bookedit').hide();
      var $auth = $('#auth').val();
      var $title = $('#title').val();
      var $cat = $('#categ').val();
      var $year = $('#year').val();
      var $publisher = $('#publisher').val();
      var $isbn = $('#isbn').val();
      var $location = $('#location').val();    
      $.get('php/bsearch.php', {author:$auth,title:$title,category:$cat,year:$year,publisher:$publisher,isbn:$isbn,location:$location} ,function(data,status){
        $('#searchresult').html(data);      
      }, 'text');
    });
    $('#canceledit').click(function(){
        $('#searchresult').show();
        $('#bookedit').hide();
        $('#editresult').hide();
        $('#searchbookclic').trigger("click");
    });         
});