<?php 
    include("header_in.php");
?>
<style type="text/css">
    .userColor{
          padding: 5px;
          border: 1px solid rgb(68, 153, 238);
          background-color: rgb(68, 153, 238);
          float: left;
          margin-top: 4px;
          margin-right: 5px;
    }
    .productColor{
        padding: 5px;
          border: 1px solid rgb(255, 44, 44);
          background-color: rgb(255, 44, 44);
          float: left;
          margin-top: 4px;
          margin-right: 5px;
    }
     .soldProduct{
        padding: 5px;
          border: 1px solid rgb(60, 188, 141);
          background-color: rgb(60, 188, 141);
          float: left;
          margin-top: 4px;
          margin-right: 5px;
    }
</style>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="content">
                	 <div class="module">
                        <div class="module-head">
                            <h3>App Supported Location</h3>
                        </div>
                          <div class="module-body table">
                  		<table class="table table-bordered">
						  <thead>
							<tr>
							  <th>No</th>
							  <th>State</th>
							  <th>City</th>
                              <th>Country</th>
							  <th>Site Enable on</th>
                              <th>Pincode</th>
							  <th>Status</th>
							</tr>
						  </thead>
						  <tbody>
                          <?php 
                          $i=1;
                          foreach($location as $loc){ ?>
							<tr>
							  <td><?php echo $i; ?></td>
							  <td><?php echo getState($loc->state); ?></td>
							  <td><?php echo $loc->city; ?></td>
                              <td><?php echo getCountry($loc->country_id); ?></td>
							  <td><?php echo date('d M Y', strtotime($loc->site_enable)); ?></td>
							  <td><?php echo $loc->pincode; ?></td>
                              <?php if($loc->status == 'enable'){ ?>
                              <td><button type="button" class="btn btn-danger" style="width:100px;" onclick="changeStatus(1,<?php echo $loc->el_id; ?>);"><abbr style="cursor: pointer;  border-bottom: 0;" title="click to disable">Disable</abbr></button></td>
                              <?php }else{ ?>
                              <td><button type="button" class="btn btn-success" style="width:100px;" onclick="changeStatus(2,<?php echo $loc->el_id; ?>);"><abbr style="cursor: pointer;  border-bottom: 0;" title="click to enable">Enable</abbr></button></td>
                              <?php } ?>
                            </tr>
                            <?php 
                            $i++;
                            } ?>
						 </tbody>
						</table>
						</div>
						</div>
					</div>
                    <div class="module">
                        <div class="module-head">
                            <h3>
                                Profit Chart</h3>
                        </div>
                        <div class="module-body" style="padding-bottom:50px;">
                        <div class="pull-right">
                            <div class="">
                                <span class="userColor"></span>
                                <span>No of Users</span>
                            </div>
                            <div class="">
                                <span class="productColor"></span>
                                <span>No of Product</span>
                            </div>
                            <div class="">
                                <span class="soldProduct"></span>
                                <span>No of sold product</span>
                            </div>
                        </div>
                            <div id="chart">
                              <ul id="numbers">
                                
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li><span>0</span></li>
                              </ul>

                              <ul id="bars">
                                <li><div data-percentage="<?php echo getNoOfUsers(); ?>" class="bar" style="background-color: rgb(68, 153, 238);"></div><span>Users</span></li>
                                <li><div data-percentage="<?php echo getNoOfProduct(); ?>" class="bar" style="background-color: rgb(255, 44, 44);"></div><span>Product</span></li>
                                <li><div data-percentage="<?php echo getNoOfSold(); ?>" class="bar" style="background-color: rgb(60, 188, 141);"></div><span>No. of sold</span></li>
                              </ul>
                            </div>
                        </div>
                    </div>
                    <!--/.module-->
                    <!--<div class="module hide">
                        <div class="module-head">
                            <h3>
                                Adjust Budget Range</h3>
                        </div>
                        <div class="module-body">
                            <div class="form-inline clearfix">
                                <a href="#" class="btn pull-right">Update</a>
                                <label for="amount">
                                    Price range:</label>
                                &nbsp;
                                <input type="text" id="amount" class="input-" />
                            </div>
                            <hr />
                            <div class="slider-range">
                            </div>
                        </div>
                    </div>
                    <div class="module">
                        <div class="module-head">
                            <h3>Add Supported Location</h3>
                        </div>
                        <div class="module-body table">
                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            State
                                        </th>
                                        <th>
                                            City
                                        </th>
                                        <th>
                                           Site Enable on
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Maharastra
                                        </td>
                                        <td>
                                            Mumbai
                                        </td>
                                        <td class="center">
                                            1 july 2015
                                        </td>
                                        <td class="center">
                                           Enable
                                        </td>
                                    </tr>
                             </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            Rendering engine
                                        </th>
                                        <th>
                                            Browser
                                        </th>
                                        <th>
                                            Platform(s)
                                        </th>
                                        <th>
                                            Engine version
                                        </th>
                                        <th>
                                            CSS grade
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>-->
                    <!--/.module-->
                     <div class="content">
                	 <div class="module">
                        <div class="module-head">
                            <h3>Active Users</h3>
                        </div>
                          <div class="module-body table">
                  		<table class="table table-bordered">
						  <thead>
							<tr>
							  <th>No</th>
							  <th>User name</th>
							  <th>Email</th>
							  <th>Mobile</th>
							  <th>No of post</th>
                              <th>Last login</th>
							</tr>
						  </thead>
						  <tbody>
                          <?php 
                          $i = 1;
                          foreach($activeUser as $active){ ?>
							<tr>
							  <td><?php echo $i; ?></td>
							  <td><a href="<?php echo base_url(); ?>users/getdetails/<?php echo $active->user_id; ?>"><?php echo $active->username; ?></a></td>
							  <td><?php echo $active->email; ?></td>
							  <td><?php echo $active->mobile; ?></td>
							  <td><?php echo getTotalPost($active->user_id); ?></td>
                              <td><?php echo date('d M Y', strtotime($active->last_login)); ?></td>
							</tr>
                            <?php 
                            $i++;
                            } ?>
						 </tbody>
						</table>
						</div>
						</div>
					</div>
                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->
        </div>
            </div>
    <script src="<?php echo base_url(); ?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
    //alert("hi");
    $("#bars li .bar").each( function( key, bar ) {
    var percentage = $(this).data('percentage');

    $(this).animate({
    'height' : percentage + 'px'
    }, 1000);
    });
    });
    </script>
<?php 
    include("footer_in.php");
?>