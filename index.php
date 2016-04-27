
<?php include_once 'includes/head.php';?>
    <body>
        <div class="wrapper">

            

            <?php include_once 'includes/nav.php';?>
           
           <div class="login-div">
               <div class="modal-header">
                   <h3>Login</h3>
               </div>
               
               <div class="body">
                   <div id="login_status" style="width:94%"></div>
                  
                   <div style="width:223px;padding-top:10px; margin:auto;">
                       <!--- Check Session Is Set Or Not -->
                       <?php if(!isset($_SESSION['doc_id']) && empty($_SESSION['doc_id'])):?>
                       <form method="post">
                          
                           <fieldset>
                               
                               <label>Username :</label>
                               <input type="text" name="username" id="username" />
                               
                               <label>Password :</label>
                               <input type="password" name="password" id="password" />
                               
                               <table border="0">
                                   <td><a href="javascript:void(0);" class="vpb_general_button btn btn-primary" style="float: left;" onclick="doLogin();">Login</a></td>
                               </table>
                           </fieldset>
                       </form> <!--login forms-->
                       <?php else:  echo header("Location:dashboard.php"); endif;?>
                   </div>
               </div> <!-- body -->
               
               <div class="modal-footer"></div> 
              
           </div> 
           <div class="clear">&nbsp;</div>
           
          
           
       </div>
    </body>
</html>
