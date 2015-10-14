<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class videoHistory extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/videoHistory_model','videoHistory');	
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
		$data['name'] = $this->input->get('name');	
		$data['start_time'] = $this->input->get('start_time');	
		$data['end_time'] = $this->input->get('end_time');				
		$data['page'] = $this->input->get('page') ? $this->input->get('page'):0;			
		$this->load->library('pagination');
		$per=10;
		$data['total_rows']=count($this->videoHistory->getUserVideoHistory($data['status'],$data['type'],$data['level'],$data['name'],$data['start_time'],$data['end_time']));
		$config['base_url'] = site_url('admin/videoHistory/index/?status='.$data['status'].'&type='.$data['type'].'&level='.$data['level'].'&name='.$data['name'].'&start_time='.$data['start_time'].'&end_time='.$data['end_time']);//分页的路径
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
		$data['data']=$this->videoHistory->getUserVideoHistory($data['status'],$data['type'],$data['level'],$data['name'],$data['start_time'],$data['end_time']);
		//echo $this->db->last_query();
		$data['num']=$config['total_rows'];
		$this->load->view('admin/videoHistory/index_view',$data);
		
	}
	
	public  function delect(){
		$Id=$this->input->post('id');
		$rs=$this->videoHistory->delect($Id);						
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	public  function delectArray(){
		$arrayId=$this->input->post('arrayId');
		$dataId=explode('|',$arrayId);
		$rs=$this->videoHistory->delectArray($dataId);		
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}		
	}

}