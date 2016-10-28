$(document).ready(function () {
    
    $("#bookRoom").click(function () {
        bookedDate = $('#bookedDate').val();
        startTime = $('#startTime').val();
        finishTime = $('#finishTime').val();
        roomNo = $('#roomNo').val();
        blockNo = $('#blockNo').val();
        courseCode = $('#courseCode').val();
        teacherMail = $('#teacherMail').val();

     
        if (bookedDate && startTime && finishTime && roomNo && blockNo && teacherMail && courseCode) {
            if(startTime < finishTime){
                $.ajax({
                    type: 'POST',
                    url: '../php/book_room_validate.php',
                    data: {
                        bookedDate: bookedDate, startTime: startTime, finishTime: finishTime, roomNo: roomNo, blockNo: blockNo, teacherMail: teacherMail, courseCode:courseCode
                    },
                    statusCode: {
                        404: function () {
                            alert("Page Not Found");
                        }
                    },
                    success: function (data) {
                        if(data == "1"){
                            alert("Successfully Booked");
                            window.location.replace('../php/index.php');
                        }else{
                            alert("Room Already in use.");
                        }
                    }
                });
                return false;
            }else{
                alert("Insert time propoerly");
            }
        } else {

        }
    });
});
