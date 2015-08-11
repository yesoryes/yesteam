<?php include("header.php");

 echo $this->session->userdata('logged_in');
?>
<style type="text/css">
    
    .errorcls {
      color: #ED0909;
      font-size: 11px;
      font-weight: bold;
      margin-top: 3px;
    }

</style>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module module-login span4 offset4">
                    <form class="errormessage form-vertical" id="signin" method="post" name="regformlogin" action="<?php echo base_url();?>account/loginsum">
                        <div class="module-head">
                            <h3>Sign In</h3>
                        </div>
                        <div class="module-body">
                        <?php
                        if($this->input->post('submit') == 'submit'){

                        echo "<div class='control-group errorcls'>".validation_errors()."</div>";   

                        }
                        ?>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="text" id="inputEmail" name="email" placeholder="Username">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" id="inputPassword" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <!-- <button type="submit" class="btn btn-danger pull-right">Login</button> -->
                                    <input type="submit" value="submit" class="btn btn-danger pull-right" name="submit">
                                    <label class="checkbox">
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.wrapper-->
<?php include("footer.php") ?>