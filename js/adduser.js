$(document).ready(function(){
    function adduser(){
        var $uid = $('#userid').val();
        var $pwd = $('#pwd').val();
        var $email = $('#email').val();
        var $type = $('#type').val();
        var $phone = $('#phone').val();          
        $.get('php/adduser.php', {uid:$uid,upwd:$pwd,email:$email,type:$type,phone:$phone} ,function(data,status){
          $('#adduserresult').html(data);      
        }, 'text');
    };
    
    var colheight = $('.searchbtn').siblings('.col-md-offset-1').css('height');
    $('.searchbtn').css('height', colheight);
    $('#adduserclic').click(function(){
      adduser();
    });
    $('#adduserbox').keypress(function(e){
      var $key = e.which;
      if($key == 13){ 
        adduser();
      }
    });   
});