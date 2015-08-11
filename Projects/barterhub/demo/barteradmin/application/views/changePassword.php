<?php include("header_in.php") ?>
<style type="text/css">
	.bottom
    {
        border: 1px solid #000;
        width: 100%;
    }
    .error{
		color:red;
	}
	.errorcls{
		  font-weight: bold;
		  font-size: 14px;
		  margin: 10px 32px;
		  color: #FF4C4C;
	}
</style>
<script src="<?php echo base_url(); ?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>scripts/validation.js"></script>
<div class="wrapper">
<div class="container">
<div class="row">
    <div class="span12">
    	<div class="content">
            <div class="module">
            	<div class="module-head">
                    <h3>Change password</h3>
                </div>
                <?php
                

                echo "<div class='control-group errorcls'>".validation_errors()."</div>";
                
                if(isset($message)){
                ?>    
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <strong><?php echo $message; ?></strong>
                </div>
                <?php } ?>
            	<form method="post" id="changePass" class="errormessage" name="changePass" action="<?php echo base_url(); ?>account/changepassword">
				<div class="control-group" style="margin:20px 30px;">
						<div class="controls" style="margin:20px 0px;">
						<input type="text" id="currentpassword" placeholder="Current password" name="currentpassword" class="span4">
						</div>
						<div class="controls" style="margin:20px 0px;">
						<input type="password" id="newpassword" placeholder="new password" name="newpassword" class="span4">
						</div>
						<div class="controls" style="margin:20px 0px;">
						<input type="password" id="confirmpassword" placeholder="confirm new password" name="confirmpassword" class="span4">
						</div>
						<div class="controls">
						<button type="submit" class="btn btn-danger" name="submitChange" style="width:100px;">Change</button>
						
					   </div>
				</div> 
				</form> 
            </div>
        </div> <!--/.content-->
      </div> <!--/ span-12-->
    </div> <!--/.row 9-->
</div><!--/.container-->

</div><!--/.wrapper-->