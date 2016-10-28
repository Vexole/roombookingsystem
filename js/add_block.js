$(document).ready(function(){
	$("#addBlock").click(function(){
		blockNo = $.trim($("#blockNo").val());
        numberOfRooms = $.trim($("#numberOfRooms").val());
		department = $.trim($("#department").val());

        if(blockNo && numberOfRooms && department){
		$.ajax({
            type: 'POST',
            url: '../php/add_block_validate.php',
            data: {
            	blockNo: blockNo, numberOfRooms: numberOfRooms, department:department
            },
            success: function(data){
                    if(data == "0") {
                    alert("Block Already in existence under given department");
                    $("#blockNo").val("");
                    $("#department").val("");
                }else{
                    alert(data);
                    window.location.replace('../php/edit_blocks.php');
                }
           	}
        });
        return false;
        }
	});

    $("#saveDetails").click(function(){
        blockNo = $.trim($("#blockNo").val());
        numberOfRooms = $.trim($("#numberOfRooms").val());
        department = $.trim($("#departmentName").val());

        if(blockNo && numberOfRooms && department){
        $.ajax({
            type: 'POST',
            url: '../php/edit_block_validate.php',
            data: {
                blockNo: blockNo, numberOfRooms: numberOfRooms, department:department
            },
            success: function(data){
                    if(data == "0") {
                    alert("Block Already in existence under given department");
                    $("#blockNo").val("");
                    $("#department").val("");
                }else{
                    alert(data);
                    window.location.replace('../php/edit_blocks.php');
                }
            }
        });
        return false;
        }
    });
});