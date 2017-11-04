$(document).ready(function(){
    function getbooksearch(){
      $('#reserve').show();
      var $auth = $('#auth').val();
      var $title = $('#title').val();
      var $cat = $('#categ').val();
      var $year = $('#year').val();
      var $publisher = $('#publisher').val();
      var $isbn = $('#isbn').val();
      var $location = $('#location').val();    
      $.get('php/bsearch.php', {author:$auth,title:$title,category:$cat,year:$year,publisher:$publisher,isbn:$isbn,location:$location} ,function(data,status){
        $('#searchresult').html(data);
        $('#searchresult').change();
        $hash = 'auth=' + encodeURIComponent($auth) + '&#title=' + encodeURIComponent($title) +'&#categ=' + encodeURIComponent($cat) + '&#year=' + encodeURIComponent($year) + '&#publisher=' + encodeURIComponent($publisher) + '&#isbn=' + encodeURIComponent($isbn) + '&#location=' + encodeURIComponent($location) ;
        document.location.hash = $hash;
        pos = $('label[for="auth"]').offset();
        $(window).scrollTop(pos.top);        
      }, 'text');
    }
    var colheight = $('.searchbtn').siblings(':first').css('height');
    $('.searchbtn').css('height', colheight);
    
    $('#searchbookclic').click(function(){
      getbooksearch();
    });
    $('#searchbox').keypress(function(e){
      var $key = e.which;
      if($key == 13){
        getbooksearch();
      }
    });
    $('#searchresult').change(function(){
      $('.book').click(function(){
        var row = $(this);
        $.get('php/reservation_check.php',{bid : row.children(":first").html()}, function(data){
          if(data == 'Free'){
            row.toggleClass('reserved');
          };
        },'text');        
      });
    });
    $('#reserve').click(function(){
      $('.reserved').map(function(){
        $.get('php/breserve.php',{bid:$(this).children(":first").html()},function(data){
          if (data!='success'){
            alert(data);
          }
        },'text');
      });
    });   
});