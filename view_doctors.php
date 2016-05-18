
<!------ Search Script --->
<script type="text/javascript">
 $(document).ready(function(){
    
     $('.search').keyup(function(){
         
         var searchbox = $(this).val();
         var dataString = 'searchword='+searchbox;
         if(searchbox == true){
             $.ajax({
                 type: "POST",
                 url: "ajaxFiles/SearchDoctor.php",
                 data: dataString,
                 cache: false,
                 success: function(h){
                     $('#display').html(h).hide();
                 }
             });
         }else{
             $.ajax({
                 type: "POST",
                 url: "ajaxFiles/SearchDoctor.php",
                 data: dataString,
                 cache: false,
                 success: function(h){
                     $('#display').html(h).show();
                 }
             });
         } return false;
     });
 })
</script>

<!-----  Search Script End --->



<!------ DELETE SCRIPT ------->

<script type="text/javascript">
    $(function(){
        
        $(".delbutton").click(function(){
            //save the link in variable name element
            var element = $(this);
            //Find The ID Click Link
            var d_id = element.attr("id");
            //Build A Url To Send
            var info = 'd_id=' + d_id;
            if(confirm("Are you sure you want to delete this Record?")){
                $.ajax({
                    type: "POST",
                    data: info,
                    url : "ajaxFiles/deleteDoctor.php",
                    success: function(response){
                        $("#deleteStatus").hide().fadeIn('slow').html(response);
                    }
                });
                 $(this).parents(".hr").animate({ backgroundColor: "#fbc7c7" }, "fast")
                         .animate({ opacity: "hide" }, "slow");
                
                 
            }
            return false;
            
        });
    });

</script>





<div class="navbar" style="width:505px; margin-left:22px;">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Doctors</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li>
                        <form class="navbar-form pull-left">
                            <input type="text" class="search span4" id="searchbox" placeholder = "Search By ID,Firstname,Lastname" />
                        </form>
                    </li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->


<div id="deleteStatus"></div>

<div class="divhead">
    <!--==================table for dispalying doctor records====================================-->
    <table border="1" border-color = "#999999" style="width:905px; margin:auto;">
        <tr bgcolor="#CCCCCC" height="37">
            <td align="left" style="width:150px;">Doctors ID</td>
            <td align="left" style="width:388px;">Full Name</td>
            <td align="center" style="width:99px;"><i class="icon-plus icon-black"></i>&nbsp;Add app</td>
            <td align="center" style="width:76px;"><i class="icon-edit icon-black"></i>&nbsp;Edit</td>
            <td align="center" style="width:70px;"><i class="icon-file icon-black"></i>&nbsp;Info</td>
            <td  align="center" style="width:90px;"><i class="icon-remove icon-black"></i>&nbsp;Delete</td>
        </tr>
    </table>
    
</div> <!-- end divhead -->

<div class="div_view">
    <div id="display">
        <table border="1" bordercolor="#999999" style="width:905px; margin:auto;">
            
            <!------ FETCH DOCTORS RECORDS ---->
            <?php 
            include_once 'includes/dbConn.php'; // include database connection
            $getDoctors = "SELECT `d_id`,`fname`,`lname`,`age`,`city`,`mi` FROM ".$prev."doctor ORDER BY `d_id` ASC";
            $getResult = mysql_query($getDoctors);
            $countDoctors = mysql_num_rows($getResult); // count doctors record
            if($countDoctors > 0): //check doctors record available or not
            while($docRecords = mysql_fetch_array($getResult)) :
                $fullname = $docRecords['fname'].'&nbsp;'.$docRecords['lname'];
                $age = $docRecords['age'];
                $city = $docRecords['city'];
                $doc_id = $docRecords['d_id'];
                
                // Check Dr Or Dra
                if($docRecords['gender'] == "Male"){
                    $docStatus = "Dr.";
                }else{
                    $docStatus = "Dra.";
                }
            ?>
            
            
            <tr class="hr" bgcolor="" height="37">
                <td align="left" width="150"><?php echo $docRecords['d_id']?></td>
                <td align="left" width="386"><?php echo $docStatus.'&nbsp;'.ucwords($fullname);?>,<?php echo $age?>,<?php echo $city?></td>
                <td align="center" style="width:99px;">
                    <a href="?add_app_form&d_id=<?php echo $docRecords['d_id'];?>" class="btn"><i class="icon-plus icon-black"></i>&nbsp;Add App</a>
                </td>
                <td align="center" width="75">
                    <a href="?view_doctors&details&d_id=<?php  echo $docRecords['d_id'];?>&edit_doc_record" class="btn"><i class="icon-edit icon-black"></i>&nbsp;Edit</a>
                </td>
                <td align="center" width="70">
                     <a href="?view_doctors&details&d_id=<?php echo $docRecords['d_id'];?>" class="btn btn-info"><i class="icon-file icon-white"></i>&nbsp;Info</a>
                </td>
                <td align="center" width="90">
                    <a href="javascript:void(0);" id="<?php echo $docRecords['d_id']; ?>" class="delbutton btn btn-danger" title="Click To Delete"><i class="icon-trash icon-white"></i>&nbsp;Delete</a>
                </td>
            </tr>
           <?php endwhile ?>
           <?php else:?>
            <tr><td colspan="6" align="center">No Records Found</td></tr>
           <?php endif; ?>
        </table>
    </div> <!--- div display end -->
