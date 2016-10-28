$(document).ready(function(){
	$("#addCourse").click(function(){
		courseName = $.trim($("#courseName").val());
        courseCode = $.trim($("#courseCode").val());
        department = $.trim($("#department").val());
        year = $.trim($("#year").val());
		semester = $.trim($("#semester").val());

        if(courseCode && courseName && department && year && semester){
		$.ajax({
            type: 'POST',
            url: '../php/add_course_validate.php',
            data: {
            	courseCode: courseCode, courseName: courseName, department:department, year:year, semester:semester
            },
            success: function(data){
                    if(data == "0") {
                    alert("Course already in existence under given department");
                    $("#courseName").val("");
                    $("#courseCode").val("");
                }else{
                    alert(data);
                    window.location.replace('../php/edit_courses.php');
                }
           	}
        });
        return false;
        }
	});

    $("#saveDetail").click(function(){
        courseName = $.trim($("#courseName").val());
        courseCode = $.trim($("#courseCode").val());
        department = $.trim($("#departmentName").val());
        year = $.trim($("#year").val());
        semester = $.trim($("#semester").val());

         if(courseCode && courseName && department && year && semester){
            $.ajax({
            type: 'POST',
            url: '../php/edit_course_validate.php',
            data: {
                courseCode: courseCode, courseName: courseName, department:department, year:year, semester:semester
            },
            success: function(data){
                    if(data == "0") {
                    alert("Course already in existence under given department");
                    $("#courseName").val("");
                    $("#courseCode").val("");
                }else{
                    alert(data);
                    window.location.replace('../php/edit_courses.php');
                }
            }
        });
        return false;
      }
    });
});