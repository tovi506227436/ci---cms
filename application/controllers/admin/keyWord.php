<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class keyWord extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/admin_model','admin');
		$this->load->model('admin/role_model','role');
		$this->load->helper('form');
		$this->load->library('form_validation');
		if($this->session->userdata('roleId')==""||$this->session->userdata('roleId')=='0'){
			echo "<script  type='text/javascript'>top.window.location.href=".site_url('admin/login/index')."</script>";
			
		}
	}
	function index(){
		echo 111;
		$this->load->view('admin/keyWord/index_view',$data);
		
	}
	function  updateAdmin(){	
		if($this->input->post('sub')){
			if(strlen($this->input->post('pwd')=='32')){
				$pwd=$this->input->post('pwd');
			}else{
				$pwd=md5($this->input->post('pwd'));
			}	
			$adminId=$this->input->post('adminId');				
			$data=array(
					'name'=>$this->input->post('adminName'),
					'pwd'=>$pwd,
					'status'=>$this->input->post('status'),
					'roleId'=>$this->input->post('roleId')														
				);		
			$st=$this->admin->updateAdmin($adminId,$data);			
			if($st){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";				
			}else{
				echo "<script  type='text/javascript'>alert(1);</script>";
			}
		}else{
			$id=$this->input->get('adminId');
			$data['adminData']=$this->admin->getOneAdmin($id);						
			$data['data']=$this->role->getRole();
			$this->load->view('admin/admin/update_view',$data);
		}	
		
	}	
	function  addAdmin(){
		if($this->input->post('sub')){		
			$data=array(
					'name'=>$this->input->post('adminName'),
					'pwd'=>md5($this->input->post('pwd')),
					'status'=>$this->input->post('status'),
					'time'=>time(),
					'roleId'=>$this->input->post('roleId')
				);
			$isName=$this->admin->getAdminName($data['name']);
			if($isName){
				echo "<script  type='text/javascript'>alert('该管理员已存在');window.parent.location.reload();</script>";
				return ;			
			}								
			$rs=$this->db->insert('admin', $data); 
			if($rs){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
			}else{
				echo "<script  type='text/javascript'>window.parent.location.reload();alert('添加失败');</script>";
			}
		}else{
			$dataRole['data']=$this->role->getRole();
			$this->load->view('admin/admin/admin_view',$dataRole);
		}	
	}
	public  function delect(){
		$adminId=$this->input->post('id');
		$rs=$this->admin->delect($adminId);						
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	public  function delectArray(){
		$arrayId=$this->input->post('arrayId');
		$dataId=explode('|',$arrayId);
		$rs=$this->admin->delectArray($dataId);	
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}		
	}

}