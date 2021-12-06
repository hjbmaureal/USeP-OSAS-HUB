function checkUserAvailability() {
	$("#loader").show();
	jQuery.ajax({
	url: "check_user_availabilitystaff.php",
	data:'id_num='+$("#id_num").val(),
	type: "POST",
	success:function(data){
		if(data == 1) {
			$("#user-availability-status").html("ID number not available.");
			$("#user-availability-status").css("color","red");
			
		} else {
			$("#user-availability-status").html("ID number available.");
			$("#user-availability-status").css("color","green");
			
		}		

	},
	error:function (){}
	});
}