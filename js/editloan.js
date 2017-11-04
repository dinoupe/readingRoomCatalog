$(document).ready(function(){
    $('#loanresult').click(function(){
      $('#editloanresult').html('');
      $('#sendmailresult').html('');
      $('.extendbutton').show()
      $('.returnbutton').show()
      $('.extend').click(function(){
        var $bid = $(this).parents('tr').children(':first').attr('bid')
        var $uid = $(this).parents('tr').children(':nth-child(3)').attr('uid')
        $.get('php/extendloan.php', {bid:$bid,uid:$uid}, function(data,status){
        alert(data);
      }, 'text');
        $('#showloanclic').trigger('click'); 
      });
      $('.return').click(function(){
        var $bid = $(this).parents('tr').children(':first').attr('bid')
        var $uid = $(this).parents('tr').children(':nth-child(3)').attr('uid')
        $.get('php/deleteloan.php', {bid:$bid,uid:$uid}, function(data,status){
        alert(data);
      }, 'text');
        $('#showloanclic').trigger('click'); 
      });
    });
});