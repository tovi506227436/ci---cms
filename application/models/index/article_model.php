<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class article_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getArticle($id){			
		$query=$this->db->select('id,title,classId,thumbnail,content,member,ReadingNumber,source,time,abstract')->get_where('article',array('id'=>$id),1);				
		$data =$query->result_array();
		$data['list']=$this->getBottonArticle($data['0']['classId']);
		$data['nodeName']=$this->getNodePid($data['0']['classId']);
		return $data;
	}
	function  getBottonArticle($classId){
		$query=$this->db->select('id,title,thumbnail,time,abstract')->order_by('orderlist asc,time desc')->get_where('article',array('status'=>1,'classId'=>$classId),4);				
		$data =$query->result_array();
		return $data;	
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
	function articleList($userId){
		$query=$this->db->select('id')->get_where('articlerecord',array('userId'=>$userId));				
		return $query->num_rows();	
	}
	function  delect($id){	
		$data=$this->selectMin($id);	
		$status= $this->db->delete('articlerecord', array('id' =>$data['0']['id']));
		return $data;	 	
	}
	function selectMin($id){
		$query=$this->db->select('id,time')->order_by('time','asc')->get_where('articlerecord',array('userId'=>$id),1);
		$data =$query->result_array();
		return $data;
	}
	function  readingNumber($articleId){		
		$this->db->set('ReadingNumber', 'ReadingNumber+1', FALSE);
		$this->db->where('id', $articleId);
		$rs=$this->db->update('article'); 
		return  $rs;
	}
	function  getOneArticle($userId,$articleId){			
		$query=$this->db->select('articleId,userId')->get_where('articlerecord',array('userId'=>$userId,'articleId'=>$articleId),1);				
		$data =$query->result_array();		
		return $data;
	}
	function  updataArticle($articleId,$data){			
		$this->db->where('articleId', $articleId);
		$rs=$this->db->update('articlerecord', $data);
		return $rs; 		
	}
	function  getSession($id){			
		$this->db->select('id,sessId');		
		$query=$this->db->get_where('user',array('id'=>$id),1);
		$data =$query->result_array();
		return $data;
	}

}