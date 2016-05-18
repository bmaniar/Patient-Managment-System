

function addNewPatients() 
{
	var p_id = $("#p_id").val();
	var fname = $("#fname").val();
	var lname = $("#lname").val();
	var mi = $("#mi").val();
	var age = $("#age").val();
	var gender = $("#gender").val();
	var status = $("#status").val();
	var mm = $("#mm").val();
	var dd = $("#dd").val();
	var yy = $("#yy").val();
	var brgy = $("#brgy").val();
	var city = $("#city").val();
	var prov = $("#prov").val();
	var remark = $("#remark").val();
	var postal = $("#postal").val();
	
	
	if(fname == "")
	{
		$("#patient_status").html('<div class="error">Please enter your FIrst Name.</div>');
		$("#fname").focus();
		
	}
	else if(lname == "")
	{
		$("#patient_status").html('<div class="error">Please enter your Last Name.</div>');
		$("#lname").focus();
	}else if(age == "")
	{
		$("#patient_status").html('<div class="error">Please select Age.</div>');
		$("#age").focus();
	}else if(gender == "Select")
	{
		$("#patient_status").html('<div class="error">Please select gender.</div>');
		$("#gender").focus();
	}
	
	else
	{
		var dataString = 
		'p_id='+ p_id 
		+ '&fname='+ fname 
		+ '&lname=' + lname 
		+ '&mi=' + mi 
		+ '&age=' + age
		+ '&gender=' + gender
		+ '&status=' + status
		+ '&mm=' + mm
		+ '&dd=' + dd
		+ '&yy=' + yy
		+ '&brgy=' + brgy
		+ '&city=' + city
		+ '&prov=' + prov
		+ '&postal=' + postal
		+ '&remark=' + remark
		+ '&page=addNewPatients';
		$.ajax({
			type: "POST",
			url: "ajaxFiles/addNewPatients.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#patient_status").html('<div style=" color:green; margin-left:15px;width:35px;"><img src="img/ajax-loader.gif" alt="Loading...." align="absmiddle"  title="Loading...."/></div>');
			},
			success: function(response)
			{
				$("#patient_status").hide().fadeIn('slow').html(response);
				$("#fname").val("");
				$("#lname").val("");
				$("#mi").val("");
				$("#age").val("");
				$("#brgy").val("");
				$("#city").val("");
				$("#prov").val("");
				$("#remark").val("");
			}
		});
	}
}


