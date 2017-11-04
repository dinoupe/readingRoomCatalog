$(document).ready(function(){
    $('#showuserresult').click(function(){
      $('.user').click(function(){
        var id = $(this).children(':first').html();
        var userid = $(this).children(':nth-child(2)').html();
        var email = $(this).children(':nth-child(3)').html();
        var phone = $(this).children(':nth-child(4)').html();
        var type = $(this).children(':nth-child(5)').html();
        var $newuser ='<div class="col-md-1 col-md-offset-1"><label id="editid">' + id + '</label></div><div class="col-md-2"><label for="edituserid">Name</label><input class="form-control" type="text" id="edituserid" value="' + userid + '"></input></div><div class="col-md-2"><label for="editmail">Email</label><input class="form-control" type="text" id="editemail" value="' + email + '"></input></div><div class="col-md-2"><label for="editphone">Tel.#</label><input class="form-control" type="text" id="editphone" value="' + phone + '"></input></div><div class="col-md-2"><label for="edittype">Type</label><select class="form-control" name="decision" id="edittype"><option selected>' + type + '</option><option>Student</option><option>Staff</option><option>Admin</option></select></div>';
        $('#showuserresult').hide();
        $('#useredit').show();
        $('#tofill').html($newuser);
      });      
    });
    
    function edituser(){
      var $id = $('#editid').html();
      var $uid = $('#edituserid').val();
      var $email = $('#editemail').val();
      var $type = $('#edittype').val();
      var $phone = $('#editphone').val();                
      $.get('php/edituser.php', {id:$id,uid:$uid,email:$email,type:$type,phone:$phone} ,function(data,status){
        $('#edituserresult').html(data);      
      }, 'text');
    };
    
    $('#edituser').click(function(){
      edituser();
    });
    $('#useredit').keypress(function(e){
      var $key = e.which;
      if($key == 13){
        edituser();
      }
    });
    $('#deleteuser').click(function(){
      var $id = $('#editid').html();                
      $.get('php/deleteuser.php', {id:$id} ,function(data,status){
        $('#edituserresult').html(data);      
      }, 'text');
      $('#useredit').hide();
      $('#showuserresult').show();
      var $uid = $('#userid').val();
      var $email = $('#email').val();
      var $type = $('#type').val();
      var $phone = $('#phone').val();                
      $.get('php/showusers.php', {uid:$uid,email:$email,type:$type,phone:$phone} ,function(data,status){
        $('#showuserresult').html(data);      
      }, 'text');
    });
    $('#canceledit').click(function(){
        $('#showuserresult').show();
        $('#useredit').hide();
    });         
});