</div> <!-- div view end --->

<!--==================table for dispalying doctor records END====================================-->

<?php 
if(isset($_GET['details'])){
?>

<script>
    $(document).ready(function(){
        $('#success').fadeIn('fast');
    });
    
    $(document).ready(function(){
        $('#close').click(function(){
            $('#success').fadeOut('fast');
            windows.location = "?view_doctor";
        })
    })

</script>

<?php }?>




<!------- Modal Popup Start ------>

<div class="container" id="success" style=" z-index:10000; position:absolute;margin-top:-517px;display:none;">
    
    
    <?php 
    if(isset($_GET['d_id'])){
        $doc_id = $_GET['d_id'];
        $modalDoctorInfo = "SELECT *FROM ".$prev."doctor WHERE `d_id` = '$doc_id' ORDER BY `d_id` ASC";
        $modalDoctorResult = mysql_query($modalDoctorInfo);
        $modalDoctorInfoShow = mysql_fetch_array($modalDoctorResult);
        if($modalDoctorInfoShow['gender'] == "Male"){
            $prefix = "Dr.";
        }else{
            $prefix = "Dra";
        }
        
        $fullName = $modalDoctorInfoShow['fname'].$modalDoctorInfoShow['lname'];
    
    
    ?>
    
    
    <div class="divpop">
        
        <div class="navbar" style="width:815px; margin-left:1px;">
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
                             <li><a href="?view_doctors&details&d_id=<?php  echo $_GET['d_id'];?>"><i class="icon-home icon-black"></i> Profile</a></li>
                             <li>&nbsp;</li>
                             <li><a href="?view_doctors&details&d_id=<?php  echo $_GET['d_id'];?>&view_doc_record"><i class="icon-list icon-black"></i>&nbsp;Patients Records</a></li>
                             <li><a href="?view_doctors&details&d_id=<?php  echo $_GET['d_id'];?>&edit_doc_record"><i class="icon-edit icon-black"></i>&nbsp;Edit Information</a></li>
                         </ul>
                         
                         
                     </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
        
        
        <?php 
        if(isset($_GET['view_doc_record'])){
            include('view_doc_record.php'); //Include View Docrecord
        }elseif(isset($_GET['edit_doc_record'])){
            include('edit_doc_record.php'); //Edit Doc Record Include
        }else{
        
        ?>
        
        
        
        <table border="0" style="font-size:15px; height:300px; width:400px; margin-left:20px; margin-bottom:20px;">
            <tr>
                <tr><td>Doctors ID<td>:</td></td><td><?php echo $modalDoctorInfoShow['d_id'];?></td></tr>
                <tr><td>Full Name<td>:</td></td><td><?php echo $prefix.  ucwords($fullName);?></td></tr>
                <tr><td>Age<td>:</td></td><td><?php  echo $modalDoctorInfoShow['age'];?></td></tr>
                <tr><td>Gender<td>:</td></td><td><?php  echo $modalDoctorInfoShow['gender'];?></td></tr>
                <tr><td>Status</td><td>:<td><?php  echo $modalDoctorInfoShow['status'];?></td></tr>
                <tr><td>BirthDate<td>:</td></td><td><?php  echo $modalDoctorInfoShow['bdate'];?></td></tr>
                <tr><td>House No., Baraggay<td>:</td></td><td><?php  echo $modalDoctorInfoShow['brgy'];?></td></tr>
                <tr><td>City/Municipality<td>:</td></td><td><?php  echo $modalDoctorInfoShow['city'];?></td></tr>
                <tr><td>Province<td>:</td></td><td><?php  echo $modalDoctorInfoShow['prov'];?></td></tr>
                <tr><td>Date Register<td>:</td></td><td><?php  echo $modalDoctorInfoShow['datead'];?></td></tr>
                <tr><td>Remarks<td>:</td></td><td><?php  echo $modalDoctorInfoShow['remark'];?></td></tr>
            </tr>
        </table>
        <?php }?>
        <div class="modal-footer">
            <table style="">
                <td><td><a href="?view_doctors" class="btn"><i class="icon-remove icon-black"></i>&nbsp;Close</a></td>
            </table>
        </div>
        
    </div> <!-- div pop end --->
    <?php }?>
</div>
<?php if(isset($_GET['details'])){ ?><div id="as" class="modal-backdrop fade in" ></div><?php }?>

<!-------- Modal Popup End --->



