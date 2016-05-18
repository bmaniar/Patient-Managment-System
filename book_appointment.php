
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

    <table border="1" border-color = "#999999" style="width:905px; margin:auto;">
        <tr bgcolor="#CCCCCC" height="37">
            <td align="left" style="width:150px;">Doctors ID</td>
            <td align="left" style="width:388px;">Full Name</td>
            <td align="center" style="width:99px;"><i class="icon-plus icon-black"></i>&nbsp;Add app</td>
           
        </tr>
    </table>
    
</div> <!-- end divhead -->

<div class="div_view">
    <div id="display">
        <table border="1" bordercolor="#999999" style="width:905px; margin:auto;">
            
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
                $docStatus = "Dr.";
               
            ?>
            
            
            <tr class="hr" bgcolor="" height="37">
                <td align="left" width="150"><?php echo $docRecords['d_id']?></td>
                <td align="left" width="386"><?php echo $docStatus.'&nbsp;'.ucwords($fullname);?>,<?php echo $age?>,<?php echo $city?></td>
                <td align="center" style="width:99px;">
                    <a href="?add_app_form&d_id=<?php echo $docRecords['d_id'];?>" class="btn btn-primary"><i class="icon-plus icon-black"></i>&nbsp;Add App</a>
                </td>
               </tr>
           <?php endwhile ?>
           <?php else:?>
            <tr><td colspan="6" align="center">No Records Found</td></tr>
           <?php endif; ?>
        </table>
    </div> <!--- div display end -->
</div> <!-- div view end --->


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




