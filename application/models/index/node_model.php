<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class node_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getArticle($classId){			
		$query=$this->db->select('id,title,classId,thumbnail,time,abstract')->order_by('orderlist asc ,time desc')->get_where('article',array('top'=>1,'status'=>1,'classId'=>$classId));				
		$data =$query->result_array();
		return $data;
	}
	
	function  getArticleNum($classId){			
		$this->db->select('id');
		$this->db->where(array('top'=>1,'status'=>1,'classId'=>$classId));
		$this->db->from('article');
		return $this->db->count_all_results();
	}
	
	function  getNodePid($id){
		$query=$this->db->select('id,pid,name')->get_where('resourceclass',array('id'=>$id),1);				
		$data =$query->result_array();
		return $data;
	}	
	
	function  getRightNode($id,$classId){			
		$query=$this->db->select('id,name')->where('id !=',$id)->order_by('orderlist asc,time desc')->get_where('resourceclass',array('picType'=>1,'status'=>1,'pid'=>$classId),3);				
		$data =$query->result_array();
		foreach ($data as $k=>$v){
			$data[$k]['list']=$this->getRightArticle($v['id']);
		}
		return $data;
	}
	
	function  getRightArticle($classId){
		$query=$this->db->select('id,title,thumbnail,time')->order_by('orderlist asc,time desc')->get_where('article',array('status'=>1,'classId'=>$classId),6);				
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