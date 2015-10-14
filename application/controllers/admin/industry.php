<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Industry extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/industry_model','industry');	
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
		$data ['page'] = $this->input->get ('page') ? $this->input->get ('page' ):0;			
		$this->load->library('pagination');
		$per=10;
		$data['total_rows']=$this->industry->getIndustryClassNum();
		$config['base_url'] = site_url('admin/admin/index/');//分页的路径
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
		$data['data']=$this->industry->getIndustryClass();
		$data['user_num']=$config['total_rows'];
		$this->load->view('admin/industry/index_view',$data);
		
	}
	function  update(){	
		if($this->input->post('sub')){			
			$id=$this->input->post('id');				
			$data=array(
					'industryName'=>$this->input->post('industryName'),
					'status'=>$this->input->post('status'),
					'time'=>time(),
					'orderlist'=>$this->input->post('orderlist')														
				);		
			$st=$this->industry->update($id,$data);			
			if($st){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";				
			}else{
				echo "<script  type='text/javascript'>alert(1);</script>";
			}
		}else{
			$id=$this->input->get('id');
			$data['data']=$this->industry->getOne($id);								
			$this->load->view('admin/industry/update_view',$data);
		}	
		
	}	
	function  add(){
		if($this->input->post('sub')){		
			$data=array(
					'industryName'=>$this->input->post('industryName'),
					'status'=>$this->input->post('status'),
					'time'=>time(),
					'orderlist'=>$this->input->post('orderlist')
				);										
			$rs=$this->db->insert('industryclass', $data); 
			if($rs){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
			}else{
				echo "<script  type='text/javascript'>window.parent.location.reload();alert('添加失败');</script>";
			}
		}else{		
			$this->load->view('admin/industry/admin_view');
		}	
	}
	public  function delect(){
		$id=$this->input->post('id');
		$rs=$this->industry->delect($id);						
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	public  function delectArray(){
		$arrayId=$this->input->post('arrayId');
		$dataId=explode('|',$arrayId);
		$rs=$this->industry->delectArray($dataId);	
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}		
	}

}