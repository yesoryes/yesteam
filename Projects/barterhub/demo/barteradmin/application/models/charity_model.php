<?php

class Charity_model extends CI_Model{

	function __construct(){
        parent::__construct();
    }
    //add charity details to database
    public function addCharity(){
    	$cha_name = $this->input->post('charity_name');
    	$regno = $this->input->post('reg_no');
    	$contact_per = $this->input->post('contact_person');
    	$contact_no = $this->input->post('contact_no');
    	$address = $this->input->post('address');
    	$aboutCharity = $this->input->post('about_charity');
    	$createdOn = date('Y-m-d H:i:s');
    	if($_FILES['logo']['size'] != 0 )
		{
		 
			$files = $_FILES;
			$config = array();
			$config['upload_path'] = "charity_gallery/";
			$config['allowed_types'] = "png|jpg|gif"; 
			$config['max_size'] = "5000";
			$this->load->library('upload',$config);
			$this->upload->initialize($config);


			$this->upload->do_upload('logo');
			$imgdata = $this->upload->data();
			$image_config=array();			
			$image_config["image_library"] = "gd2";
			$image_config['overwrite'] = TRUE;
			$image_config["source_image"] = $imgdata["full_path"];
			$image_config['create_thumb'] = FALSE;
			$image_config['maintain_ratio'] = TRUE;
			$image_config['new_image'] = $imgdata["file_path"].$imgdata["file_name"];
			$image_config['quality'] = "95%";
			$image_config['width'] = 170;
			$image_config['height'] = 170;
			$this->load->library('image_lib',$image_config);
			$this->image_lib->initialize($image_config);	
			$this->image_lib->resize();
			$logo = 'charity_gallery/'.$imgdata["file_name"];
				
	    	$query = $this->db->query("INSERT INTO `charities` (charity_name, reg_no, contact_person, contact_number, address, about, logo, created_on) VALUES ('$cha_name', '$regno', '$contact_per', '$contact_no', '$address', '$aboutCharity', '$logo', '$createdOn')");
			$cid = $this->db->insert_id();
			//echo "hello".$cid;
			
			//return $aff;
		}else{
			$query = $this->db->query("INSERT INTO `charities` (charity_name, reg_no, contact_person, contact_number, address, about, created_on) VALUES ('$cha_name', '$regno', '$contact_per', '$contact_no', '$address', '$aboutCharity', '$createdOn')");
			$cid = $this->db->insert_id();
			//echo "how".$cid;
			
			//return $aff;
		}

		

		if (!empty($_FILES['charity_image']['name'][0])) {
			if ($this->upload_files( $createdOn, $cid, $_FILES['charity_image']) === FALSE) {
				//$data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
				//$aff = $this->db->affected_rows();
				return 0;
			}else{
				return 1;
			}
		} 
        

    }
 	//calling this function to move image and save in 'charity_gallery' 
	private function upload_files( $createdOn, $title, $files)
    {
        $config = array(
            'upload_path'   => 'charity_gallery/',
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['charity_image[]']['name']= $files['name'][$key];
            $_FILES['charity_image[]']['type']= $files['type'][$key];
            $_FILES['charity_image[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['charity_image[]']['error']= $files['error'][$key];
            $_FILES['charity_image[]']['size']= $files['size'][$key];

            $fileName = $title .'_'. $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;
			$imgName = 'charity_gallery/'.$fileName;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('charity_image[]')) {
                $this->upload->data();
				//echo "how"."INSERT INTO `charity_gallery` (charity_id, image_name, created_on) VALUES ('$title', '$imgName', '$createdOn')";
            	$query = $this->db->query("INSERT INTO `charity_gallery` (charity_id, image_name, created_on) VALUES ('$title', '$imgName', '$createdOn')");
            } else {
                return false;
            }
        }

        return true;
    }
	
	//get charity details
	public function getCharitydata(){
		//echo "SELECT * FROM `charities` ORDER BY char_id DESC";
		$query = $this->db->query("SELECT * FROM `charities` ORDER BY char_id DESC");
		return $query->result();
	}
	
	public function getCharityEdit($id){
		$query = $this->db->query("SELECT * FROM `charities` WHERE char_id = '$id'");
		return $query->result();
	}

