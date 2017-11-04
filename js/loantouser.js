$(document).ready(function(){
    $('#showuserresult').click(function(){
      $('.user').click(function(){
        $('#warn').hide();
        var $uid = $(this).children(':first').html();
        var $bid = $('#bid').val();
        if($bid != ''){
          $.get('php/loan.php', {bid:$bid,uid:$uid} ,function(data,status){
            $('#loanresult').html(data);      
          }, 'text');
          $('#showuserresult').hide();
        }
        else{
          $('#warn').html('Please enter book inv.');
          $('#warn').show();
        }
      });      
    });         
});