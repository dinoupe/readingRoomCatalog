$(document).ready(function(){
  $('#loanresult').click(function(){
    $('.sendmailbutton').show();
    $('.sendmail').unbind('click').click(function(){
      var $to = $(this).parents('tr').children(':nth-child(3)').attr('uid');
      var $book = $(this).parents('tr').children(':first').attr('bid'); 
      $.get('php/send_mail.php', {book:$book,to:$to}, function(data,status){
        alert(data);
      }, 'text');
    });
  });
});