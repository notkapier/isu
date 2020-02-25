<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('M_home');
		$this->load->model('M_admin');
		$this->load->model('M_login');
		$this->load->database();
		
	}
	function getUserIP()
	{
	    // Get real visitor IP behind CloudFlare network
	    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
	              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	    }
	    $client  = @$_SERVER['HTTP_CLIENT_IP'];
	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    $remote  = $_SERVER['REMOTE_ADDR'];

	    if(filter_var($client, FILTER_VALIDATE_IP))
	    {
	        $ip = $client;
	    }
	    elseif(filter_var($forward, FILTER_VALIDATE_IP))
	    {
	        $ip = $forward;
	    }
	    else
	    {
	        $ip = $remote;
	    }

	    return $ip;
	}
	function display($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit();
	}
	public function index()
	{
		$user_ip = $this->getUserIP();
		$data  = array(
			'date_posted' => date('Y-m-d'),
			'user_ip' => $user_ip,
			'user_id' => 0
			 );
		$this->M_login->InsertData($data);


		$where = " status='featured'";
		$data['featured'] = $this->M_home->getSingleData('post',$where);
		$where = " status='active'";
		$data['posts'] = $this->M_home->getMultipleData('post',$where,6);
		$data['announcements'] = $this->M_home->getMultipleData('announcement',"",6);
		$where = " name like '%banner%' ";
		$data['banners'] = $this->M_home->getMultipleData('element',$where);
		// $this->display($data);
		$this->load->view('home/header',$data);
		$this->load->view('home/nav_container');
		$this->load->view('home/carousel');
		$this->load->view('home/index');
		$this->load->view('home/footer');
	}
	public function post($id){
		$where = " id=$id";
		$data['post'] = $this->M_home->getSingleData('post',$where);
		$this->load->view('home/header',$data);
		$this->load->view('home/nav_container');
		$this->load->view('home/post');
		$this->load->view('home/footer');
	}
	public function reference($id){
		$where = " id=$id";
		$data['reference'] = $this->M_home->getSingleData('reference',$where);
		$reference = $data['reference']->id;
		$where = " id=$id";
		$data['reference_type'] = $this->M_home->getSingleData('reference_type',$where);
		$this->load->view('home/header',$data);
		$this->load->view('home/nav_container');
		$this->load->view('home/reference');
		$this->load->view('home/footer');
	}
	public function traccer_item($id){
		$where = " id=$id";
		$data['traccer'] = $this->M_home->getSingleData('traccer',$where);
		$reference = $data['traccer']->id;
		$where = " id=$id";
		$data['traccer_type'] = $this->M_home->getSingleData('traccer_type',$where);
		$this->load->view('home/header',$data);
		$this->load->view('home/nav_container');
		$this->load->view('home/traccer_item');
		$this->load->view('home/footer');
	}
	public function academics()
	{	
		$data['courses'] = $this->M_home->getData('course');
		$data['title']="Offered Courses";
		$this->load->view('home/header',$data);
		$this->load->view('home/nav_container');
		$this->load->view('home/title');
		$this->load->view('home/academics');
		$this->load->view('home/footer');
	}
	public function alumni(){
		$data['alumni'] = $this->M_admin->getAllDataJoin('alumnus','course');
		$data['title']="Our Graduates";
		$this->load->view('home/header',$data);
		$this->load->view('home/nav_container');
		$this->load->view('home/alumni');
		$this->load->view('home/footer');
	}
	public function digitallibrary($id=0){
		$data['title']="Our Library";
		$data['reference_type'] = $this->M_home->getData('reference_type','reference_type','desc');
		if(count($data['reference_type'])==0){
			$this->session->set_flashdata('Error','No Reference Type');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		if($id==0){
			$base = $data['reference_type'][0]->id;	
		}
		else{
			$base = $id;
		}
		
		$where = " reference_type_id = $base ";
		$data['reference'] = $this->M_home->getAllDataJoin('reference','reference_type',$where);
		
		if($id==0){
			$this->load->view('home/header',$data);
			$this->load->view('home/nav_container');
			$this->load->view('home/title');
			$this->load->view('home/digitallibrary');
			$this->load->view('home/footer');
		}
		else{
			$this->load->view('home/reference_table',$data);
		}
		
		
	}
	public function traccer($id=0){
		$data['title']="TRACCER";
		$data['traccer_type'] = $this->M_home->getData('traccer_type','traccer_type','desc');
		if(count($data['traccer_type'])==0){
			$this->session->set_flashdata('Error','No Reference Type');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		if($id==0){
			$base = $data['traccer_type'][0]->id;	
		}
		else{
			$base = $id;
		}
		
		$where = " traccer_type_id = $base ";
		$data['traccer'] = $this->M_home->getAllDataJoin('traccer','traccer_type',$where);
		
		if($id==0){
			$this->load->view('home/header',$data);
			$this->load->view('home/nav_container');
			$this->load->view('home/title');
			$this->load->view('home/traccer');
			$this->load->view('home/footer');
		}
		else{
			$this->load->view('home/traccer_table',$data);
		}
	}
	public function aboutus($id=0){
		$data['title']="About CCSICT";
		$data['about_tabs'] = $this->M_home->getData('about_tab','about_tab','desc');
		if(count($data['about_tabs'])==0){
			$this->session->set_flashdata('Error','No Tabs Yet');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		if($id==0){
			$this->load->view('home/header',$data);
			$this->load->view('home/nav_container');
			$this->load->view('home/title');
			$this->load->view('home/aboutus');
			$this->load->view('home/footer');	
		}
		else{
			$where = " id = $id ";
			$table = "about_tab";
			$data = $this->M_home->getSingleData($table,$where);
			echo json_encode($data);
		}	
		
	}
	function logout(){
		session_destroy();
		return redirect('home');
	}
	public function vtour(){
		$data['title']="Virtual Tour";
		$this->load->view('home/header',$data);
		$this->load->view('home/nav_container');
		$this->load->view('home/title');
		$this->load->view('home/vtour');
		$this->load->view('home/footer');
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
	public function forum($id=0){
		if(!$this->session->userdata('user_type')){
	 		return redirect('home');
	 	}
		if($id==0){
			$data['title'] = 'Forum';
			$data['forum'] = $this->M_home->getForum();
			// $this->display($data);
			$this->load_ckeditor();
			$this->load->view('home/header',$data);
			$this->load->view('home/nav_container');
			$this->load->view('home/forum');
			$this->load->view('home/footer');
		}
		else{

			$data['question'] = $this->M_home->getForum($id);
			// $data['title'] = $data['question']->question;
			$data['answer'] = $this->M_home->getForumData($id);
			// $this->display($data);
			$this->load_ckeditor();
			$this->load->view('home/header',$data);
			$this->load->view('home/nav_container');
			$this->load->view('home/question');
			$this->load->view('home/footer');
		}
		
	}
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
		if(($values[0])=='question'){
			$array = array('id','question');
		}
		if(($values[0])=='answer'){
			$array = array('id','answer');
		}
		$data = $this->M_home->getOneData($values[0],$values[1],$array);
		if((!empty($data)) || ($data <>0)){
			echo json_encode($data);
		}
	}
	public function login(){
		$data['title']="Login";
		$this->load->view('home/header',$data);
		
		$this->load->view('home/login');
	}
}
