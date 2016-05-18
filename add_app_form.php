
 <script type="text/javascript" src="<?php echo $vpath?>js/jquery.form.js"></script>
 <script type="text/javascript" src="<?php echo $vpath?>js/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo $vpath?>myScript/add_app_form.js"></script>
 <link href="css/warningCss.css" rel="stylesheet" type="text/css"/>


<?php
include_once 'includes/dbConn.php';
if(isset($_GET['d_id'])){
    $DoctorID = $_GET['d_id'];
    $getDoctorInfo = mysql_query("SELECT * FROM ".$prev."doctor WHERE `d_id` = '$DoctorID'");
    $doctorResultShow = mysql_fetch_array($getDoctorInfo);
    
        $stat = "Dr.";
    
    $doctorFullName = $doctorResultShow['fname'].'&nbsp;'.$doctorResultShow['lname'];

    
    if(isset($_GET['p_id'])){ 
        $sql = "select * from  ".$prev."patient where p_id='".$_GET['p_id']."'";
        $rsd = mysql_query($sql)or die(mysql_error());
        $pet = mysql_fetch_array($rsd);
        $patientFullname = $pet['fname'].'&nbsp;'.$pet['lname'];
    }
    
    
    
?>


<!------ Script And Style ----->



 <div id="app_status"></div>

 <h4 style="margin-left:22px;">Add Appointment Process</h4>

 
 <div class="navbar" style="width:916px; margin-left:22px;">
     <div class="navbar-inner">
         <div class="container">
             <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
             </a>
             <div class="nav-collapse">
                 <ul class="nav">
                     <table border="0" style="width:870px; margin-top:20px; margin-bottom:20px;">
                         <tr>
                             <td>
                                 <li class="brand">Selected Doctor</li></td><td>  
                                 <li class="brand">Selected Patient</li>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class="navbar-form pull-left">
                                 <input class="search span4" type="text" value="<?php echo $doctorFullName; ?>" id="searchbox" placeholder="" readonly>
                                 <a href="?add_app_form&d_id=<?php echo $doctorResultShow['d_id']; ?>&choose_doctor&p_id=<?php echo $pet['p_id']?>" class="btn ">Change</a>
                             </td>
                             
                             <td  class="navbar-form ">
                                 <input  type="text" class="search span4 pull-left" value="<?php echo $patientFullname?>" id="searchbox" placeholder="">
                                 <a href="?add_app_form&d_id=<?php echo $doctorResultShow['d_id']; ?>&choose_patient" class="btn">Choose</a>
                             </td>
                             
                             
                         </tr>
                         
                         <tr>
                             <td> <li class="brand">Time</li></td>
                             <td> <li class="brand">Date</li></td>
                         </tr>
                         
                         <tr>
                             <td>
                                 <select name="time" id="time" onchange='return timeSchedvalue(this.value)'>
                                     <option id="time">Select Time</option>
                                     <?php 
                                     for($i=0; $i<=2860; $i+=30){
                                         
                                         $time1 = date('h:i a', mktime(date('H:i:s'), $i, 0, 0, 0, 0));
                                         $time2 = date('h:i a', mktime(date('H:i:s'), $i+30, 0, 0, 0, 0));
                                         $time3 = date('h:i:s', mktime(date('H:i:s'), $i+30, 0, 0, 0, 0));
                                         echo "<option value='" .$time3 . "'>".$time2 . "</option>";
                                     }
                                     ?>
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
                                     <?php 
                                     for($x=1;$x<32;$x++){
                                         echo '<option value="'.$x.'">'.$x.'</option>';
                                     }
                                    ?>
                                 </select>
                                 
                                 <select class="input-small" name="yy" id="yy" style="width:80px;">
                                     <option>YY</option>
                                     <?php 
                                     for($x=1950;$x<2020;$x++){
                                        echo '<option value="'.$x.'">'.$x.'</option>';
                                     }
                                     ?>
                                 </select>
                             </td>
                             
                         </tr>
                         
                         <tr>
                             <td>
                                 <li class="brand">Consultation</li>
                             </td>
                         </tr>
                         
                         <tr>
                             <td>
                                 <input name="p_id" id="p_id" value="<?php echo $_GET['p_id']; ?>"  type="hidden" class="search span4 pull-left">
                                 <input name="d_id" id="d_id"  value="<?php echo $_GET['d_id']; ?>" type="hidden" class="search span4 pull-left">
                                 <input name="encoder" id="encoder"  type="text" class="search span4 pull-left" placeholder=""></td>
                             </td>
                         </tr>
                         
                     </table>
                 </ul>
             </div><!-- /.nav-collapse -->
         </div><!-- /.container -->
     </div><!-- /.navbar-inner -->
 </div><!-- /.navbar -->
 
 
 
 <div class="container">
     <div class="well well-large">
         <table style="height:50px;">
             <tr>
                 <td>
                     <a href="javascript:void(0);" class="btn btn-large" onClick="save_app();">SAVE</a>
                 
                 </td>
             </tr>
         </table>
     </div>
 </div>
 
 <?php } ?>

 
 <?php if(isset($_GET['choose_patient'])){ ?>
 
 
    <script>
        $(document).ready(function(){
            $("#suc").fadeIn("fast");
        });
         $(document).ready(function(){
          $("#close").click(function(){
            $("#success").fadeOut("fast");
                window.location='?add_app_form&d_id=<?php echo $doctorResultShow['d_id']; ?>';
          });
        });
    </script>



<div class="container" id="suc" style="z-index:10000; position:absolute;margin-top:-491px;display:none;">
    <div class="divpop">
        <div class="modal-header">
            <a id="close" class="close">×</a>
            <h3>Choose Patient</h3>
        </div>
        
        <div class="navbar " style="width:815px; margin-left:1px;">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Patient</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="active"><a href="#"><i class="icon-home icon-black"></i> All Patient</a></li>
                            <li>&nbsp;</li>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
        
        <div class="div_view">
            <table border="1" bordercolor="#999999" style="width:600px; margin:auto;">
                <tr bgcolor="#CCCCCC" height="37">
                    <td align="left">Patient ID</td>
                    <td align="left">Full Name</td>
                    <td  align="center"><i class="icon-remove icon-black"></i>&nbsp;Select</td>
                </tr>
                
                <?php 
                    if(isset($_GET['choose_patient'])){ 
                    $sql = "select * from  ".$prev."patient ORDER BY `p_id` ASC";
                    $rsd = mysql_query($sql)or die(mysql_error());
                    while($details = mysql_fetch_array($rsd)){
                        $pFullName = $details['fname'].'&nbsp;'.$details['lname'];
                ?>
                <tr class="hr" bgcolor="" height="37">
                    <td align="left" width="20"><?php echo $details['p_id']?></td>
                    <td align="left" width="40"><?php echo $pFullName ?></td>
                    <td align="center" width="80">
                        <a href="?add_app_form&d_id=<?php echo $doctorResultShow['d_id']; ?>&p_id=<?php echo $details['p_id'];
  ?>" class="delbutton btn btn-danger" title="Click To Delete"><i class="icon-plus icon-white"></i>&nbsp;Add</a>
                    </td>
                </tr>
                    <?php }?>
            </table>
        </div><!-- end of div view--->
        
        <div class="modal-footer">
            <table style="">
                <td>
                    <td><a href="?add_app_form&d_id=<?php echo $doctorResultShow['d_id']; ?>	" class="btn"><i class="icon-remove icon-black"></i>&nbsp;Close</a></td>
                </td>
            </table>
        </div>
    </div><!---end of div pop--->
</div><!--- end of container -->
<?php }?>
<?php } ?>
<?php if(isset($_GET['choose_patient'])){ ?><div id="as" class="modal-backdrop fade in" ></div><?php }?>


  
  
   <?php if(isset($_GET['choose_doctor'])){ ?>
 
 
    <script>
        $(document).ready(function(){
            $("#suc").fadeIn("fast");
        });
         $(document).ready(function(){
          $("#close").click(function(){
            $("#success").fadeOut("fast");
                window.location='?add_app_form&d_id=<?php echo $doctorResultShow['d_id']; ?>';
          });
        });
    </script>



<div class="container" id="suc" style="z-index:10000; position:absolute;margin-top:-491px;display:none;">
    <div class="divpop">
        <div class="modal-header">
            <a id="close" class="close">×</a>
            <h3>Choose Doctor</h3>
        </div>
        
        <div class="navbar " style="width:815px; margin-left:1px;">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Doctor</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="active"><a href="#"><i class="icon-home icon-black"></i> All Patient</a></li>
                            <li>&nbsp;</li>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
        
        <div class="div_view">
            <table border="1" bordercolor="#999999" style="width:600px; margin:auto;">
                <tr bgcolor="#CCCCCC" height="37">
                    <td align="left">Doctor ID</td>
                    <td align="left">Full Name</td>
                    <td  align="center"><i class="icon-remove icon-black"></i>&nbsp;Select</td>
                </tr>
                
                <?php 
                    if(isset($_GET['choose_doctor'])){ 
                    $doctorModal = "select * from  ".$prev."doctor ORDER BY `d_id` ASC";
                    $doctorModalResult = mysql_query($doctorModal)or die(mysql_error());
                    while($doctorDetails = mysql_fetch_array($doctorModalResult)){
                        $pFullName = $doctorDetails['fname'].'&nbsp;'.$doctorDetails['lname'];
                ?>
                <tr class="hr" bgcolor="" height="37">
                    <td align="left" width="20"><?php echo $doctorDetails['d_id']?></td>
                    <td align="left" width="40"><?php echo $pFullName ?></td>
                    <td align="center" width="80">
                        <a href="?add_app_form&d_id=<?php echo $doctorDetails['d_id']; ?>&p_id=<?php echo $pet['p_id'];
  ?>" class="delbutton btn btn-danger" title="Select"><i class="icon-plus icon-white"></i>&nbsp;Add</a>
                    </td>
                </tr>
                    <?php }?>
            </table>
        </div><!-- end of div view--->
        
        <div class="modal-footer">
            <table style="">
                <td>
                    <td><a href="?add_app_form&d_id=<?php echo $doctorResultShow['d_id']; ?>	" class="btn"><i class="icon-remove icon-black"></i>&nbsp;Close</a></td>
                </td>
            </table>
        </div>
    </div><!---end of div pop--->
</div><!--- end of container -->
<?php }?>
<?php } ?>
<?php if(isset($_GET['choose_patient'])){ ?><div id="as" class="modal-backdrop fade in" ></div><?php }?>
  
   
 