

<!------ Script And Style ----->

 <script type="text/javascript" src="<?php echo $vpath?>js/jquery.form.js"></script>
 <script type="text/javascript" src="<?php echo $vpath?>js/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo $vpath?>myScript/addNewDoctor.js"></script>
 <link href="css/warningCss.css" rel="stylesheet" type="text/css"/>



<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#photoimg').live('change', function()			{ 
			           $("#p").html('');
			    $("#p").html('<img src="images/loader.gif"/>');
			$("#imageform").ajaxForm({
                        target: '#p'
		}).submit();
		
			});
        }); 
</script>


<table  align="center" style="margin:20px; font-size:15px; height:480px; font-weight:bold; width:800px;" border="0">
   <div id="signup_status"></div>
<tr>
<td>Doctors ID:&nbsp;<span class="label label-success">Default</span></td>
</tr>
<tr>
<td>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#load_doc_id').load('load_doc_id.php').fadeIn("slow");
}, 1000); // refresh every 10000 milliseconds

</script>
<span id="load_doc_id"></span>
</td>
</tr>
<tr>
<td>First Name&nbsp;<span class="label label-important">Required</span></td>
<td>
Last Name&nbsp;<span class="label label-important">Required</span>
</td>
<td>
Middle Name&nbsp;<span class="label label-success">Optional</span>
</td>
<td>
Age&nbsp;<span class="label label-important">Required</span>
</td>

</tr>
<tr><td>
<input id="fname" name="fname" type="text"  class="" required="required">
</td>
<td>
<input id="lname" name="lname" type="text" value="<?php echo $rs['quantity']; ?>" required="required">

</td>
<td><input id="mi" name="mi" type="text" value="<?php echo $rs['price']; ?>" class="" required="required">
</td>
<td><input id="age" name="age" type="text" value="<?php echo $rs['price']; ?>" class="input-small" required="required">
</td>

</tr>

<td>
Gender&nbsp;<span class="label label-important">Required</span>
</td>
<td>
Status&nbsp;<span class="label label-success">Optional</span>
</td>
<td>
Birthdate&nbsp;<span class="label label-success">Optional</span>
</td>
<tr>
<td>
<select class="input-small" name="gender" id="gender">
<option>Select</option>
<option>Male</option>
<option>Female</option>
</select>
</td>

<td>
<select class="input-medium" name="status" id="status">
<option>Select</option>
<option>Single</option>
<option>Married</option>
</select>
</td>
<td>

 <select class="input-small" name="mm" id="mm">
<option value="00">MM</option>
<option value="01">January</option>
<option value="02">February</option> 
<option value="03">March</option>
<option value="04">April</option> 
<option value="05">May</option> 
<option value="06">June</option> 
<option value="07">July</option> 
<option value="08">August</option> 
<option value="09">September</option> 
<option value="10">October</option> 
<option value="11">November</option> 
<option value="12">December</option> 
</select>

 <select class="input-small" name="dd" id="dd" style="width:60px;">
<option value="00">DD</option>
<?php for($x=1;$x<32;$x++){
	echo '<option value="'.$x.'">'.$x.'</option>';
	} ?>
    </select>
    
     <select class="input-small" name="yy" id="yy" style="width:80px;">
<option>YY</option>
<?php for($x=1950;$x<2020;$x++){
	echo '<option value="'.$x.'">'.$x.'</option>';
	} ?>
    </select>
</td>
</tr>
<tr>
<td height="20" colspan="4" style="border-bottom:1px solid #CCC;">Address</td>
</tr>

<tr>
<td  >House No.&nbsp;<span class="label label-success">Optional</span></td>
<td >City/Municipality&nbsp;<span class="label label-success">Optional</span></td>
<td >Province&nbsp;<span class="label label-success">Optional</span></td>
<td >Postal Code&nbsp;<span class="label label-success">Optional</span></td>
</tr>
<tr>
<td  ><input id="brgy" name="brgy" type="text" value="<?php echo $rs['price']; ?>" class="input-large" required="required"></td>
<td ><input id="city" name="city" type="text" value="<?php echo $rs['price']; ?>" class="input-large" required="required"></td>
<td ><input id="prov" name="prov" type="text" value="<?php echo $rs['price']; ?>" class="input-large" required="required"></td>
<td><input id="postal" name="postal" type="text" value="<?php echo $rs['price']; ?>" class="input-small" required="required"></td>
</tr>
<tr>
<td>Remarks&nbsp;<span class="label label-success">Optional</span></td>
</tr>
<tr>
<td colspan="5">
<textarea name="remark" id="remark" class="span7" style="width:898px;"></textarea></td>
</tr>

<tr><td colspan="2" align="left" height="20">

<a href="javascript:void(0);" class="btn btn-medium btn-primary btn-large" onClick="addnewdoctor();" style="float:left;">Save</a>
</td></tr>
</table>

		

