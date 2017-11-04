function showlogin(){
  $('#loginform').dialog('open');
};

$(document).ready(function(){
  $('#showlogin').click(function(){
    showlogin();
  });
  function login(){
    $("#add_err").css('display', 'none', 'important');   
        username=$("#name").val();
        password=$("#word").val();
        $.ajax({
          type: "POST",
          url: "php/login.php",
          data: "uid="+username+"&upwd="+password,
          dataType: "json",
          success: function(data){
            if(data == null){
              $("#add_err").css('display', 'inline', 'important');
              $("#add_err").html("<strong>Wrong username or password</strong>");
            }    
            else if(data['stat']=='active'){
               dialog.dialog('close');
            }
            else{
              $("#add_err").css('display', 'inline', 'important');
              $("#add_err").html("<strong>Wrong username or password</strong>");             
            }
          },
          beforeSend:function()
          {
            $("#add_err").css('display', 'inline', 'important');
          }
        });
        return false;
  };
  
  dialog = $('#loginform').dialog({
    modal : true,
    autoOpen: false,
    show : 'blind',
    hide : 'fade',
    height : 250,
    width : 400,
    buttons: {
      "Login": login,
      Cancel: function(){dialog.dialog("close");}
    }
  });
  
  
});