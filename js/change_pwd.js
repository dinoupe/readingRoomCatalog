$(document).ready(function(){
  $('#change_pwd').unbind('click').click(function(){
    var new_pwd = $('#newpwd').val();
    var confirm_pwd = $('#confirmpwd').val();
    if (new_pwd == confirm_pwd){
      var old_pwd = $('#oldpwd').val();
      $.get('php/pwd_check.php', {oldpwd:old_pwd}, function(data){
        if(data == 'true'){
          $.post('php/pwd_change.php', {newpwd:new_pwd}, function(data){
            alert(data);            
          }, 'text');
        }
        else{
          alert(data);
        }        
      },'text');
    }
    else{
      alert('Please make sure the new password matches the confirmation');
    }
  });
  $('#pwdbox').keypress(function(e){
    var $key = e.which;
    if($key == 13){$('#change_pwd').trigger('click');}
  });  
})