<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class articleRecord_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	
	function getArticleRecord($title,$name,$start_time,$end_time){

		if(!empty($title)){
			$this->db->or_like ('article',$title,'before');
		};
		if(!empty($title)){
			$this->db->or_like ('article',$title,'after');
		};
		if(!empty($title)){
			$this->db->or_like ('article',$title,'both');
		};	

		if(!empty($name)){
			$this->db->or_like ('user',$name,'before');
		};
		if(!empty($name)){
			$this->db->or_like ('user',$name,'after');
		};
		if(!empty($name)){
			$this->db->or_like ('user',$name,'both');
		};	
		if (!empty($start_time)){						
			$start_time=strtotime($start_time);
			$this->db->where('time >=',$start_time );
		};
		if(!empty($end_time)){			
			$end_time = strtotime ($end_time);
			$this->db->where('time <=', $end_time );
		};
		$this->db->order_by('time desc');
		$query=$this->db->get('articleRecord');	
		$data =$query->result_array();				
		return $data;					
	}
	
	
	function  delect($id){
		$status= $this->db->delete('articleRecord', array('id' => $id));
		return $status;	 	
	}
	
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('articleRecord');
		return $status;
	}
	
}