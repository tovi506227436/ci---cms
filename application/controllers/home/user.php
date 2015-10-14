<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class User extends MY_Controller  {
	function __construct() {
		parent::__construct ();
		$this->load->model('index/login_model','login');
		$this->load->model('index/index_model','index');
		$this->load->model('index/user_model','user');
		if(get_cookie('userID')==""){
			alertPrompt('请先登陆',site_url('index'));						
		}
		$sessId=$this->user->getSession(get_cookie('userID'));
		if($sessId['0']['sessId']!=session_id()){
			$this->session->sess_destroy();
			alertPrompt('该账号在异地登陆',site_url('index'));						
		}								
	}	
	function  index(){	
		$index=$this->userPublic();
		$index['userData']=$this->user->getOneUser(get_cookie('userID'));
		$index['enterpriseImg']=$this->user->getUserEnterpriseImg(get_cookie('userID'));
		$index['productImg']=$this->user->getUserProductImg(get_cookie('userID'));
		$this->load->view('home/user/enterpriseIndex_view',$index);	
	}	
	function  ChangePwd(){
		$index=$this->userPublic();
		$this->load->view('home/user/pwd_view',$index);	
	}
	function checkPwd(){
		$pwd=$this->input->post('pwd',true);
		$id=get_cookie('userID');
		$data=$this->user->isPwd($id,md5($pwd));
		if($data){
			echo '1';
		}else{
			echo '-1';
		}
	}
	
	function modifyPwd(){
		$pwd=$this->input->post('pwd2',true);
		$id=get_cookie('userID');
		$update=array('pwd'=>md5($pwd));
		$is=$this->user->changePwd($id,$update);		
		if($is){
			echo '1';
		}else{
			echo '-1';
		}
	}
	function changeData(){
		$id=get_cookie('userID');
		$companyProfile=$this->input->post('companyProfile',true);
		$corporation=$this->input->post('corporation',true);
		$email=$this->input->post('email',true);
		$companyAddress=$this->input->post('companyAddress',true);
		$update=array(
			'companyProfile'=>$companyProfile,
			'corporation'=>$corporation,
			'email'=>$email,
			'companyAddress'=>$companyAddress	
		);
		$is=$this->user->changePwd($id,$update);		
		if($is){
			Success_jump('修改成功',3,site_url('user_changepwd'.'/'.$id));				
		}else{
			echo "<script  type='text/javascript'>alert('修改失败');</script>";	
		}

	
	}
	
	function userHistory(){
		$index=$this->userPublic();
		$index['userArticleHistory']=$this->user->userArticleHistory(get_cookie('userID'));
		$index['userVideoHistory']=$this->user->userVideoHistory(get_cookie('userID'));
		//dump($index['userVideoHistory']);
		$this->load->view('home/user/lishi_view',$index);	
	}
	
	
	function picture(){
		$index=$this->userPublic();
		$index['enterpriseImg']=$this->user->getUserEnterpriseImg(get_cookie('userID'));
		$index['productImg']=$this->user->getUserProductImg(get_cookie('userID'));
		$this->load->view('home/user/pic_view',$index);	
	}
	
	function enterpriseImg(){
		$id=get_cookie('userID');
		$numImg=$this->user->enterpriseImgNum($id);
		if($this->input->post('sub',true)){	
			if ($numImg <9){	
				 $config['upload_path'] = './uploads/enterpriseImg/';
			  	 $config['allowed_types'] = 'gif|jpg|png';
			 	 $config['max_size'] = '1500';
			 	 $config['max_width']  = '1500';
			 	 $config['max_height']  ='1500' ;		  
			 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
			 	 $this->load->library('upload', $config);
			 	 $this->upload->do_upload("enterprise");
				 $img=$this->upload->data();				
				 //水印
			  	$this->load->library('image_lib'); 			 
				$shuiyin['source_image'] = './uploads/enterpriseImg/'.$img['file_name'];
				$shuiyin['wm_overlay_path'] ='./uploads/watermarkImg.jpg';
				$shuiyin['wm_type'] = 'overlay';
				$shuiyin['wm_vrt_alignment'] = 'bottom';
				$shuiyin['wm_hor_alignment'] = 'right';
				$shuiyin['wm_padding'] = '20';				
				$this->image_lib->initialize($shuiyin); 				
				$this->image_lib->watermark();			 					 

				if($this->upload->display_errors()){
					$this->session->set_flashdata('enterpriseImgError', $this->upload->display_errors());
					$this->load->view('home/user/pic_view',$index);
				}				
				$data=array(
					'userId'=>$id,
					'enterpriseImg'=>$img['file_name'],
					'time'=>time()
				);
			   $isResourceImg=$this->user->addEnterprise($data);
			   if($isResourceImg){
			   	 redirect ('user_picture/'.$id);
			   }else{ 
			     echo "<script  type='text/javascript'>alert('上传失败请重试');</script>";
			   }
			}elseif ($numImg == 9){
				$this->session->set_flashdata('enterpriseImgError', '每位用户最多可上传企业照片九张！');
				redirect('user_picture'.'/'.$id);
			}
		}
	}
	
	function productImg(){
		$id=get_cookie('userID');
		$numImg=$this->user->productImgNum($id);
		if($this->input->post('sub',true)){	
			if ($numImg <9){	
				 $config['upload_path'] = './uploads/productImg/';
			  	 $config['allowed_types'] = 'gif|jpg|png';
			 	 $config['max_size'] = '1500';
			 	 $config['max_width']  = '1500';
			 	 $config['max_height']  ='1500' ;		  
			 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
			 	 $this->load->library('upload', $config);
			 	 $this->upload->do_upload("productImg");
				 $img=$this->upload->data();				
				 //水印
			  	$this->load->library('image_lib'); 			 
				$shuiyin['source_image'] = './uploads/productImg/'.$img['file_name'];
				$shuiyin['wm_overlay_path'] ='./uploads/watermarkImg.jpg';
				$shuiyin['wm_type'] = 'overlay';
				$shuiyin['wm_vrt_alignment'] = 'bottom';
				$shuiyin['wm_hor_alignment'] = 'right';
				$shuiyin['wm_padding'] = '20';				
				$this->image_lib->initialize($shuiyin); 				
				$this->image_lib->watermark();			 					 

				if($this->upload->display_errors()){
					$this->session->set_flashdata('productImgError', $this->upload->display_errors());
					$this->load->view('home/user/pic_view',$index);
				}				
				$data=array(
					'userId'=>$id,
					'productImg'=>$img['file_name'],
					'time'=>time()
				);
			   $isResourceImg=$this->user->addProduct($data);
			   if($isResourceImg){
			   	 redirect ('user_picture/'.$id);
			   }else{ 
			     echo "<script  type='text/javascript'>alert('上传失败请重试');</script>";
			   }
			}elseif ($numImg == 9){
				$this->session->set_flashdata('productImgError', '每位用户最多可上传企业照片九张！');
				redirect('user_picture'.'/'.$id);
			}
		}
	}
	function log(){
		 $config['upload_path'] = './uploads/log/';
	  	 $config['allowed_types'] = 'gif|jpg|png';
	 	 $config['max_size'] = '1500';
	 	 $config['max_width']  = '1500';
	 	 $config['max_height']  ='1500' ;		  
	 	 $config['file_name']  = time().mt_rand(1000,999);		  		 
	 	 $this->load->library('upload', $config);
	 	 $this->upload->do_upload("log");
		 $img=$this->upload->data();				
		 //水印
	  	$this->load->library('image_lib'); 			 
		$shuiyin['source_image'] = './uploads/log/'.$img['file_name'];
		$shuiyin['wm_overlay_path'] ='./uploads/watermarkImg.jpg';
		$shuiyin['wm_type'] = 'overlay';
		$shuiyin['wm_vrt_alignment'] = 'bottom';
		$shuiyin['wm_hor_alignment'] = 'right';
		$shuiyin['wm_padding'] = '20';				
		$this->image_lib->initialize($shuiyin); 				
		$this->image_lib->watermark();			 					 

		if($this->upload->display_errors()){
			$this->session->set_flashdata('logError', $this->upload->display_errors());
			$this->load->view('home/user/pic_view',$index);
		}				
		$data=array(
			'logImg'=>$img['file_name']					
		);
	   $isResourceImg=$this->user->log(get_cookie('userID'),$data);
	   if($isResourceImg){
	   	 redirect ('user_picture/'.get_cookie('userID'));
	   }else{ 
	     echo "<script  type='text/javascript'>alert('上传失败请重试');</script>";
	   }
	
	
	}
	
	function delectImg(){
		$id=$this->input->post('id');
		$img=$this->input->post('img');
		$rs=$this->user->delect('enterpriseImg',$id);
		if($rs){
			unlink("uploads/enterpriseImg/".$img);
			echo '1';
		}else{
			echo '-1';
		}
	}
	
	function delectProductImg(){
		$id=$this->input->post('id');
		$img=$this->input->post('img');
		$rs=$this->user->delect('productImg',$id);
		if($rs){
			unlink("uploads/productImg/".$img);
			echo '1';
		}else{
			echo '-1';
		}
	}
	
	
	function  download(){
		$index=$this->userPublic();
		//$this->config->set_item('url_suffix','');	
		$index['downloadData']=$this->user->getDownload();
		$this->load->view('home/user/download_view',$index);	
	}
	function  userPublic(){
		$index['bottonNav']=$this->bottonNav();//底部导航
		$id=get_cookie('userID');//获取用户id;
		$index['userData']=$this->user->getOneUser($id);
		$index['videoCompleteNum']=$this->user->getVideoCompleteNum(get_cookie('userID'));
		return $index;
	}
	
	function downloadEXE(){
		header("Content-type: application/xls; charset=utf-8"); 
		$url=$this->uri->segment(2);  //id
		//$title=$this->uri->segment(3); 	
		
		$filename = base_url('uploads/dataEXE/'.$url);	
		//文件的类型 
		//header('Content-type: application/xls'); 
		//下载显示的名字 
		header("Content-Disposition: attachment; filename=$url"); 
		readfile("$filename"); 
		exit(); 
	}
	
}