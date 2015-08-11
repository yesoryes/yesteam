<?php

class Product_model extends CI_Model{

	function __construct(){
        parent::__construct();
    }

    //Listing product from database
	public function getProduct(){
		$query = $this->db->query("SELECT * FROM `product` ORDER BY post_id DESC");
		return $query->result();
	}
	//Get product from database
	public function productDetails($id){
		$query = $this->db->query("SELECT * FROM `product` WHERE post_id = '$id'");
		return $query->result();
	}
	//Get user details to product page
	public function productUser($id){
		$query = $this->db->query("SELECT * FROM `users` WHERE user_id = '$id'");
		if($query->num_rows() > 0){
			$row = $query->row();
			$html = '
			<div class="module-body">
						<div class="stream-composer media">
							<a href="#" class="media-avatar medium pull-left span2">
								<img src="'.base_url().$row->profile_pics.'">
							</a>
							<div class="media-body span3">
								<p class="med-content"><lable class="m0 span2">First Name</lable>: <lable class="col-md-2">'.$row->firstname.'</lable></p>
								<p class="med-content"><lable class="m0 span2">Last Name</lable>: <lable>'.$row->lastname.'</lable></p>
								<p class="med-content"><lable class="m0 span2">User Name</lable>: <lable>'.$row->username.'</lable> </p>
								<p class="med-content"><lable class="m0 span2">Date of birth</lable>: <lable>'.$row->date_of_birth.'</lable></p>
							</div>
								<div class="media-body span4">
								<p class="med-content"><lable class="m0 span2">Mobile</lable>: <lable>'.$row->mobile.'</lable></p>
								<p class="med-content"><lable class="m0 span2">Email</lable>: <lable>'.$row->email.'</lable></p>
								<p class="med-content"><lable class="m0 span2"> No of sell</lable>: <lable>'.$row->no_of_sell.'</lable></p>
								<p class="med-content"><lable class="m0 span2">No of buy</lable>: <lable>'.$row->no_of_buy.'</lable></p>
							</div>
							<div class="span2">
								<p class="med-content"><lable class="m0 span1">City Name</lable>: <lable>'.$row->city.'</lable></p>
							</div>
					</div>
				</div>
			';
			return $html;
		}
	}

	//Approval coding 
	public function approveItem(){
		$id = $this->input->post('id');
		$query = $this->db->query("UPDATE `product` SET status = 0 WHERE post_id = '$id'");
		if($query){
			return 1;
		}
	}
	//reject the product and change the status to 3
	public function productReject(){
		$id = $this->input->post('itemId');
		$username = $this->input->post('userName');
		$useremail = $this->input->post('userEmail');
		$productname = $this->input->post('productName');
		$mess = $this->input->post('message');

		$query = $this->db->query("UPDATE `product` SET status = 3 WHERE post_id = '$id'");

		if($query){
			$subject = "Product rejected from barterhub";
			$message = $mess;
			//$cover = '$remTrim';
			//echo $cover;
		    return $this->sendEmail($useremail, $subject, $message);
		    
		}

	}

	//search by date from database
	public function searchProduct(){
		$date1 = $this->input->post('dat1');
		$date2 = $this->input->post('dat2');
		$status = $this->input->post('poststatus');
		if($status != "-1" && $date1 == '' && $date2 == ''){
			//echo "SELECT * FROM `product` WHERE DATE(post_date) BETWEEN '".$date1."' AND '".$date2."' OR status = '$status' ";
		$query = $this->db->query("SELECT * FROM `product` WHERE DATE(post_date) BETWEEN '".$date1."' AND '".$date2."' OR status = '$status' ");
		//echo "SELECT * FROM `product` WHERE DATE(post_date) BETWEEN '".$date1."' AND '".$date2."' ";
		}else if($status == "-1" && $date1 != '' && $date2 != ''){
		$query = $this->db->query("SELECT * FROM `product` WHERE DATE(post_date) BETWEEN '".$date1."' AND '".$date2."' OR status = '$status'");	
		}else if($status != "-1" && $date1 != '' && $date2 != ''){
			$query = $this->db->query("SELECT * FROM `product` WHERE DATE(post_date) BETWEEN '".$date1."' AND '".$date2."' AND status = '$status'");	
		}else if($status == '-1'){
		$query = $this->db->query("SELECT * FROM `product` ");		
		}
		$count = $query->num_rows();
		//echo $count;
		//echo $count;
		$html = '';
		//$i = '';
		if($count > 0){
			
				$html .='<table class="table table-bordered datatable-1">
								  <thead>
									<tr>
									  <th>S.No</th>
									  <th>Post date</th>
									  <th>Post Id</th>
									  <th>Category</th>
									  <th>Product Name</th>
									  <th>Status</th>
									  <th>Sell To</th>
									  <th>Barter Points</th>
									  <th></th>
									</tr>
								  </thead>
								  <tbody>';
								 $i = 1;
								  foreach($query->result() as $prodl){
					$html .='<tr>
									  <td>'.$i.'</td>
								       <td>'.date('d-m-Y', strtotime($prodl->post_date)).'</td>
								       <td>'.$prodl->post_id.'</td>
								       <td>'.getCategoryName($prodl->category).'</td>
								       <td>'.$prodl->product_name.'</td>
									   <td>'.getProductStatus($prodl->status).'</td>
								       <td>'.getUserName($prodl->sell_to).'</td>
								       <td>'.$prodl->barter_points.'</td>';

					$html .='<td>';
					if($prodl->status == 0){

					$html .= '<a href="'.base_url().'product/getListedProject/'.$prodl->post_id.'">More Details</a>';
								       	}else if($prodl->status == 1){
					$html .= '<a href="'.base_url().'product/getListedProject/'.$prodl->post_id.'">More Details</a>';
							       		}else if($prodl->status == 2){
					$html .= '<a href="'.base_url().'product/getProductDetails/'.$prodl->post_id.'">More Details</a>';
						       			}else{
					$html .= '<a href="'.base_url().'product/getListedProject/'.$prodl->post_id.'">More Details</a>';	       				
						       			}
					$html .= '</td>
									</tr>';
									
									$i++;
									} 
					$html .= '</tbody></table>';
					echo $html;
			
			
		}else{
			echo "There is no data";
		}
	}
	
function sendEmail($remTrim, $subject, $message) 
	{
		$this->load->library('email');
						
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$mydata['email'] = $remTrim;
			//echo $exp[$j];
			$mydata['from'] = 'vijay.karthik63@gmail.com';
				
			//$message = $this->load->view('mail_template/invite_message', $mydata, true);        
			//$message = "Barterhub disable you for some reason";
			$this->email->from('info@barterhub.in', 'Barterhub');
			
			$this->email->to($remTrim); 
			  
			$this->email->subject($subject);
			
			$this->email->message($message);	
			
			$this->email->send();

		return 1;

	}

}

?>