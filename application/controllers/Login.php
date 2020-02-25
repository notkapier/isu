<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('M_login');
	}
	function display($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit();
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
	public function signin(){
		
		$this->form_validation->set_rules('username', 'Username','required');
		$this->form_validation->set_rules('password', 'Password','required');

		if(!$this->form_validation->run()){
			$this->session->set_flashdata('Error','Pls Check Username and Password');
			redirect('home/login');
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->M_login->find_user($username);

			if(!$user){
				$this->session->set_flashdata('Error','Invalid Login');
				return redirect('home/login');
			}
			else{
				$hash = $user->password;
				if(password_verify($password, $hash)){
					$user_id = $user->id;
					$user_type = $this->db->query("select user_type from user_type where id = $user->user_type_id")->row()->user_type;
					$session_data = array(
						'username'=>$user->username,
						'user_type'=>$user_type,
						'id'=>$user_id,
						);
					// $this->display($user_type);
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('Success','Login Success');
					if($user_type=="admin"){
						$user_ip = $this->getUserIP();
						// $this->display($user_ip);
						$data  = array(
							'date_posted' => date('Y-m-d'),
							'user_ip' => $user_ip,
							'user_id' => $user_id,
							 );
						$this->M_login->InsertData($data,'stat');
						return redirect('admin');
					}
					else{
						$this->session->set_flashdata('Success','Login Success');
						$user_ip = $this->getUserIP();
						// $this->display($user_ip);
						$data  = array(
							'date_posted' => date('Y-m-d'),
							'user_ip' => $user_ip,
							'user_id' => $user_id,
							 );
						$this->M_login->InsertData($data,'stat');
						return redirect('home');
					}
					
							
				}
				else{
					$this->session->set_flashdata('Error','Invalid Login');
					return redirect('home/login');
				}
			}
		}
	}
	public function register(){
		$post = $_POST;
		
		foreach($post as $key => $key){
			$this->form_validation->set_rules($key, $key,'required');
			$data[$key] = $this->input->post($key);
		}
		if(!$this->form_validation->run()){
			$this->session->set_flashdata('Error','Pls Check Details');
			redirect('home/register');
		}
		$password = $data['password'];
		$data['password'] = password_hash($password, PASSWORD_DEFAULT);
		$data['date_posted'] = date('Y-m-d');
		$data['status'] = 1;
		$data['approved'] = 0;
		if($this->M_login->InsertData($data,'user')){
			$this->session->set_flashdata('Success','Pls wait for admin approval');
			return redirect ('home/login');
		}
		else{
			$this->session->set_flashdata('Error','Sorry, Registration Failed');
			return redirect ('home/register');
		}
		
	}

}
