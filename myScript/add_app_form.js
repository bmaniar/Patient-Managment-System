function save_app() 
{
    
	var p_id = $("#p_id").val();
	var d_id = $("#d_id").val();
	var time = $("#time").val();
        var mm = $("#mm").val();
	var dd = $("#dd").val();
	var yy = $("#yy").val();
        var date = $("#date").val();
	var encoder = $("#encoder").val();
	
	if(p_id == "")
	{
		$("#app_status").html('<div class="error">Please Choose Patient.</div>');
		$("#p_id").focus();
		
		
	}
	else if(encoder == "")
	{
		$("#app_status").html('<div class="error">Please Choose Encoder.</div>');
		$("#encoder").focus();
		
		
	}
        else if(d_id == ""){
                $("#app_status").html('<div class="error">Please Choose Doctor.</div>');
		$("#d_id").focus();
        }
        else if(time ==""){
                $("#app_status").html('<div class="error">Please Select Time.</div>');
		$("#time").focus();
        }
	else
	{
		var dataString = 'p_id='+ p_id 
		+ '&d_id=' + d_id 
		+ '&time=' + time 
		+ '&mm=' + mm
		+ '&dd=' + dd
		+ '&yy=' + yy
		+ '&encoder=' + encoder 
		+ '&page=app';
		
		$.ajax({
			type: "POST",
			url: "ajaxFiles/add_app_form.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#app_status").html('<div style=" color:green; margin-left:15px;width:35px;"><img src="img/ajax-loader.gif" alt="Loading...." align="absmiddle"  title="Loading...."/></div>');
			},
			success: function(response)
			{
				
				$("#app_status").hide().fadeIn('slow').html(response);
				
				$("#encoder").val("");
			
			}
		});
	}
}