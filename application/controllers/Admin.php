<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('user_type')=="admin"){
	 		return redirect('home');
	 	}
		$this->load->database();
		$this->load->model('M_admin');
	}
	function index(){
		$data['registered'] = $this->M_admin->getRegistered();
		$data['visitors'] = $this->M_admin->getVisitors();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/chart');
		$this->load->view('admin/footer');
	}
	function chart(){

		$data['registered'] = $this->M_admin->getRegistered();
		$data['visitors'] = $this->M_admin->getVisitors();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/chart');
		$this->load->view('admin/footer');
	}
	function element(){
		$data['element'] = $this->M_admin->getAllData('element');
		$this->load_ckeditor();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/element');
		$this->load->view('admin/footer');
	}
	function post(){
		$data['posts'] = $this->M_admin->getAllData('post');
		$this->load_ckeditor();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/post');
		$this->load->view('admin/footer');
	}
	function announcement(){
		$data['announcements'] = $this->M_admin->getAllData('announcement');
		$this->load_ckeditor();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/announcement');
		$this->load->view('admin/footer');
	}
	function course(){
		$data['courses'] = $this->M_admin->getAllData('course');
		$this->load_ckeditor();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/course');
		$this->load->view('admin/footer');
	}
	function alumni(){
		$data['courses'] = $this->M_admin->getAllData('course');
		if(count($data['courses'])==0){
			$this->session->set_flashdata('Error','Pls Add a Course');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		$data['alumni'] = $this->M_admin->getAllDataJoin('alumnus','course');
		// $this->display($data);
		$this->load_ckeditor();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/alumni');
		$this->load->view('admin/footer');
	}
	function user(){
		$data['user_types'] = $this->M_admin->getAllData('user_type');
		if(count($data['user_types'])==0){
			$this->session->set_flashdata('Error','Pls Add a User Type');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		$data['user'] = $this->M_admin->getAllDataJoin('user','user_type');
		// $this->display($data);
		$this->load_ckeditor();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/user');
		$this->load->view('admin/footer');
	}
	function reference(){
		$data['reference_types'] = $this->M_admin->getAllData('reference_type');
		if(count($data['reference_types'])==0){
			$this->session->set_flashdata('Error','Pls Add Reference Type');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		$data['references'] = $this->M_admin->getAllDataJoin('reference','reference_type');
		// $this->display($data);
		$this->load_ckeditor();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/digitallibrary');
		$this->load->view('admin/footer');
	}
	function traccer(){
		$data['traccer_types'] = $this->M_admin->getAllData('traccer_type');
		if(count($data['traccer_types'])==0){
			$this->session->set_flashdata('Error','Pls Add Traccer Type');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		$data['traccer'] = $this->M_admin->getAllDataJoin('traccer','traccer_type');
		// $this->display($data);
		$this->load_ckeditor();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/traccer');
		$this->load->view('admin/footer');
	}
	function aboutus(){
		$data['about_tab'] = $this->M_admin->getAllData('about_tab');
		// $this->display($data);
		$this->load_ckeditor();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/aboutus');
		$this->load->view('admin/footer');
	}
	function logout(){
		session_destroy();
		return redirect('home');
	}
	function display($data){
		//checking usage, this will display variable on screen,
		//in case of ajax request, click network tab, find the method, click and view response
		//you  can delete this function, make sure it is not called anywhere
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit();
	}
	public function load_ckeditor(){
		$this->load->library('ckeditor');


		$this->ckeditor->basePath = base_url().'assets/admin/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
		                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList','insert','EasyImageUpload' )
		                                                    );

		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] = '900px';
		$this->ckeditor->config['height'] = '300px';  

	}
	//Required Image on Insert, Optional on Update
	//Optional Attachment
	//Generic function
	function postDataWithImage(){
		//edit as per your needs
		$config = [
			'upload_path'=>'./assets/uploads',
			'allowed_types'=>'gif|png|jpg|jpeg|docx',
			'max_size' => '10000',
			'overwrite' => 'TRUE'
		];
		$data;
		$this->load->library('upload',$config);		
		$post = $_POST;
		// $this->display($post);
		unset($post['image']);
		unset($post['attachment']);
		//setting required input
		foreach($post as $key => $key){
			$this->form_validation->set_rules($key, $key,'required');
			$data[$key] = $this->input->post($key);
		}
		if($this->form_validation->run()==FALSE){
			$this->display("validationn");
			$this->session->set_flashdata('Error','Pls Complete Details');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			//begin insert
			//if image is not empty
			if($this->input->post('id')==0){
				if (empty($_FILES['image']['name'])) {
					$this->session->set_flashdata('Error','Check Image Details');
					return redirect($_SERVER['HTTP_REFERER']);
				}
				//image upload
				else{
					//if image uploads set location
					if($this->upload->do_upload('image')){
						$info = $this->upload->data();
						$file_path = base_url("assets/uploads/".$info['raw_name'].$info['file_ext']);
						$data['image'] = $file_path;
						//check attachment
						if (!empty($_FILES['attachment']['name'])) {
							//upload attachment
							if($this->upload->do_upload('attachment')){
								$info = $this->upload->data();
								$file_path = base_url("assets/uploads/".$info['raw_name'].$info['file_ext']);
								$data['attachment'] = $file_path;
							}
						}
						//remove id (id 0 indicator of insert)
						//finalizing data for insert
						unset($data['id']);
						$table = $data['table'];
						unset($data['table']);
						$data['date_posted']=date('Y-m-d');
						if($this->M_admin->insertData($table,$data)){
							$this->session->set_flashdata('Success','Insert Success');	
						}
						else{
							$this->session->set_flashdata('Error','Insert Error');
						}
						
						return redirect($_SERVER['HTTP_REFERER']);
					}
					else{
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('Error',$error );
						return redirect($_SERVER['HTTP_REFERER']);
					}
				}
			}
			//update
			else{
				//check if image is empty
				if (!empty($_FILES['image']['name'])) {
					if($this->upload->do_upload('image')){
						$info = $this->upload->data();
						$file_path = base_url("assets/uploads/".$info['raw_name'].$info['file_ext']);
						$data['image'] = $file_path;
					}
					else{
						$this->session->set_flashdata('Error','Check Image Details');
					}
				}
				if (!empty($_FILES['attachment']['name'])) {
					if($this->upload->do_upload('attachment')){
						$info = $this->upload->data();
						$file_path = base_url("assets/uploads/".$info['raw_name'].$info['file_ext']);
						$data['attachment'] = $file_path;
					}
					else{
						$this->session->set_flashdata('Error','Check Attachment Details or Config');
					}
				}
				$id = $data['id'];
				$table = $data['table'];
				unset($data['id']);
				unset($data['table']);
				if($this->M_admin->updateData($table,$id,$data)){
					$this->session->set_flashdata('Success','Update Success');
				}
				else{
					$this->session->set_flashdata('Error','Update Error');
				}
				return redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	//Required Attachment for Insert
	//Optional Attachment for Update
	function postDataWithAttachment(){
		//edit as per your needs
		$config = [
			'upload_path'=>'./assets/uploads',
			'allowed_types'=>'gif|png|jpg|jpeg|docx',
			'max_size' => '10000',
			'overwrite' => 'TRUE'
		];
		$data;
		$this->load->library('upload',$config);		
		$post = $_POST;
		// $this->display($post);
		unset($post['image']);
		unset($post['attachment']);
		//setting required input
		foreach($post as $key => $key){
			$this->form_validation->set_rules($key, $key,'required');
			$data[$key] = $this->input->post($key);
		}
		if($this->form_validation->run()==FALSE){
			$this->display("validationn");
			$this->session->set_flashdata('Error','Pls Complete Details');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			//begin insert
			//if image is not empty
			if($this->input->post('id')==0){
				if (empty($_FILES['attachment']['name'])) {
					$this->session->set_flashdata('Error','Check Attachment Details');
					return redirect($_SERVER['HTTP_REFERER']);
				}
				//image upload
				else{
					//if image uploads set location
					if($this->upload->do_upload('attachment')){
						$info = $this->upload->data();
						$file_path = base_url("assets/uploads/".$info['raw_name'].$info['file_ext']);
						$data['attachment'] = $file_path;
						//remove id (id 0 indicator of insert)
						//finalizing data for insert
						unset($data['id']);
						$table = $data['table'];
						unset($data['table']);
						$data['date_posted']=date('Y-m-d');
						if($this->M_admin->insertData($table,$data)){
							$this->session->set_flashdata('Success','Insert Success');	
						}
						else{
							$this->session->set_flashdata('Error','Insert Error');
						}
						
						return redirect($_SERVER['HTTP_REFERER']);
					}
					else{
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('Error',$error );
						return redirect($_SERVER['HTTP_REFERER']);
					}
				}
			}
			//update
			else{
				if (!empty($_FILES['attachment']['name'])) {
					if($this->upload->do_upload('attachment')){
						$info = $this->upload->data();
						$file_path = base_url("assets/uploads/".$info['raw_name'].$info['file_ext']);
						$data['attachment'] = $file_path;
					}
					else{
						$this->session->set_flashdata('Error','Check Attachment Details or Config');
					}
				}
				$id = $data['id'];
				$table = $data['table'];
				unset($data['id']);
				unset($data['table']);
				if($this->M_admin->updateData($table,$id,$data)){
					$this->session->set_flashdata('Success','Update Success');
				}
				else{
					$this->session->set_flashdata('Error','Update Error');
				}
				return redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	//Post or Update Optional Attachment No Image
	function postDataWithOptionalAttachment(){
		//edit as per your needs
		$config = [
			'upload_path'=>'./assets/uploads',
			'allowed_types'=>'gif|png|jpg|jpeg|docx',
			'max_size' => '10000',
			'overwrite' => 'TRUE'
		];
		$data;
		$this->load->library('upload',$config);		
		$post = $_POST;
		// $this->display($post);
		unset($post['image']);
		unset($post['attachment']);
		//setting required input
		foreach($post as $key => $key){
			$this->form_validation->set_rules($key, $key,'required');
			$data[$key] = $this->input->post($key);
		}
		if($this->form_validation->run()==FALSE){
			$this->display("validationn");
			$this->session->set_flashdata('Error','Pls Complete Details');
		}
		else{
			if (!empty($_FILES['attachment']['name'])) {
				if($this->upload->do_upload('attachment')){
					$info = $this->upload->data();
					$file_path = base_url("assets/uploads/".$info['raw_name'].$info['file_ext']);
					$data['attachment'] = $file_path;
				}
			}
			$id = $data['id'];
			unset($data['id']);
			$table = $data['table'];
			unset($data['table']);
			$data['date_posted']=date('Y-m-d');
			if($id==0){
				if($this->M_admin->insertData($table,$data)){
					$this->session->set_flashdata('Success','Insert Success');	
				}
				else{
					$this->session->set_flashdata('Error','Insert Error');
				}
			}
			else{
				if($this->M_admin->updateData($table,$id,$data)){
					$this->session->set_flashdata('Success','Update Success');
				}
				else{
					$this->session->set_flashdata('Error','Update Error');
				}
			}
		}
		return redirect($_SERVER['HTTP_REFERER']);
	}
	//Post and Update Optional Files
	function postDataWithOptionalImageOptionalAttachment(){
		//edit as per your needs
		$config = [
			'upload_path'=>'./assets/uploads',
			'allowed_types'=>'gif|png|jpg|jpeg|docx',
			'max_size' => '10000',
			'overwrite' => 'TRUE'
		];
		$data;
		$this->load->library('upload',$config);		
		$post = $_POST;
		$password;
		if($post['password']){
			$password = $post['password'];
			unset($post['password']);
		}
		// $this->display($post);
		unset($post['image']);
		unset($post['attachment']);
		//setting required input
		foreach($post as $key => $key){
			$this->form_validation->set_rules($key, $key,'required');
			$data[$key] = $this->input->post($key);
		}
		if($this->form_validation->run()==FALSE){
			$this->display("validationn");
			$this->session->set_flashdata('Error','Pls Complete Details');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			if (!empty($_FILES['image']['name'])) {
				if($this->upload->do_upload('image')){
					$info = $this->upload->data();
					$file_path = base_url("assets/uploads/".$info['raw_name'].$info['file_ext']);
					$data['image'] = $file_path;
				}
				else{
					$this->session->set_flashdata('Error','Check Image Details');
				}
			}
			if (!empty($_FILES['attachment']['name'])) {
				if($this->upload->do_upload('attachment')){
					$info = $this->upload->data();
					$file_path = base_url("assets/uploads/".$info['raw_name'].$info['file_ext']);
					$data['attachment'] = $file_path;
				}
				else{
					$this->session->set_flashdata('Error','Check Attachment Details or Config');
				}
			}
				$id = $data['id'];
				$table = $data['table'];
				unset($data['id']);
				unset($data['table']);
				$data['date_posted']=date('Y-m-d');
				if($id==0){
					if($_POST['password']){
						if($password==""){
							$this->session->set_flashdata('Error','Insert Error');
						}
						else{
							$data['password'] = password_hash($password, PASSWORD_DEFAULT);
						}
					}
					if($this->M_admin->insertData($table,$data)){
						$this->session->set_flashdata('Success','Insert Success');	
					}
					else{
						$this->session->set_flashdata('Error','Insert Error');
					}
				}
				else{
					if($_POST['password']){
						if($password!=""){
							$data['password'] = password_hash($password, PASSWORD_DEFAULT);
						}
					}
					if($this->M_admin->updateData($table,$id,$data)){
						$this->session->set_flashdata('Success','Update Success');
					}
					else{
						$this->session->set_flashdata('Error','Update Error');
					}
				}

		}
		return redirect($_SERVER['HTTP_REFERER']);
	}
	//Pure Data
	//Post and Update for No image no attachment
	function postData(){
		$data;
		$post = $_POST;
		//setting required input
		foreach($post as $key => $key){
			$this->form_validation->set_rules($key, $key,'required');
			$data[$key] = $this->input->post($key);
		}
		if($this->form_validation->run()==FALSE){
			$this->display("validationn");
			$this->session->set_flashdata('Error','Pls Complete Details');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			if($this->input->post('id')==0){
				unset($data['id']);
					$table = $data['table'];
					unset($data['table']);
					$data['date_posted']=date('Y-m-d');
					if($this->M_admin->insertData($table,$data)){
						$this->session->set_flashdata('Success','Insert Success');	
					}
					else{
						$this->session->set_flashdata('Error','Insert Error');
					}		
					return redirect($_SERVER['HTTP_REFERER']);
			}
			else{
				$id = $data['id'];
				$table = $data['table'];
				unset($data['id']);
				unset($data['table']);
				if($this->M_admin->updateData($table,$id,$data)){
					$this->session->set_flashdata('Success','Update Success');
				}
				else{
					$this->session->set_flashdata('Error','Update Error');
				}
				return redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	function getData($record){
		//select where
		$values = explode('-', $record);
		if(($values[0])=='post'){
			$array = array('id','title','description','status');
		}
		if(($values[0])=='announcement'){
			$array = array('id','title','description');
		}
		if(($values[0])=='course'){
			$array = array('id','course','description');
		}
		if(($values[0])=='alumnus'){
			$array = array('id','year_graduated','course_id','fullname');
		}
		if(($values[0])=='reference'){
			$array = array('id','title','author','description','reference_type_id');
		}
		if(($values[0])=='traccer'){
			$array = array('id','item','date_posted','description','traccer_type_id');
		}
		if(($values[0])=='about_tab'){
			$array = array('id','about_tab','date_posted','description');
		}
		if(($values[0])=='element'){
			$array = array('id','name','description');
		}
		if(($values[0])=='user'){
			$array = array('id','username','fullname','user_type_id');
		}
		$data = $this->M_admin->getData($values[0],$values[1],$array);
		if((!empty($data)) || ($data <>0)){
			echo json_encode($data);
		}
	}
	function deleteData(){
		$data = $this->input->post();

		// $this->display($id);
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		// $this->display($table.'-'.$id);
		if($this->db->where('id',$id)->delete($table)){
			$this->session->set_flashdata('Success',"Item Successfully Deleted!");
			echo json_encode(array("status" => TRUE));
		}
		else{
			$this->session->set_flashdata('Error',"Cannot Delete!");
			return FALSE;
		}
	}
}
