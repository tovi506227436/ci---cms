<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class article_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getArticle($status,$classId,$title,$top,$start_time,$end_time){			
		$this->db->select('id,title,classId,ReadingNumber,member,status,top,orderlist,time');		
		if(!empty($status)){
			$this->db->where('status',$status);
		};
		if(!empty($classId)){
			$this->db->where('classId',$classId);
		};		
		if(!empty($title)){
			$this->db->or_like ('title',$title,'before');
		};
		if(!empty($title)){
			$this->db->or_like ('title',$title,'after');
		};
		if(!empty($title)){
			$this->db->or_like ('title',$title,'both');
		};				
		if(!empty($top)){
			$this->db->where ('top',$top);
		};		
		
		if (!empty($start_time)){						
			$start_time=strtotime($start_time);
			$this->db->where('time >=',$start_time );
		};
		if(!empty($end_time)){			
			$end_time = strtotime ($end_time);
			$this->db->where('time <=', $end_time );
		};
		$this->db->order_by('orderlist asc,time desc');
		$query=$this->db->get('article');
		$data =$query->result_array();
		return $data;
	}
	
	function  delect($id){
		$status= $this->db->delete('article', array('id' => $id));
		return $status;	 	
	}
	function update($id,$data) {	
		$status= $this->db->update('article',$data,array('id'=>$id));
		return $status;				
	}
	function getOne($id){
		$query=$this->db->select ('id,title,classId,status,top,ReadingNumber,thumbnail,member,abstract,source,content,orderlist,time')->get_where('article',array('id'=>$id));
		$data =$query->result_array();				
		return $data;
	}
	function getInData($arrayId){
		$query=$this->db->select ('id,thumbnail')->where_in('id', $arrayId)->get('article');
		$data =$query->result_array();				
		return $data;
	
	}
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('article');
		return $status;
	}
	function  getResourceClass($pid){
		$query=$this->db->select('id,name,status,time,orderlist,pid')->order_by('orderlist','asc')->get_where('resourceclass',array('pid'=>$pid));				
		$data =$query->result_array();				
		return $data;	
	}
	function  getResourcePidData($pid){
		$query=$this->db->select('id,name')->where('pid  !=',$pid)->get('resourceclass');				
		$data =$query->result_array();				
		return $data;	
	}		
}