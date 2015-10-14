<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class User extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/user_model','user');	
		$this->load->helper('form');
		$this->load->library('form_validation');
		if($this->session->userdata('roleId')==""||$this->session->userdata('roleId')=='0'){
		  		echo "<script  type='text/javascript'>top.window.location.href=".site_url('admin/login/index')."</script>";
			
		}
	}
	function index(){
		$this->config->set_item('url_suffix','');												
		$this->load->library('pagination');		
		$this->config->set_item('url_suffix','');
		$data['status'] = $this->input->get('status');		
		$data['type'] = $this->input->get('type');
		$data['level'] = $this->input->get('level');
		$data['examine'] = $this->input->get('examine');		
		$data['name'] = $this->input->get('name');
		$data['companyName'] = $this->input->get('companyName');	
		$data['start_time'] = $this->input->get('start_time');	
		$data['end_time'] = $this->input->get('end_time');				
		$data['page'] = $this->input->get('page') ? $this->input->get('page'):0;			
		$this->load->library('pagination');
		$per=10;
		$data['total_rows']=$this->user->getUserNum($data['status'],$data['type'],$data['level'],$data['examine'],$data['name'],$data['companyName'],$data['start_time'],$data['end_time']);
		$config['base_url'] = site_url('admin/user/index/?status='.$data['status'].'&type='.$data['type'].'&level='.$data['level'].'&examine='.$data['examine'].'&name='.$data['name'].'&start_time='.$data['start_time'].'&end_time='.$data['end_time']);//分页的路径
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;	
		$config['query_string_segment'] = 'page';	
		$config['total_rows'] =$data ['total_rows'];//
		$config['per_page'] = $per;
		$config['uri_segment']=$data ['page'];
		$config['num_links'] = 3;
		$config['first_link'] = '第一页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['last_link'] = '最后一页';			
		$this->pagination->initialize($config); 	
		$data['links']= $this->pagination->create_links();
    	$offset=$data ['page'];  //偏移量	
    	$this->db->limit($per,$offset);    	    	 	   	
		$data['data']=$this->user->getUser($data['status'],$data['type'],$data['level'],$data['examine'],$data['name'],$data['companyName'],$data['start_time'],$data['end_time']);
		//echo $this->db->last_query();
		$data['num']=$config['total_rows'];

		$this->load->view('admin/user/index_view',$data);
		
	}
	function  updateUser(){	
		if($this->input->post('sub')){			
			$id=$this->input->post('id');

			if(strlen($this->input->post('pwd'))=='32'){
				$pwd=$this->input->post('pwd');	
			}else{
				$pwd=md5($this->input->post('pwd'));
			}
			
			$data=array(					
					'name'=>trim($this->input->post('name')),
					'pwd'=>$pwd,
					'status'=>trim($this->input->post('status')),
					'level'=>trim($this->input->post('level')),
					'type'=>trim($this->input->post('type')),
					'companyName'=>trim($this->input->post('companyName')),
					'contact'=>trim($this->input->post('contact')),
					'companyProfile'=>trim($this->input->post('companyProfile')),
					'companyAddress'=>trim($this->input->post('companyAddress')),
					'examine'=>trim($this->input->post('examine')),			
				);
			$st=$this->user->update($id,$data);			
			if($st){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";				
			}else{
				echo "<script  type='text/javascript'>alert(1);</script>";
			}
		}else{
			$id=$this->input->get('id');
			$data['data']=$this->user->getOne($id);
			$data['industry']=$this->industryClass();										
			$this->load->view('admin/user/update_view',$data);
		}			
	}	
	function  add(){
		if($this->input->post('sub')){	
			$data=array(
					'name'=>trim($this->input->post('name')),
					'pwd'=>trim(md5($this->input->post('pwd'))),
					'status'=>trim($this->input->post('status')),
					'level'=>trim($this->input->post('level')),
					'type'=>trim($this->input->post('type')),
					'time'=>time(),
					'companyName'=>trim($this->input->post('companyName')),
					'contact'=>trim($this->input->post('contact')),
					'companyProfile'=>trim($this->input->post('companyProfile')),
					'companyAddress'=>trim($this->input->post('companyAddress')),
					'industryClass'=>trim($this->input->post('industryClass'))					
				);				
			$rs=$this->db->insert('user', $data);
			if($rs){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
			}else{
				echo "<script  type='text/javascript'>window.parent.location.reload();alert('添加失败');</script>";
			}
		}else{
			$data['data']=$this->industryClass();
			//dump($data);
			$this->load->view('admin/user/admin_view',$data);
		}	
	}
	public  function industryClass(){
		$data=$this->user->getIndustryClass();
		return  $data;
	
	}
	public  function delect(){
		$Id=$this->input->post('id');
		$rs=$this->user->delect($Id);						
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	public  function delectArray(){
		$arrayId=$this->input->post('arrayId');
		$dataId=explode('|',$arrayId);
		$rs=$this->user->delectArray($dataId);		
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}		
	}
	
	public function videocomplete(){
		$userId=$this->input->get('userId',true);
		$data['data']=$this->user->videocompleteData($userId);
		//dump($data);
		$this->load->view('admin/user/videocomplete_view',$data);		
	}
}