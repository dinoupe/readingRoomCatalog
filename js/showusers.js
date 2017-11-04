$(document).ready(function(){
    function showusers(){
      var $uid = $('#userid').val();
      var $email = $('#email').val();
      var $type = $('#type').val();
      var $phone = $('#phone').val();                
      $.get('php/showusers.php', {uid:$uid,email:$email,type:$type,phone:$phone} ,function(data,status){
        $('#showuserresult').html(data);
        $('#showuserresult').show();     
      }, 'text');
    };
    
    $('#showuserclic').click(function(){
      showusers();
    });
    $('#showuserbox').keypress(function(e){
      var $key = e.which;
      if($key == 13){ 
        showusers();
      }
    });   
});