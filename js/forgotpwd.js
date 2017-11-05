$(document).ready(function(){
	$('#getnewpwd').click(function(){
		$useremail = $('#uemail').val();
		$.post('php/forgot_pwd.php',{useremail:$useremail},function(data){
			$('#postmsg').html(data);
		},"text");
	})
})