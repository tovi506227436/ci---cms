<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class index_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getResourceclassTop(){			
		$query=$this->db->select('id,name')->order_by('orderlist asc,time desc')->get_where('resourceclass',array('status'=>1,'t'=>2),1);				
		$data =$query->result_array();
		return $data;
	}	
	function  getLeft(){			
		$query=$this->db->select('id,name,orderlist')->order_by('orderlist asc,time desc')->get_where('resourceclass',array('status'=>1,'t'=>3),4);				
		$data=$query->result_array();
		foreach ($data as $k=>$v){
			$data[$k]['list']=$this->getLeftArticle($v['id']);
		}
		return $data;
		
	}
	function  getLeftArticle($classId){			
		$query=$this->db->select('id,title,thumbnail,abstract,time')->order_by('orderlist asc,time desc')->get_where('article',array('status'=>1,'classId'=>$classId,'top'=>1),8);				
		$data =$query->result_array();
		return $data;
	}
	
	function  getMiddle(){			
		$query=$this->db->select('id,name,orderlist')->order_by('orderlist asc,time desc')->get_where('resourceclass',array('status'=>1,'t'=>4),1);				
		$data=$query->result_array();		
		$data['list']=$this->getMiddleArticle($data['0']['id']);		
		return $data;		
	}
	function  getMiddleArticle($classId){			
		$query=$this->db->select('id,title,thumbnail,abstract,time,source')->order_by('orderlist asc,time desc')->get_where('article',array('status'=>1,'classId'=>$classId,'top'=>1),4);				
		$data =$query->result_array();
		return $data;
	}
	
	function  getRight(){			
		$query=$this->db->select('id,name,orderlist')->order_by('orderlist asc,time desc')->get_where('resourceclass',array('status'=>1,'t'=>5),2);				
		$data=$query->result_array();
		foreach ($data as $k=>$v){
			$data[$k]['list']=$this->getLeftArticle($v['id']);
		}
		return $data;
		
	}
	function  getRightArticle($classId){			
		$query=$this->db->select('id,title,thumbnail,abstract,time')->order_by('orderlist asc,time desc')->get_where('article',array('status'=>1,'classId'=>$classId,'top'=>1),5);				
		$data =$query->result_array();
		return $data;
	}
	
	function  getTop(){			
		$query=$this->db->select('id,name,orderlist')->order_by('orderlist asc,time desc')->get_where('resourceclass',array('status'=>1,'t'=>2),1);				
		$data=$query->result_array();
		foreach ($data as $k=>$v){
			$data[$k]['list']=$this->getTopArticle($v['id']);
		}
		return $data;
		
	}
	function  getTopArticle($classId){			
		$query=$this->db->select('id,title,thumbnail,abstract,time')->order_by('orderlist asc,time desc')->get_where('article',array('status'=>1,'classId'=>$classId,'top'=>1),3);				
		$data =$query->result_array();
		return $data;
	}
	function  getArticle($title){			
		$this->db->select('id,title,classId,orderlist,time');		
		if(!empty($title)){
			$this->db->or_like ('title',$title,'before');
		};
		if(!empty($title)){
			$this->db->or_like ('title',$title,'after');
		};
		if(!empty($title)){
			$this->db->or_like ('title',$title,'both');
		};						
		$this->db->order_by('time desc');
		$query=$this->db->get('article');
		$data =$query->result_array();
		return $data;
	}
	function  getFreeVideo(){			
		$query=$this->db->select('id,title,url,status,orderlist,time,thumbnail')->order_by('orderlist asc,time desc')->get_where('freeVideo',array('status'=>1));				
		$data =$query->result_array();
		return $data;
	}
	function  getOneFreeVideo($id){			
		$query=$this->db->select('id,title,url,status,time,abstract')->get_where('freeVideo',array('status'=>1,'id'=>$id));				
		$data =$query->result_array();
		return $data;
	}	
	function  getRightFreeVideo(){			
		$query=$this->db->select('id,title,url,status,orderlist,time')->order_by('orderlist asc,time desc')->get_where('freeVideo',array('status'=>1),20);				
		$data =$query->result_array();
		return $data;
	}
	function  getVideoList(){			
		$query=$this->db->select('id,title,classId,coverUrl,resourceClass')->order_by('orderlist asc,time desc')->get_where('video',array('status'=>1),9);				
		$data =$query->result_array();
		return $data;
	}
	function  getSession($id){			
		$this->db->select('id,sessId');		
		$query=$this->db->get_where('user',array('id'=>$id),1);
		$data =$query->result_array();
		return $data;
	}
	
}