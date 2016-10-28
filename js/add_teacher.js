$(document).ready(function(){
	$("#addTeacher").click(function(){
		teacherName = $.trim($("#teacherName").val());
        department = $.trim($("#departmentName").val());
        number = $.trim($("#number").val());
        teacherMail = $("#teacherMail").val();

        if(teacherName && department && number && teacherMail){
            $.ajax({
                type: 'POST',
                url: '../php/add_teacher_validate.php',
                data: {
                    teacherName: teacherName, department:department, number: number, teacherMail: teacherMail
                },
                success: function(data){
                    if(data == "0") {
                        alert("Teacher already in existence under given department");
                        $("#teacherName").val("");
                        $("#teacherMail").val("");
                        $("#department").val("");
                        $("#number").val("");
                    }else{
                        alert(data);
                        window.location.replace('../php/edit_teachers.php');
                    }
                }
            });
            return false;
        }
	});
});