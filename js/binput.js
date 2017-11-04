$(document).ready(function(){
    var colheight = $('.searchbtn').siblings('.col-md-offset-1').css('height');
    $('.searchbtn').css('height', colheight);
    
    function inputbook(){
      var $auth = $('#auth').val();
      var $title = $('#title').val();
      var $cat = $('#categ').val();
      var $year = $('#year').val();
      var $publisher = $('#publisher').val();
      var $isbn = $('#isbn').val();
      var $location = $('#location').val();    
      $.get('php/binput.php', {author:$auth,title:$title,category:$cat,year:$year,publisher:$publisher,isbn:$isbn,location:$location} ,function(data,status){
        $('#inputresult').html(data);      
      }, 'text');
    };
    
    $('#inputbookclic').click(function(){
      inputbook();
    });
    
    $('#bookinput').keypress(function(e){
      var $key = e.which;
      if($key == 13){
        inputbook();
    }});   
});