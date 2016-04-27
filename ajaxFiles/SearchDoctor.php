<?php

include_once '../includes/dbConn.php';
if(isset($_POST)){
    $q = $_POST['searchword']; // Initialize Ajax Variable
    $searchQuery = "SELECT * FROM ".$prev."doctor WHERE `fname` LIKE '$q%' OR `lname` LIKE '$q%' OR `d_id` LIKE '$q%'"; //search query
    $searchQueryResult = mysql_query($searchQuery);
    $items = 0; //set item to zero
    
}

?>


<table border="1" bordercolor="#999999" style="width:905px; margin:auto;">
    
   
    <?php 
    //Fetch Serach Result From Database
    while($getSearchResult = mysql_fetch_array($searchQueryResult)){
        $j="<a href='?borrowBooks&studentid=$row[studentid]' class='a'>";
        $items ++;
        $d_id = $getSearchResult['d_id']; // Get Doctor ID
        $fname = $getSearchResult['fname']; // Get Firstname
        $lname = $getSearchResult['lname']; //Get Last Name
        $mi = $getSearchResult['mi']; //Get Middle name
        $gender = $getSearchResult['gender'];
        
        // Reaplce Variable Set Here
        $replaced_id = ''.$q.''; // Replace Doctor ID By Search Keyword(Search Box)
        $replacefname = ''.$q.''; // Replace Firstnmae By $q
        $replacelname = ''.$q.''; // Replace Last Name By $q
        $replacemi = ''.$q.''; //Replace Middle Name By $q
        $replacegender = ''.$q.''; //Replace Gender By $q
        
        
        //Find All Variables And Replace By Declared Variables
        $findd_id = str_ireplace($q, $replaced_id, $d_id); //Replaced By Replaced Doctor ID
        $findfname = str_ireplace($q, $replacefname, $fname); //Replaced By Replaced Doctor FNAME
        $findlname = str_ireplace($q, $replacelname, $lname); //Replaced By Replaced Doctor LNAME
        $findmi = str_ireplace($q, $replacemi, $mi); //Replaced By Replaced Doctor Middle Name
        $findgender = str_ireplace($q, $replacegender, $gender); //Replaced By Replaced Doctor Gender
        $findFullName = $findfname.'&nbsp'.$findlname;
        
        //Check if Male Or Not
        if($getSearchResult['gender'] == "Male"){
            $stat = "Dr.";
        }else{
            $stat ="Dra.";
        }
        
    ?>
    <tr class="hr" bgcolor="" height="37">
        <td align="left" style="width:149px;"><?php echo $findd_id?></td>
        <td align="left" style="width:387px;"><?php echo $stat.ucwords($findFullName)?></td>
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
            <a href="#" id="<?php echo $rs['d_id']; ?>" class="delbutton btn btn-danger" title="Click To Delete"><i class="icon-trash icon-white"></i>&nbsp;Delete</a>
        </td>
        
    </tr>
    <?php }?>
</table>

<?php if($items == 0){?>
    <div style=" text-align:center; margin-left:263px; width:119px; color:#F00; font-size:12px; font-family:Verdana, Geneva, sans-serif; margin-top:-20px;">Search Not Found</div>
    <?php }?>



<!------ DELETE SCRIPT START ------->


<!------ DELETE SCRIPT END --------->