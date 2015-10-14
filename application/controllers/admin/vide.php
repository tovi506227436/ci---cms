<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Vide extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/vide_model','vide');	
		$this->load->helper('form');
		$this->load->library('form_validation');
		/*if($this->session->userdata('roleId')==""||$this->session->userdata('roleId')=='0'){
		  		echo "<script  type='text/javascript'>top.window.location.href=".site_url('admin/login/index')."</script>";
			
		}*/
	}
	function index(){
		$this->config->set_item('url_suffix','');												
		$this->load->library('pagination');		
		$this->config->set_item('url_suffix','');
		$data['status'] = $this->input->get('status');		
		$data['title'] = $this->input->get('title');
		$data['classId'] = $this->input->get('classId');	
		$data['start_time'] = $this->input->get('start_time');	
		$data['end_time'] = $this->input->get('end_time');				
		$data['page'] = $this->input->get('page') ? $this->input->get('page'):0;			
		$this->load->library('pagination');
		$per=10;
		$data['total_rows']=count($this->vide->getVide($data['status'],$data['classId'],$data['title'],$data['start_time'],$data['end_time']));
		$config['base_url'] = site_url('admin/vide/index/?status='.$data['status'].'&title='.$data['title'].'&classId='.$data['classId'].'&start_time='.$data['start_time'].'&end_time='.$data['end_time']);//分页的路径		
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
		$data['data']=$this->vide->getVide($data['status'],$data['classId'],$data['title'],$data['start_time'],$data['end_time']);
		$data['num']=$config['total_rows'];	
		$data['industry']=$this->getIndustryClass();
		$IndustryClass=array();
		foreach ($data['industry'] as $k=>$v){
			$IndustryClass[$v['id']]=$v['industryName'];
		}
		$data['IndustryClass']=$IndustryClass;
		$this->load->view('admin/vide/index_view',$data);
		
	}
	function  update(){	
		if (!empty($_FILES['Filedata'])) {	
			$path = "uploads/video/";
			//得到上传的临时文件流
			$tempFile = $_FILES['Filedata']['tmp_name'];	
			//允许的文件后缀
			$fileTypes = array('mp4'); 	
			//得到文件原名
			//$fileName = iconv("UTF-8","GB2312",$_FILES["Filedata"]["name"]);
			$fileName=time().'.mp4';
			$fileParts = pathinfo($_FILES['Filedata']['name']);	
			//接受动态传值
			$files=$_POST['typeCode'];	
			//最后保存服务器地址
			if(!is_dir($path))
			   mkdir($path);
			if (move_uploaded_file($tempFile, $path.$fileName)){
				$videoUrl=$fileName;
				echo '上传成功！ '.$fileName;
			}else{
				$videoUrl=0;
				echo '上传失败！ '.'0';
			}
		}elseif($this->input->post('sub')){			
			$id=$this->input->post('id');		
			if($_FILES['coverUrl']['size']>0){								
				 $config['upload_path'] = './uploads/video/';
			  	 $config['allowed_types'] = 'gif|jpg|png';
			 	 $config['max_size'] = '1000';
			 	 $config['max_width']  = '1500';
			 	 $config['max_height']  ='1500' ;		  
			 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
			 	 $this->load->library('upload', $config);
			 	 $this->upload->do_upload("coverUrl");
				 $img=$this->upload->data();
				 
				 //水印 
				$this->load->library('image_lib'); 			 
				$shuiyin['source_image'] = './uploads/video/'.$img['file_name'];
				$shuiyin['wm_overlay_path'] ='./uploads/watermarkImg.png';
				$shuiyin['wm_type'] = 'overlay';
				$shuiyin['wm_vrt_alignment'] = 'bottom';
				$shuiyin['wm_hor_alignment'] = 'right';
				$shuiyin['wm_padding'] = '20';
				$shuiyin['wm_vrt_offset'] = '20';					
				$this->image_lib->initialize($shuiyin); 				
				$this->image_lib->watermark();			
				 
				 if($this->upload->display_errors()){
				 	 $this->session->set_flashdata('coverUrlError',$this->upload->display_errors());
				 	 redirect ('admin/vide/update?id='.$id);				 	
			   		 return false;	
				 }else{
				 	 $coverUrl=$img['file_name'];
				 	  unlink("uploads/video/".$this->input->post('coverUrl2',true));	
				 } 		 					 					 											
			}else{
				 $coverUrl=$this->input->post('coverUrl2',true);
			}
			$videoUrlData=$this->input->post('videoUrl');
			$videoArray=explode(' ',$videoUrlData);	
			
			$data=array(
				'title'=>trim($this->input->post('title',true)),			
				'classId'=>trim($this->input->post('classId',true)),
				'status'=>trim($this->input->post('status',true)),
				'orderlist'=>trim($this->input->post('orderlist',true)),
				'abstract'=>trim($this->input->post('abstract')),
				'resourceClass'=>trim($this->input->post('resourceClass')),												
				'time'=>time(),
				'videoUrl'=>$videoArray['1']?$videoArray['1']:$this->input->post('videoUrl',true),
				'coverUrl'=>$coverUrl						
			);	
						
			$id=$this->input->post('id',true);		
			$st=$this->vide->update($id,$data);
			if($st){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";				
			}else{
				echo "<script  type='text/javascript'>alert(修改失败);</script>";
			}
		}else{		 
			$id=$this->input->get('id');
			$data['data']=$this->vide->getOne($id);
			$data['industry']=$this->getIndustryClass();
			$data['resourceClass']=$this->resourceClass(0);							
			$this->load->view('admin/vide/update_view',$data);
		}			
	}	
	function  add(){
		if (!empty($_FILES['Filedata'])) {	
			$path = "uploads/video/";
			//得到上传的临时文件流
			$tempFile = $_FILES['Filedata']['tmp_name'];	
			//允许的文件后缀
			$fileTypes = array('mp4'); 	
			//得到文件原名
			//$fileName = iconv("UTF-8","GB2312",$_FILES["Filedata"]["name"]);
			$fileName=time().'.mp4';
			$fileParts = pathinfo($_FILES['Filedata']['name']);	
			//接受动态传值
			$files=$_POST['typeCode'];	
			//最后保存服务器地址
			if(!is_dir($path))
			   mkdir($path);
			if (move_uploaded_file($tempFile, $path.$fileName)){
				$videoUrl=$fileName;
				echo '上传成功！ '.$fileName;
			}else{
				$videoUrl=0;
				echo '上传失败！ '.'0';
			}
		}elseif($this->input->post('sub')){			
			if ($_FILES['coverUrl']['size']=='0'){
				$this->session->set_flashdata('title',$data['title']);	
				$this->session->set_flashdata('coverUrlError', '视频封面不可为空');				
			    redirect ('admin/vide/add');
			    return false;			
			}										
			if($_FILES['coverUrl']['size']>0){								
				 $config['upload_path'] = './uploads/video/';
			  	 $config['allowed_types'] = 'gif|jpg|png';
			 	 $config['max_size'] = '10000000000';
			 	 $config['max_width']  = '1500';
			 	 $config['max_height']  ='1500' ;		  
			 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
			 	 $this->load->library('upload', $config);
			 	 $this->upload->do_upload("coverUrl");
				 $img=$this->upload->data();						 
				//水印 
				$this->load->library('image_lib'); 			 
				$shuiyin['source_image'] = './uploads/video/'.$img['file_name'];
				$shuiyin['wm_overlay_path'] ='./uploads/watermarkImg.png';
				$shuiyin['wm_type'] = 'overlay';
				$shuiyin['wm_vrt_alignment'] = 'bottom';
				$shuiyin['wm_hor_alignment'] = 'right';
				$shuiyin['wm_padding'] = '20';
				$shuiyin['wm_vrt_offset'] = '20';					
				$this->image_lib->initialize($shuiyin); 				
				$this->image_lib->watermark();			 					 
				$coverUrl=$img['file_name'];			 
				 if($this->upload->display_errors()){
				 	 $this->session->set_flashdata('coverUrlError',$this->upload->display_errors());
				 	 redirect ('admin/vide/add');				 	
			   		 return false;	
				 }	 				 					 											
			 }else{
				 $coverUrl='0';
			}	
			$videoUrlData=$this->input->post('videoUrl',true);
			$videoArray=explode(' ',$videoUrlData);			
			$data=array(
				'title'=>trim($this->input->post('title',true)),			
				'classId'=>trim($this->input->post('classId',true)),
				'status'=>trim($this->input->post('status',true)),
				'orderlist'=>trim($this->input->post('orderlist',true)),
				'abstract'=>trim($this->input->post('abstract')),
			    'resourceClass'=>trim($this->input->post('resourceClass')),													
				'time'=>time(),
				'coverUrl'=>$coverUrl,
				'videoUrl'=>$videoArray['1']
							
			);
			$rs=$this->db->insert('video', $data);			
			if($rs){
				//echo "<script  type='text/javascript'>layui-layer-iframe1</script>";
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";					
			}else{
				echo "<script  type='text/javascript'>alert('添加失败，请重试');</script>";
			}
		}else{
			$data['industry']=$this->getIndustryClass();
			$data['resourceClass']=$this->resourceClass(0);
			//dump($data['resourceClass']);					
			$this->load->view('admin/vide/add_view',$data);
		}	
	}
	function getIndustryClass(){
		$data=$this->vide->getIndustryClass();
		return $data;
	}
	public  function delect(){
		$Id=$this->input->post('id');
		$data=$this->vide->getOne($Id);
		unlink("uploads/video/".$data[0]['coverUrl']);
		unlink("uploads/video/".$data[0]['videoUrl']);	
		$rs=$this->vide->delect($Id);						
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	public  function delectArray(){
		$arrayId=$this->input->post('arrayId');
		$dataId=explode('|',$arrayId);
		$rs=$this->vide->delectArray($dataId);		
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}		
	}
	public  function resourceClass($pid){		
		$da=$this->vide->getResourceClass($pid);			
			foreach ($da as $k=>$v){
				if($this->resourceClass($v['id'])){			
					$da[$k]['list']=$this->resourceClass($v['id']);					
				}								
			};																										
		return $da;				
	}

}