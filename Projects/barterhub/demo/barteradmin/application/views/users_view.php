<?php 
    include("header_in.php");
?>
<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="content">
				<form method="post" action="<?php echo base_url(); ?>users/disableUser">
					<div class="module" style="padding-bottom: 20px;">
						<div class="module-head" style="margin-bottom: 20px;">
                            <h3>User</h3>
                        </div>
                        <?php if($this->session->flashdata('flashSuccess')):?>
         
				        <div class="alert alert-success alert-dismissible fadeoutthis" role="alert">
				          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				          <strong><?=$this->session->flashdata('flashSuccess')?></strong>
				        </div>
				          
				        <?php endif ?>
                        
                        <div id="disableSuccess" style="color:green; font-size: 20px; text-align: center;"></div>
                        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
							<thead>
								<tr>
									<th></th>
									<th>S.No</th>
									<th>User Id</th>
									<th>User Name</th>
									<th>Mobile</th>
									<th>Email</th>
									<th>Last Login</th>
									<th>No of Sell</th>
									<th>No of Buy</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach($users as $use){ ?>
						  		<tr>
								  <td><input type="checkbox" class="showboth" id="all" name="all[]" data-email="<?php echo $use->email ?>" value="<?php echo $use->user_id; ?>" /></td>
							       <td><?php echo $i; ?></td>
							       <td><?php echo $use->user_id; ?></td>
							       <td><a href="<?php echo base_url(); ?>users/getdetails/<?php echo $use->user_id; ?>"><?php echo $use->username ?></a></td>
							       <td><?php echo $use->mobile ?></td>
							       <td><?php echo $use->email ?></td>
							       <td><?php echo $use->last_login ?>(GMT+05.30(IST))</td>
							       <td><?php echo $use->no_of_sell ?></td>
							       <td><?php echo $use->no_of_buy ?></td>
							       <?php if($use->status == 1){ ?>
							       <td><?php echo "Active"; ?></td>
							       <?php }else{
							       	?>
							       	<td><?php echo "Disable"; ?></td>
							       	<?php 
							       	} ?>
								</tr>
							<?php 
							$i++;
							} ?>
							</tbody>
						</table>
						<div class="control-group clearfix">
							<div class="control">
								<label class="checkbox  span1" style="margin:15px;"><input type="checkbox" id="selectall" class="text-center" onclick="selectAll(this)" />Select all</label>
								<a href="javascript:void(0)" class="btn btn-danger span1" data-toggle="modal" onclick="disableFunction();" style="width:100px; margin:15px;">Disable</a>
								<a href="#Modal1" onclick="sendMessageFunction();" class="btn btn-danger span1" data-toggle="modal" style="width:110px; margin:15px;">SendMessage</a>
								
							</div>
							<div class="control" style="clear: both;">
								<p style="color: red;margin-left: 10px;">Please select any user before click this button.</p>
							</div>
						</div>
					</div>
					</form>
					<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					   <form method="post" action="<?php echo base_url(); ?>users/sendMessage">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="exampleModalLabel">Send message</h4>
					      </div>
					      <div class="modal-body">
					       
					          <div class="form-group">
					          <input type="hidden" id="saveId" name="saveId">
					          <input type="hidden" id="saveEmail" name="saveEmail">
					            <input type="text" class="form-control" id="recipient-name" placeholder="Message title" name="subject">
					          </div>
					          <div class="form-group">
					           <textarea class="span4" id="message-text" placeholder="Type your message here" name="description"></textarea>
					       						
						    </div>
						   <div class="form-group" id="appendText"></div>
					          </div>
					        
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					        <button type="submit" class="btn btn-primary" onclick="sendMessage();">Send</button>
					      </div>
					    </div>
					     </form>
					  </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script language="JavaScript"> 
function selectAll(source) 
{ 
checkboxes = document.getElementsByName('all[]'); 
for(var i in checkboxes) 
checkboxes[i].checked = source.checked; 
} 

function disableFunction(){
	var cids='';
	var email='';
		$('.showboth').each(function(index, element) {
			
		if($(this).prop("checked")==true)
		{
			
			 cids +=$(this).val() + ',';
			 email +=$(this).attr('data-email') + ',';
		}
			
});
	
if(cids=='')
{

alert("Please select any user");

}else{
	$.confirm({
    title: 'Confirm!',
    content: 'Are you sure want to disable this users?',
    confirm: function () {
       var dataString = 'cids='+ cids +'&email='+ email;
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>users/disableUser/",
            data: dataString,
            cache: false,
            success: function (mresp) {
               $("#disableSuccess").html(mresp);
	   
            }
        }); 
    }
});
}



}

function sendMessageFunction(){
	//alert("i am running");
	var cids='';
	var email='';
		$('.showboth').each(function(index, element) {
			
		if($(this).prop("checked")==true)
		{
			
			 cids +=$(this).val() + ',';
			 email +=$(this).attr('data-email') + ',';
		}
			
});

		if(cids == ''){
			$('#appendText').html("<p style='color: red;margin-left: 10px;'>Please select user by closing this popup.</p>");
		}else{
			$('#saveId').val(cids);
			$('#saveEmail').val(email);
		}
}

// function sendMessage(){

// 	var id = $('saveId').val();
// 	var email = $('saveEmail').val();
// 	alert(email);

// 	var dataString = 'id='+ id +'&email='+ email;
//         $.ajax({
//             type: "POST",
//             url: "<?=base_url();?>users/sendMessage",
//             data: dataString,
//             cache: false,
//             success: function (mresp) {
//             	alert(mresp);
//                //$("#disableSuccess").html(mresp);
	   
//             }
//         }); 
// }
$(document).ready(function(){
	setTimeout(function(){ 
		$('#alertstatus').fadeOut(4000);
	 }, 3000);
});
</script>
<?php 
    include("footer_in.php");
?>