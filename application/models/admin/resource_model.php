<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class resource_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getResourceClass($pid){
		$query=$this->db->select('id,name,status,time,orderlist,pid,picType,t')->order_by('orderlist asc,time desc')->get_where('resourceclass',array('pid'=>$pid));				
		$data =$query->result_array();				
		return $data;	
	}
	function  getResourceClassNum(){
		$this->db->select ('id')->where(array('pid'=>0));
		return $this->db->count_all_results ('resourceclass');
	}	
	
	function  delect($id){
		$status= $this->db->delete('resourceclass', array('id' =>$id));
		return $status;	 	
	}
	function update($id,$data) {	
		$status= $this->db->update('resourceclass',$data,array('id'=>$id));
		return $status;				
	}
	function getOne($id){
		$query=$this->db->select ('id,name,status,time,orderlist,pid,picType,t')->get_where('resourceclass',array('id'=>$id),1);
		$data =$query->result_array();				
		return $data;
	}
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('resourceclass');
		return $status;
	}
	
	function getArticleArray($pid){
		$query= $this->db->select('id')->where_in('pid',$pid)->get('resourceclass');
		$data =$query->result_array();				
		return $data;;
	}
	function delectArticleArray($Id){
		$status= $this->db->where_in('classId',$Id)->delete('article');
		return $status;
	}
	function delectArticle($Id){
		$status= $this->db->where('classId',$Id)->delete('article');
		return $status;
	}

}