	public function getGallery($id){
		//echo "SELECT * FROM `charity_gallery` WHERE charity_id = '$id'";
		$query = $this->db->query("SELECT * FROM `charity_gallery` WHERE charity_id = '$id'");
		if($query->num_rows() > 0){
			//$row = $query->row();
			$html = '';
			$i = 1;
			foreach($query->result() as $val){
			$html .= '
			<div class="span4 rqe" id="deleterow'.$i.'">
				<i class="icon-remove-sign setIcon" onclick="deleteGallery('.$val->img_id.','.$i.');" style="font-size: 21px; padding: 4px;"></i>
				<img src="'.base_url().$val->image_name.'" class="img-responsive" style=" height:213px;">
			</div>
			';
			$i++;
		}
			return $html;
		}
	}

	//Delete the image gallery photo from database
	public function galleryDelete(){
		$id = $this->input->post('id');
		$query1 = $this->db->query("SELECT image_name FROM `charity_gallery` WHERE img_id = '$id'");
		if($query1->num_rows() > 0){
			$row = $query1->row();
			
			unlink($row->image_name);
		}
		$query = $this->db->query("DELETE FROM `charity_gallery` WHERE img_id = '$id'");
		if($query){
			
			echo 1;
		}	
	}
	//Edit charity from database 
	public function charityEdit(){
		$id = $this->input->post('getId');
		$name = $this->input->post('charity_name');
		$regno = $this->input->post('reg_no');
		$cont_prs = $this->input->post('contact_person');
		$cont_num = $this->input->post('contact_no');
		$address = $this->input->post('address1');
		$about_char = $this->input->post('about_charity');
		$createdOn = date('Y-m-d H:i:s');
		if($_FILES['elogo']['size'] != 0 )
		{
			$pic = $this->db->query("SELECT * FROM `charities` WHERE char_id = '$id'");
			if($pic->num_rows() > 0)
			{
				$row = $pic->row();
				$this->load->helper("url");
				$this->load->helper("file");
				  
				 unlink($row->logo);
				
			}
		 
			$files = $_FILES;
			$config = array();
			$config['upload_path'] = "charity_gallery/";
			$config['allowed_types'] = "png|jpg|gif"; 
			$config['max_size'] = "5000";
			$this->load->library('upload',$config);
			$this->upload->initialize($config);


			$this->upload->do_upload('elogo');
			$imgdata = $this->upload->data();
			$image_config=array();			
			$image_config["image_library"] = "gd2";
			$image_config['overwrite'] = TRUE;
			$image_config["source_image"] = $imgdata["full_path"];
			$image_config['create_thumb'] = FALSE;
			$image_config['maintain_ratio'] = TRUE;
			$image_config['new_image'] = $imgdata["file_path"].$imgdata["file_name"];
			$image_config['quality'] = "95%";
			$image_config['width'] = 170;
			$image_config['height'] = 170;
			$this->load->library('image_lib',$image_config);
			$this->image_lib->initialize($image_config);	
			$this->image_lib->resize();
			$elogo = 'charity_gallery/'.$imgdata["file_name"];

			$query = $this->db->query("UPDATE `charities` SET charity_name = '$name', reg_no = '$regno', contact_person = '$cont_prs', contact_number = '$cont_num', address = '$address', about = '$about_char', logo = '$elogo', updated_on = '$createdOn' WHERE char_id = '$id'");
			//echo "hello".$cid;
			
			//return $aff;
		}else{
			//echo "UPDATE `charities` SET charity_name = '$name', reg_no = $regno, contact_person = '$cont_prs', contact_number = '$cont_num', address = '$address', about = '$about_char', updated_on = '$createdOn' WHERE char_id = '$id'";
			$query = $this->db->query("UPDATE `charities` SET charity_name = '$name', reg_no = '$regno', contact_person = '$cont_prs', contact_number = '$cont_num', address = '$address', about = '$about_char', updated_on = '$createdOn' WHERE char_id = '$id'");
			//echo "how".$cid;
			
			//return $aff;
		}


		if (!empty($_FILES['charity_image']['name'][0])) {
			if ($this->upload_files( $createdOn, $id, $_FILES['charity_image']) === FALSE) {
				//$data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
				//$aff = $this->db->affected_rows();
				return 0;
			}else{
				return 1;
			}
		}
		return 1;

	}

	//delete charity from database 
	public function charityDelete(){
		$id = $this->input->post('id');

		$query = $this->db->query("DELETE FROM `charities` WHERE char_id = '$id'");
		if($query){
			$this->db->query("DELETE FROM `charity_gallery` WHERE charity_id = '$id'");
			return 1;
		}
	}

}

?>