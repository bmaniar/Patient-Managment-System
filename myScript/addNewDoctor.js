

function addnewdoctor() 
{
	var d_id = $("#d_id").val();
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
		$("#signup_status").html('<div class="error">Please enter your FIrst Name.</div>');
		$("#fname").focus();
		
	}
	else if(lname == "")
	{
		$("#signup_status").html('<div class="error">Please enter your Last Name.</div>');
		$("#lname").focus();
	}else if(age == "")
	{
		$("#signup_status").html('<div class="error">Please select Age.</div>');
		$("#age").focus();
	}else if(gender == "Select")
	{
		$("#signup_status").html('<div class="error">Please select gender.</div>');
		$("#gender").focus();
	}
	
	else
	{
		var dataString = 
		'd_id='+ d_id 
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
		+ '&page=addNewDoctor';
		
		$.ajax({
			type: "POST",
			url: "ajaxFiles/addNewDoctor.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#signup_status").html('<div style=" color:green; margin-left:15px;width:35px;"><img src="img/ajax-loader.gif" alt="Loading...." align="absmiddle"  title="Loading...."/></div>');
			},
			success: function(response)
			{
				$("#signup_status").hide().fadeIn('slow').html(response);
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


