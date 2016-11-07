$(document).ready(function(){
	$("#addRoom").click(function(){
		blockNo = $.trim($("#blockNo").val());
        roomNo = $.trim($("#roomNo").val());
		capacity = $.trim($("#capacity").val());

        if(blockNo && roomNo && capacity){
		$.ajax({
            type: 'POST',
            url: '../php/add_room_validate.php',
            data: {
            	blockNo: blockNo, roomNo: roomNo, capacity:capacity
            },
            success: function(data){
                    if(data == "0") {
                    alert("Room Already in existence under given block");
                    $("#blockNo").val("");
                    $("#roomNo").val("");
                }else{
                    alert(data);
                    window.location.replace('../php/edit_rooms.php');
                }
           	}
        });
        return false;
    }
	});
});