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

    $("#saveDetail").click(function(){
        roomNo = $.trim($("#roomNo").val());
        blockNo = $.trim($("#blockNo").val());
        capacity = $.trim($("#capacity").val());

         if(roomNo && blockNo && capacity){
            $.ajax({
            type: 'POST',
            url: '../php/edit_room_validate.php',
            data: {
                roomNo: roomNo, blockNo: blockNo, capacity:capacity
            },
            success: function(data){
                    if(data == "0") {
                    alert("Room already in existence under given department");
                    $("#roomNo").val("");
                    $("#blockNo").val("");
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