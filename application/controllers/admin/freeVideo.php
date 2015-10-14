<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class FreeVideo extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/freevideo_model','freevideo');
		$this->load->model('admin/role_model','role');
		$this->load->helper('form');
		$this->load->library('form_validation');
		if($this->session->userdata('roleId')==""||$this->session->userdata('roleId')=='0'){
		echo "<script  type='text/javascript'>top.window.location.href=".site_url('admin/login/index')."</script>";
			
		}
	}
	function index(){			
		$this->config->set_item('url_suffix','');												
		$this->load->library('pagination');		
		$data['status'] = $this->input->get ('status') ? $this->input->get ( 'status' ):0;		
		$data['title'] = $this->input->get ('title' ) ? $this->input->get ('title' ):0;
		$data['start_time'] = $this->input->get('start_time');	
		$data['end_time'] = $this->input->get('end_time');		
		$data['page'] = $this->input->get ('page') ? $this->input->get ('page' ):0;			
		$this->load->library('pagination');
		$per=10;
		$data['total_rows']=$this->freevideo->getFreeVideoNum($data['status'],$data['title'],$data['start_time'],$data['end_time']);
		$config['base_url'] = site_url('admin/freeVideo/index/?status='.$data ['status'].'&start_time='.$data ['start_time'].'&end_time='.$data['end_time']);//分页的路径
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;	
		$config['query_string_segment'] = 'page';	
		$config['total_rows'] =$data['total_rows'];//
		$config['per_page'] = $per;
		$config['uri_segment']=$data['page'];
		$config['num_links'] = 3;
		$config['first_link'] = '第一页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['last_link'] = '最后一页';			
		$this->pagination->initialize($config); 	
		$data['links']= $this->pagination->create_links();
    	$offset=$data ['page'];  //偏移量	
    	$this->db->limit($per,$offset);    	    	 	   	
		$data['data']=$this->freevideo->getFreeVideo($data['status'],$data['title'],$data['start_time'],$data['end_time']);
		$data['num']=$config['total_rows'];
		$this->load->view('admin/freeVideo/index_view',$data);
		
	}
	function  update(){	
		if($this->input->post('sub')){
			if($_FILES['thumbnail']['size']){							
				 $config['upload_path'] = './uploads/freevideo/';
			  	 $config['allowed_types'] = 'gif|jpg|png';
			 	 $config['max_size'] = '10000';
			 	 $config['max_width']  = '1000';
			 	 $config['max_height']  ='1000' ;		  
			 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
			 	 $this->load->library('upload', $config);
			 	 $this->upload->do_upload("thumbnail");
				 $img=$this->upload->data();								 					 
				 $thumbnail=$img['file_name'];
				 unlink("uploads/resourceImg/".$this->input->post('thumbnail2'));								
			}else{
				 $thumbnail=$this->input->post('thumbnail2');
			}		
			$data=array(
					'title'=>$this->input->post('title'),
					'url'=>$this->input->post('url'),
					'status'=>$this->input->post('status'),
					'time'=>time(),
					'orderlist'=>$this->input->post('orderlist'),
					'abstract'=>$this->input->post('abstract'),
					'thumbnail'=>$thumbnail
				);
			$id=$this->input->post('id');	
			$st=$this->freevideo->updateFreeVideo($id,$data);
			if($st){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";				
			}else{
				echo "<script  type='text/javascript'>alert(1);</script>";
			}
		}else{
			$id=$this->input->get('id');
			$data['data']=$this->freevideo->getOneFreeVideo($id);									
			$this->load->view('admin/freeVideo/update_view',$data);
		}	
		
	}	
	function  add(){
		if($this->input->post('sub')){			
			if($_FILES['thumbnail']['size']){							
				 $config['upload_path'] = './uploads/freevideo/';
			  	 $config['allowed_types'] = 'gif|jpg|png';
			 	 $config['max_size'] = '10000';
			 	 $config['max_width']  = '1000';
			 	 $config['max_height']  ='1000' ;		  
			 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
			 	 $this->load->library('upload', $config);
			 	 $this->upload->do_upload("thumbnail");
				 $img=$this->upload->data();												 
				 $thumbnail=$img['file_name'];								
			}else{
				$thumbnail='0';
			}	
		
			$data=array(
					'title'=>$this->input->post('title'),
					'url'=>$this->input->post('url'),
					'status'=>$this->input->post('status'),
					'time'=>time(),
					'orderlist'=>$this->input->post('orderlist'),
					'abstract'=>$this->input->post('abstract'),
					'thumbnail'=>$thumbnail
				);							
			$rs=$this->db->insert('freeVideo', $data);
		
			if($rs){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
			}else{
				echo "<script  type='text/javascript'>window.parent.location.reload();alert('添加失败');</script>";
			}
		}else{			
			$this->load->view('admin/freeVideo/add_view');
		}	
	}
	public  function delect(){
		$adminId=$this->input->post('id');		
		$data['data']=$this->freevideo->getOneFreeVideo($id);
		unlink("uploads/resourceImg/".$data[0]['thumbnail']);
		$rs=$this->freevideo->delect($adminId);							
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	public  function delectArray(){
		$arrayId=$this->input->post('arrayId');
		$dataId=explode('|',$arrayId);
		$rs=$this->freevideo->delectArray($dataId);	
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}		
	}

}