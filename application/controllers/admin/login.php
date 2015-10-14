<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Login extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/login_model','login');
	}	
	public function index(){	
		$this->load->view('admin/login_view');
	}
		
	public function Login(){
			
		if($_SERVER['REQUEST_METHOD']=="GET"){
			redirect('error/error404');
		}else if($_SERVER['REQUEST_METHOD']=="POST"){
			$username=$this->input->post('username');
			$pwd=$this->input->post('pwd');
			$code=$this->input->post('code');			
			if(empty($username)){
				$this->session->set_flashdata ( 'admin_login_username_error', '用户名不得为空！' );
				redirect ('admin/login/index');
			}
			if(empty($pwd)){
				$this->session->set_flashdata ( 'admin_login_pwd_error', '密码不得为空！' );
				redirect ('admin/login/index');
			}
			if(empty($code)){
				$this->session->set_flashdata ( 'admin_login_code_error', '验证码不得为空！' );
				redirect ('admin/login/index');
			}				
			if($code != $_SESSION ['xsky_reg_code']){
				$this->session->set_flashdata ( 'admin_login_code2_error', '验证码错误！' );
				redirect ('admin/login/index');
			}else{
				$adminData=$this->login->login($username,md5($pwd));			
				if($adminData['0']['status']=="2"){
					$this->session->set_flashdata ( 'admin_login_code3_error', '管理员账户已停用！' );				
					redirect ('admin/login/index');
				}elseif ($adminData['0']['roleStatus']=="2"){
					$this->session->set_flashdata ( 'admin_login_code4_error', '该角色已停用！' );				
					redirect ('admin/login/index');								
				}else{
					if($adminData){
						$adminData=$adminData['0'];	
						//$sessId=array('sessId'=>session_id());
						//$rs=$this->login->updateSessId($adminData['id'],$sessId);							
						$this->session->set_userdata('sessId',session_id());																				
						$this->session->set_userdata($adminData);
						redirect ('admin/index/index');					
					}else{
						$this->session->set_flashdata ( 'admin_login_error','用户名或密码错误！' );
						redirect ('admin/login/index');
					}
					
				}
				
			}	
		}
	}
	
	public function quit(){
		$this->session->sess_destroy();
		redirect ('admin/login/index');
	}
	public function outputCheckcode() {			
		$this->load->library ('checkcode');
		$this->checkcode->doimage ();							
		$_SESSION ['xsky_reg_code'] = $this->checkcode->get_code ();
	}
		
}