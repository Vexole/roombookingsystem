$(document).ready(function(){
	$("#login").click(function(){
		userName = $.trim($("#userName").val());
		password = $.trim($("#password").val());

		if(userName && password){
			$.ajax({
            type: 'POST',
            url: '../php/login_validate.php',
            data: {
            	userName: userName, password: password
            },
            success: function(data){
                          if(data == "1") {
                  			window.location.replace('../php/index.php');
                }else{
                	alert("Username/Password not valid!");
                    $("#userName").val("");
                    $("#password").val("");
                }
           	}
        });
        return false;
		}
	});
});