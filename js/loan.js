$(document).ready(function(){
  $('#loanclic').click(function(){
    $('#bidwarn').hide();
    var $bid = $('#bid').val();
    var $uid = $('#uid').val();
    if($bid != '' && $uid != ''){
      $.get('php/loan.php', {bid:$bid,uid:$uid} ,function(data,status){
          $('#loanresult').html(data);      
        }, 'text');
    }
    else{
          $('#warn').html('Please enter book inv and client id.');
          $('#warn').show();
        }
  });
  $('#loanbox').keypress(function(e){
      var $key = e.which;
      if($key == 13){
        $('#warn').hide();
        var $bid = $('#bid').val();
        var $uid = $('#uid').val();
        if($bid != '' && $uid != ''){
          $.get('php/loan.php', {bid:$bid,uid:$uid} ,function(data,status){
            $('#loanresult').html(data);      
          }, 'text');
        }
        else{
          $('#warn').html('Please enter book inv and client id.');
          $('#warn').show();          
        }
    }}); 
});