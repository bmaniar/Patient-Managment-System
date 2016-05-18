function editdoctor() 
{
    
	var d_id = $("#d_id").val();
	var fname = $("#fname").val();
	var lname = $("#lname").val();
	var mi = $("#mi").val();
	var age = $("#age").val();
	var gender = $("#gender").val();
	var stat = $("#stat").val();
	var mm = $("#mm").val();
	var dd = $("#dd").val();
	var yy = $("#yy").val();
	var brgy = $("#brgy").val();
	var city = $("#city").val();
	var prov = $("#prov").val();
	var remark = $("#remark").val();
	var postal = $("#postal").val();
	

		var dataString = 
		'd_id='+ d_id 
		+ '&fname='+ fname 
		+ '&lname=' + lname 
		+ '&mi=' + mi 
		+ '&age=' + age
		+ '&gender=' + gender
		+ '&stat=' + stat
		+ '&mm=' + mm
		+ '&dd=' + dd
		+ '&yy=' + yy
		+ '&brgy=' + brgy
		+ '&city=' + city
		+ '&prov=' + prov
		+ '&postal=' + postal
		+ '&remark=' + remark
		+ '&page=editdoctor';
		
		$.ajax({
			type: "POST",
			url: "ajaxFiles/edit_doc_record.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#signup_status").html('<div style=" color:green; margin-left:15px;width:35px;"><img src="img/ajax-loader.gif" alt="Loading...." align="absmiddle"  title="Loading...."/></div>');
			},
			success: function(response)
			{
				$("#signup_status").hide().fadeIn('slow').html(response);
			
			}
		});
	}
