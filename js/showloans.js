$(document).ready(function(){
  function showloans(){
    var $bid = $('#bid').val();
    var $title = $('#title').val();
    var $uid = $('#uid').val();
    var $uname = $('#uname').val();
    var $date = $('#date').val();
    $.get('php/showloans.php', {bid:$bid,uid:$uid,title:$title,uname:$uname,date:$date} ,function(data,status){
        $('#loanresult').html(data);      
      }, 'text');
  };
  
  showloans();
  
  $('#showloanclic').click(function(){
    showloans();
  });
  $('#loanbox').keypress(function(e){
      var $key = e.which;
      if($key == 13){
        showloans();
  }});    
});