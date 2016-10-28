$(document).ready(function(){
	$("#addAdmin").click(function(){
		userName = $.trim($("#userName").val());
		password = $.trim($("#password").val());
        school = $.trim($("#school").val());
		department = $.trim($("#department").val());

        if(userName && password && school && department){
		$.ajax({
            type: 'POST',
            url: '../admin/add_user_validate.php',
            data: {
            	userName: userName, password: password, school: school, department:department
            },
            success: function(data){
                            if(data == "Username already used.") {
                    alert(data);
                    $("#userName").val("");
                }else{
                    alert(data);
                   // window.location.replace('../admin/index.php');
                }
           	}
        });
        return false;
    }
	});
});