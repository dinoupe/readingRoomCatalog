function showmenu(utype){
  if(utype=='Admin'){
          $('.pmenu').html("<div class='dropdown col-md-2 col-md-offset-2'><button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Book <span class='caret'></span></button><ul class='dropdown-menu'><li><a href='show_bsearch.php'>Book Search</a></li><li><a href='show_bedit.php'>Edit Book</a></li><li><a href='show_binput.php'>Add Book</a></li></ul></div><div class='dropdown col-md-2'><button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>User <span class='caret'></span></button><ul class='dropdown-menu'><li><a href='show_showusers.php'>Show Users</a></li><li><a href='show_edituser.php'>Edit User</a></li><li><a href='show_show_adduser.php'>Add User</a></li><li><a href='show_change_pwd.php'>Change Password</a></li><li><a href='php/session_end.php'>Log Out</a></li></ul></div><div class='dropdown col-md-2'><button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Loans <span class='caret'></span></button><ul class='dropdown-menu'><li><a href='show_showloans.php'>Show Loans</a></li><li><a href='show_loan.php'>Loan Book</a></li><li><a href='show_loanreports.php'>Loan Reports</a></li></ul></div>");        
  }
};

$(document).ready(function(){
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
              showmenu(data['type']);
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
      "Forgot password":function(){window.location.href='show_forgotpwd.php'},
      Cancel: function(){dialog.dialog("close");}
    }
  });

  $.get("php/login_status.php", function(data){
    if((data == 'false') || (data[0] != 'active')){
      $('#loginform').dialog('open');      
    };
  }, "json" );
  
  var colheight = $('.searchbtn').siblings(':first').css('height');
  $('.searchbtn').css('height', colheight);
});