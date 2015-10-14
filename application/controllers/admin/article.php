<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Article extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/article_model','article');	
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
		$data['title'] = $this->input->get('title' );
		$data['top'] = $this->input->get('top' );
		$data['classId'] = $this->input->get('classId');	
		$data['start_time'] = $this->input->get('start_time');	
		$data['end_time'] = $this->input->get('end_time');				
		$data['page'] = $this->input->get('page') ? $this->input->get('page'):0;			
		$this->load->library('pagination');
		$per=10;
		$data['total_rows']=count($this->article->getArticle($data['status'],$data['classId'],$data['title'],$data['top'],$data['start_time'],$data['end_time']));		
		$config['base_url'] = site_url('admin/article/index/?status='.$data['status'].'&title='.$data['title'].'&top='.$data['top'].'&classId='.$data['classId'].'&start_time='.$data['start_time'].'&end_time='.$data['end_time']);//分页的路径

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
		$data['data']=$this->article->getArticle($data['status'],$data['classId'],$data['title'],$data['top'],$data['start_time'],$data['end_time']);
		$data['num']=$config['total_rows'];
		$data['resourcePidData']=$this->article->getResourcePidData(0);		
		$data['resourceClass']=$this->resourceClass(0);		
		$resourceData=array();
		foreach ($data['resourcePidData'] as $k=>$v){
			$resourceData[$v['id']]=$v['name'];
		}
		$data['resourceData']=$resourceData;		
		$this->load->view('admin/article/index_view',$data);
		
		
		
	}
	function  updateArticle(){	
		if($this->input->post('sub')){	
			$id=$this->input->post('id');		
			if($_FILES['thumbnail']['size']){							
				 $config['upload_path'] = './uploads/resourceImg/';
			  	 $config['allowed_types'] = 'gif|jpg|png';
			 	 $config['max_size'] = '10000';
			 	 $config['max_width']  = '1500';
			 	 $config['max_height']  ='1500' ;		  
			 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
			 	 $this->load->library('upload', $config);
			 	 $this->upload->do_upload("thumbnail");
				 $img=$this->upload->data();
				 $thumbnail=$img['file_name'];				
				 //水印
				/*
			 	$this->load->library('image_lib'); 			 
				$shuiyin['source_image'] = './uploads/resourceImg/'.$img['file_name'];
				$shuiyin['wm_overlay_path'] ='./uploads/watermarkImg.png';
				$shuiyin['wm_type'] = 'overlay';
				$shuiyin['wm_vrt_alignment'] = 'bottom';
				$shuiyin['wm_hor_alignment'] = 'right';
				$shuiyin['wm_padding'] = '20';				
				$this->image_lib->initialize($shuiyin); 				
				$this->image_lib->watermark();			 					 
				$thumbnail=$img['file_name'];*/
					
	 		 								
			}else{
				$thumbnail=$this->input->post('thumbnail2');
			}				
			$data=array(
					'title'=>$_POST['title'],
					'content'=>$_POST['content'],
					'status'=>$this->input->post('status'),
					'top'=>$this->input->post('top'),
					'time'=>time(),
					'orderlist'=>$this->input->post('orderlist'),
					'classId'=>$this->input->post('classId'),		
					'abstract'=>$this->input->post('abstract'),
					'source'=>$this->input->post('source'),
					'ReadingNumber'=>$this->input->post('ReadingNumber'),
					'member'=>$this->input->post('member'),
					'thumbnail'=>$thumbnail										
			);				
			$st=$this->article->update($id,$data);	
	
			if($st){
				redirect ('admin/article/index');
				//echo "<script  type='text/javascript'>window.parent.location.reload();</script>";				
			}else{
				echo "<script  type='text/javascript'>alert('添加失败');</script>";
			}
		}else{
			$id=$this->input->get('id');
			$data['data']=$this->article->getOne($id);
			$data['resourceClass']=$this->resourceClass(0);								
			$this->load->view('admin/article/update_view',$data);
		}			
	}	
	function  add(){
		if($this->input->post('sub')){	
					
			if($_FILES['thumbnail']['size']){							
				 $config['upload_path'] = './uploads/resourceImg/';
			  	 $config['allowed_types'] = 'gif|jpg|png';
			 	 $config['max_size'] = '10000';
			 	 $config['max_width']  = '1500';
			 	 $config['max_height']  ='1500' ;		  
			 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
			 	 $this->load->library('upload', $config);
			 	 $this->upload->do_upload("thumbnail");
				 $img=$this->upload->data();
				 $thumbnail=$img['file_name'];				
				 //水印				 				 
				  if($this->input->post('watermark')=='1'){
			 		 	$this->load->library('image_lib'); 			 
						$shuiyin['source_image'] = './uploads/resourceImg/'.$img['file_name'];
						$shuiyin['wm_overlay_path'] ='./uploads/watermarkImg.png';
						$shuiyin['wm_type'] = 'overlay';
						$shuiyin['wm_vrt_alignment'] = 'bottom';
						$shuiyin['wm_hor_alignment'] = 'right';
						$shuiyin['padding'] = '20';	
						$shuiyin['wm_vrt_offset'] = '20';
						$shuiyin['wm_opacity'] = '70';
																
						$this->image_lib->initialize($shuiyin); 				
						$this->image_lib->watermark();			 					 
						$thumbnail=$img['file_name'];	
				  }							
			}else{
				$thumbnail='0';
			}	
			$data=array(
					'title'=>$this->input->post('title'),
					'content'=>$_POST['content'],
					'status'=>$this->input->post('status'),
					'top'=>$this->input->post('top'),
					'time'=>time(),
					'orderlist'=>$this->input->post('orderlist'),
					'classId'=>$this->input->post('classId'),		
					'abstract'=>$this->input->post('abstract'),
					'source'=>$this->input->post('source'),					
					'member'=>$this->input->post('member'),
					'thumbnail'=>$thumbnail										
			);
			if($data['title']==""){
				$this->session->set_flashdata('content',$data['content']);
				$this->session->set_flashdata('title', $data['title']);
				$this->session->set_flashdata('classId', $data['classId']);
				$this->session->set_flashdata('title2', '标题不可为空');				
				redirect ('admin/article/add');
			}
			if($data['classId']=='-1'){	
				$this->session->set_flashdata('content',$data['content']);
				$this->session->set_flashdata('title', $data['title']);
				$this->session->set_flashdata('classId', $data['classId']);
				$this->session->set_flashdata('classId2', '*请选择文章分类');
				redirect ('admin/article/add');
			}			
			if($data['content']==""){
					$this->session->set_flashdata('content',$data['content']);
					$this->session->set_flashdata('title', $data['title']);
					$this->session->set_flashdata('classId', $data['classId']);
					$this->session->set_flashdata('content2','*正文不得为空');
					redirect ('admin/article/add');
				}														
			$rs=$this->db->insert('article', $data);			
			if($rs){
				redirect ('admin/article/index');
				//echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
			}else{
				//echo "<script  type='text/javascript'>window.parent.location.reload();alert('添加失败');</script>";
			}
		}else{
			$data['resourceClass']=$this->resourceClass(0);				
			$this->load->view('admin/article/add_view',$data);
		}	
	}
	public  function resourceClass($pid){		
		$da=$this->article->getResourceClass($pid);			
			foreach ($da as $k=>$v){
				if($this->resourceClass($v['id'])){			
					$da[$k]['list']=$this->resourceClass($v['id']);					
				}								
			};																										
		return $da;				
	}
	public  function delect(){
		$Id=$this->input->post('id');
		$data=$this->article->getOne($Id);
		$rs=$this->article->delect($Id);				
		unlink("uploads/resourceImg/".$data[0]['thumbnail']);						
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	public  function delectArray(){
		$arrayId=$this->input->post('arrayId');
		$dataId=explode('|',$arrayId);
		$data=$this->article->getInData($dataId);
		foreach ($data as $k=>$v){
			unlink("uploads/resourceImg/".$v['thumbnail']);	
		}
		$rs=$this->article->delectArray($dataId);		
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}		
	}

}