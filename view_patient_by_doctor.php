 <div class="navbar" style="width:900px; margin-left:22px;">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">Select Doctor</a>
      <div class="nav-collapse">
        <ul class="nav">
        
          <li>
          <script>
		function doc(d_id){
			window.location="?view_patient_by_doctor&d_id="+d_id;
			
			}
		  </script>
                  <form class="navbar-form pull-left">
      <select onChange="doc(this.value);" class="span5">
      <option value="00">Select Doctor | Pysician</option>
      <?php
      
    $sql1 = "select * from  ".$prev."doctor";
    $res = mysql_query($sql1)or die(mysql_error());
    while($doc = mysql_fetch_array($res)) { 
    if($doc['gender']=='Male'){
	$m='Dr.';
	}elseif($doc['gender']=='Female'){
	$m='Dra.';
	} ?>
	    <option <?php if($_GET['d_id']==$doc['d_id']){ echo "selected";} ?> value="<?php echo $doc['d_id']; ?>"><?php echo $m."&nbsp;".$doc['lname']."&nbsp;".","."&nbsp;".$doc['fname']."&nbsp;".$doc['mi'];?></option>
	<?php
}
?>

      </select>
       
        </form> 
    
      
        </li>
     
 
    
        
        </ul>
       
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->

 <?php
if(isset($_GET['d_id'])){
$d_id=$_GET['d_id'];
	$s = "Select * from ".$prev."doctor where d_id='".$_GET['d_id']."'";
        $d = mysql_query($s)or die(mysql_error());
        $r=mysql_fetch_array($d); 
        if($r['gender']=='Male'){
                $m='Dr.';
	}elseif($r['gender']=='Female'){
                $m='Dra.';
	} 
	?>
  <div id="print" >  
<table border="0" style="width:905px; font-size:15px; font-weight:bold; margin:auto; margin-bottom:20px;">

<tr  height="37">
<td align="left" style="width:150px;">Doctor's ID</td><td><?php echo $r['d_id']; ?>		</td>
</tr>
<tr  height="37">
<td align="left" style="width:150px;">Doctor's Name</td><td><?php echo $m."&nbsp;".$r['lname']."&nbsp;".","."&nbsp;".$r['fname']."&nbsp;".$r['mi']; ?>		</td>
</tr></table>

    <?php }  ?>
    
    <script>
 function Openpen(d_id, pageURL, title,w,h) {
	     //alert("Pardeep")
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
      var targetWin =  window.open('http://localhost/patientinfosystem/print_prev.php?d_id=' + d_id, 'name', 'location=no,menubar=no,wiscrollbars=no,resizable=no,fullscreen=no,width='+w+', height='+h+', top='+top+', left='+left);
        return false;
    }
	

</script>

    
    
<table border="1" bordercolor="#999999" style="width:905px; margin:auto; margin-bottom:20px;">

<tr bgcolor="#CCCCCC" height="37">
<td align="left" style="width:150px;">Patient ID</td>
<td align="left" style="width:200px;">Full Name</td>
<td align="left" style="width:100px;">Address</td>
<td align="center" style="width:99px;"><i class="icon-plus icon-black"></i>&nbsp;Gender</td>
<td align="center" style="width:150px;"><i class="icon-calendar icon-black"></i>&nbsp;Date Added</td>

</tr>


<?php
if(isset($_GET['d_id']))
{
	$d_id=$_GET['d_id'];
	
	$sql = "Select * from ".$prev."app where d_id='".$d_id."'";
        $rsd = mysql_query($sql)or die(mysql_error());
        $result=mysql_num_rows($rsd);
        if($result==0){ ?>
        <div class="alert alert-danger fade in" style="width:850px; margin:auto; margin-bottom:20px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>ERROR!</h4>
				No record Found!
        </div>
<?php	}
function data($rs){
	$d=$rs;
	return $d;}
        while($rs = mysql_fetch_array($rsd)) { 

        $sql1pet = "select * from  ".$prev."patient where p_id='".$rs['p_id']."'";
        $ress = mysql_query($sql1pet)or die(mysql_error());
        $pet_det = mysql_fetch_array($ress);
?>

    <tr class="hr" bgcolor="" height="37">
        <td align="left" width="150"><?php echo $rs['p_id'];?></td>
        <td align="left" width="386"><?php echo $pet_det['lname']."&nbsp;".","."&nbsp;".$pet_det['fname']."&nbsp;".$pet_det['mi'];?></td>
        <td align="center" width="100"><?php echo $pet_det['brgy']."&nbsp;".$pet_det['city']."&nbsp;".$pet_det['prov'];?></td>
        <td align="center" width="100"><?php echo $pet_det['gender'];?></td>
        <td align="center" width="150"><?php echo date_format(date_create(date($pet_det['datead'])), 'F j, Y'); ?></td>

    </tr>
<?php }}?>

</table>
