<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Resource extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/resource_model','resourceClass');
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
		$data['page'] = $this->input->get('page') ? $this->input->get('page'):0;			
		$this->load->library('pagination');
		$per=10;
		$data['total_rows']=count($this->digui(0));
		$config['base_url'] = site_url('admin/article/index/');//分页的路径
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
		$data['data']=$this->digui(0);
		//echo $this->db->last_query();
		$data['num']=$config['total_rows'];
		//dump($data['data']);
		$this->load->view('admin/resource/index_view',$data);						
	}
	public  function digui($pid){
		$da=$this->resourceClass->getResourceClass($pid);			
			foreach ($da as $k=>$v){
				if($this->digui($v['id'])){			
					$da[$k]['list']=$this->digui($v['id']);					
				}								
			};																										
		return $da;		
	}	
	function  update(){	
		if($this->input->post('sub')){		
			$id=$this->input->post('id');				
			$data=array(
					'name'=>$this->input->post('name'),
					'orderlist'=>$this->input->post('orderlist'),
					'status'=>$this->input->post('status'),
					'pid'=>0,
					'time'=>time()					
				);		
			$st=$this->resourceClass->update($id,$data);
			
			//子类修改
			$childName=$this->input->post('childName');
			$orderlistPid=$this->input->post('orderlistPid');
			$childId=$this->input->post('childId');		
			
			$t=array();
			$picType=array();
			foreach ($childId as $k=>$v){
				$t[]=$this->input->post($a='t'.$v);
				$picType[]=$this->input->post($a='picType'.$v);
			}

			foreach ($childId as $k=>$v){
				$chlid=$this->resourceClass->update($v,array('name'=>$childName[$k],
															 'orderlist'=>$orderlistPid[$k],
															 't'=>$t[$k],
															 'picType'=>$picType[$k]	
															)
													);
			}
			if($st){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";				
			}else{
				echo "<script  type='text/javascript'>alert(1);</script>";
			}
		}else{
			$id=$this->input->get('id');
			$data['resourceData']=$this->resourceClass->getOne($id);
			$data['childData']=$this->resourceClass->getResourceClass($id);		
			$this->load->view('admin/resource/update_view',$data);
		}	
		
	}	
	function  add(){
		if($this->input->post('sub')){		
			$data=array(
					'name'=>$this->input->post('name'),
					'orderlist'=>$this->input->post('orderlist'),
					'status'=>$this->input->post('status'),
					't'=>$this->input->post('t'),
					'picType'=>$this->input->post('picType'),
					'pid'=>0,
					'time'=>time()
					
				);									
			$rs=$this->db->insert('resourceclass',$data); 

			if($rs){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
			}else{
				echo "<script  type='text/javascript'>window.parent.location.reload();alert('添加失败');</script>";
			}
		}else{
			//$dataRole['data']=$this->role->getRole();
			$this->load->view('admin/resource/add_view');
		}	
	}
	
	public  function childResource(){
		if($this->input->post('sub')){		
			$data=array(
					'name'=>$this->input->post('name'),
					'orderlist'=>$this->input->post('orderlist'),
					'status'=>$this->input->post('status'),
					'picType'=>$this->input->post('picType'),
					'pid'=>$this->input->post('pid'),
					'time'=>time()
					
				);									
			$rs=$this->db->insert('resourceclass',$data); 
			if($rs){
				echo "<script  type='text/javascript'>window.parent.location.reload();</script>";											
			}else{
				echo "<script  type='text/javascript'>window.parent.location.reload();alert('添加失败');</script>";
			}
		}else{
			$data['pid']=$this->input->get('pid');
			$this->load->view('admin/resource/addChild_view',$data);
		}	
	}
	
	//列别页中删除项，删除子分类，以及文章
	public  function delect(){
		$adminId=$this->input->post('id');		
		$rs=$this->resourceClass->delect($adminId);
		$childData=$this->resourceClass->getResourceClass($adminId);
		$childId=array();
		foreach ($childData as $k=>$v){
			$childId[$k]=$v['id'];		
		}
		$cRs=$this->resourceClass->delectArray($childId);	//删除它的子分类
		
		$aRs=$this->resourceClass->delectArticleArray($childId);
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	
	//修改中的删除子集
	public  function delect2(){
		$id=$this->input->post('id');		
		$rs=$this->resourceClass->delect($id);//删除子集
		$aRs=$this->resourceClass->delectArticle($id);	//删除该子集下的文章	
		if($rs){		
			echo '1';
		}else{
			echo '0';
		}				
	}
	
	public  function delectArray(){
		$arrayId=$this->input->post('arrayId');
		$dataId=explode('|',$arrayId);
		$rs=$this->resourceClass->delectArray($dataId);//删除一级分类			
		$child=$this->resourceClass->getArticleArray($dataId);//获取所有的二级分类
		$cRs=$this->resourceClass->delectArray($child);	//删除二级分类
		$aRs=$this->resourceClass->delectArticleArray($child);	//删除二级分类	

		if($rs){		
			echo '1';
		}else{
			echo '0';
		}		
	}

}