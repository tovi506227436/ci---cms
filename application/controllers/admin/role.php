<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Role extends CI_Controller {	
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/role_model','role');
		$this->load->model('admin/index_model','index');
		$this->load->helper('form');
		$this->load->library('form_validation');
		if($this->session->userdata('roleId')==""||$this->session->userdata('roleId')=='0'){
		 		echo "<script  type='text/javascript'>top.window.location.href=".site_url('admin/login/index')."</script>";
			
		}
	}	
	public function index(){
		$da=$this->role->getRole();
		$data['data']=$da;		
		$this->load->view('admin/role/index_view',$data);
	}	
	public function edit(){
		$roleId=$this->input->get('roleId');
		$arr = explode(".html",$roleId);	
		$roleId = implode("",$arr);
		$roleIdArray=$this->role->getOneRole($roleId);		
		$data['role_name']=$roleIdArray['0']['role_name'];		
		$data['role']=explode("|",$roleIdArray['0']['prive']);		
		$data['data']=$this->digui(0);//递归一级二级一次排序
		$data['roleId']=$roleId;//递归一级二级一次排序	
		$data['description']=$roleIdArray[0]['description'];
		$data['status']=$roleIdArray[0]['status'];	
		$this->load->view('admin/role/update_view',$data);
	}	
	public  function editRole(){
		if($this->input->post('sub')){			
			$roleId=$this->input->post('roleId');
			$roleName=$this->input->post('roleName');
			$prive=$this->input->post('prive');
			$description=$this->input->post('description');
			$status=$this->input->post('status');
			$roleStr=implode('|',$prive);
			$roleArray=array(
				'prive'=>$roleStr,
				'role_name'=>$roleName,
				'description'=>$description,
				'status'=>$status
			);		
			$st=$this->role->updateRole($roleId,$roleArray);			
			if($st){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";				
			}else{
				echo "<script  type='text/javascript'>alert(1);</script>";
			}
		}	
	}
	
	public  function  add(){				
			if($this->input->post('sub')){
				$roleName=$this->input->post('roleName');
				$prive=$this->input->post('prive');
				$description=$this->input->post('description');
				$status=$this->input->post('status');
				$roleStr=implode('|',$prive);
				$roleArray=array(
					'prive'=>$roleStr,
					'role_name'=>$roleName,
					'description'=>$description,
					'status'=>$status
				);		
				$rs=$this->db->insert('role', $roleArray); 			
				if($rs){
					echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
				}else{
					echo "<script  type='text/javascript'>window.parent.location.reload();alert('添加失败');</script>";
				}
							
			}else{
				$data['data']=$this->digui(0);//递归一级二级一次排序
				$this->load->view('admin/role/add_view',$data);		
			}									
	}
	
	public  function delect(){
		$roleId=$this->input->post('id');
		$rs=$this->role->delect($roleId);
		if($rs){
			echo '1';
		}else{
			echo '0';
		}				
	}
	
	
	/**
	 * 通过递归的方式
	 * Enter description here ...
	 * @param $id
	 */
	public  function digui($id){
		$da=$this->index->role($id);			
			foreach ($da as $k=>$v){
				//$n=str_repeat("&nbsp&nbsp",$v['t']*2);		
				//echo  $n."|-".$v['name']."</br>";	
						$da[$k]['list']=$this->digui($v['id']);
						$b=$da;								
			}																											
		return $b;				
	}	
}