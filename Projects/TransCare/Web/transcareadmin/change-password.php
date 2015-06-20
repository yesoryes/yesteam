<?php
include('admin-header.php');
include('admin-menu.php');
?>
        

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Change Password</h1>
                    
<?php
if($query || $updatestore)
{ 
?>                      
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php echo $msg;?>
</div>
<?php
}
?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
             <div class="row cusmbottom">
                
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Change Password

                       </div>
                       

                        <div class="panel-body">
                            <div class="row">
                             <div class="col-lg-12">
  <?php                             
 if(isset($_SESSION['useredit'])){
   unset($_SESSION['useredit']);
   
   echo "<h1>User Account Edit Success!</h1>";
   echo "<p><b>$session->username</b>, your account has been successfully updated. "
       ."<a href=\"index.php\">Main</a>.</p>";
}
else{ 
?>                              
 <h1>User Account Edit : <?php echo $session->username; ?></h1>                       
                           
                <form role="form" method="post" action="process.php">
                
                <div class="form-group">
                <label>Current Password</label>
                <input class="form-control"  type="password" name="curpass" maxlength="30" value="<?php echo $form->value("curpass"); ?>" required="required"><br /><?php echo $form->error("curpass"); ?>
                </div>
                
                 <div class="form-group">
                <label>New Password</label>
                <input class="form-control"  type="password" name="newpass" maxlength="30" value="
<?php echo $form->value("newpass"); ?>" required="required"><br />
<?php echo $form->error("newpass"); ?>
                </div>
                
                 <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" maxlength="50" value="
<?php
if($form->value("email") == ""){
   echo $session->userinfo['email'];
}else{
   echo $form->value("email");
}
?>" required="required"><br /><?php echo $form->error("email"); ?>
                </div>
                
    <input type="hidden" name="subedit" value="1">           
                <input type="submit" name="add" class="btn btn-primary" value="Update">
                </form>
              
<?php
}
?>
                
                                </div>
                              
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        



<?php
include('admin-footer.php');

?>   