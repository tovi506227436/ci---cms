<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Download extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/download_model','download');		
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
		$data['status'] = $this->input->get('status')?$this->input->get('status'):0;		
		$data['title'] = $this->input->get('title');				
		$data['page'] = $this->input->get('page') ? $this->input->get('page'):0;				
		$this->load->library('pagination');
		$per=10;
		$data['total_rows']=count($this->download->getDownload($data['status'],$data['title']));
		$config['base_url'] = site_url('admin/user/index/?status='.$data['status'].'&title='.$data['title']);//分页的路径
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
		$data['data']=$this->download->getDownload($data['status'],$data['title']);
		//echo $this->db->last_query();
		$data['num']=$config['total_rows'];
		//dump($data['data']);
		$this->load->view('admin/download/index_view',$data);
		
	}
	function add(){
		if($this->input->post('sub',true)){
			 $config['upload_path'] = './uploads/dataEXE/';	
			 $config['allowed_types'] = 'xls|pdf|xlsx';		  
		 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
		 	 $this->load->library('upload', $config);
		 	 $this->upload->do_upload("dataxls");
			 $img=$this->upload->data();							 	 					 	
			 $data=array(
				'orderlist'=>$this->input->post('orderlist',true),
				'title'=>$this->input->post('title',true),
				'status'=>$this->input->post('status',true),
				'url'=>$img['file_name'],
				'time'=>time()
			);
		    $is=$this->download->addDownload($data);
			if($rs){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
			}else{
				echo "<script  type='text/javascript'>window.parent.location.reload();alert('添加失败');</script>";
			}
		   
		}
		$this->load->view('admin/download/add_view',$data);
	
	}
    function update(){
    	if($this->input->post('sub',true)){   		   		
    		$data=array(
    			  'title'=>$this->input->post('title',true),
    			  'status'=>$this->input->post('status',true),
    			  'orderlist'=>$this->input->post('orderlist',true),
    		
    		);
    		if($_FILES['dataxls']['error']=='0'){
	    		 $config['upload_path'] = './uploads/dataEXE/';	
				 $config['allowed_types'] = 'xls|pdf|xlsx';		  
			 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
			 	 $this->load->library('upload', $config);
			 	 $this->upload->do_upload("dataxls");
				 $img=$this->upload->data();
				 $data['url']=$img['file_name'];
				 unlink("uploads/dataEXE/".$this->input->post('exl',true));
    		}   		 
    		$id=$this->input->post('id',true);
    		$rs=$this->download->update($id,$data);
    		if($rs){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
			}else{
				echo "<script  type='text/javascript'>window.parent.location.reload();alert('修改失败');</script>";
			}
    		
    	}    	
    	$id=$this->input->get('id',true);
    	$data['data']=$this->download->getOneDownload($id,$data);
    
    	$this->load->view('admin/download/update_view',$data);
    }

	
	public  function delect(){
		$adminId=$this->input->post('id');
		$rs=$this->download->delect($adminId);						
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	public  function delectArray(){
		$arrayId=$this->input->post('arrayId');
		$dataId=explode('|',$arrayId);
		$rs=$this->download->delectArray($dataId);	
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}		
	}

}