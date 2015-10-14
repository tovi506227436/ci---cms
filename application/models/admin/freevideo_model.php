<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class freevideo_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getFreeVideo($status,$title,$start_time,$end_time){
		$this->db->select ('id,title,url,status,orderlist,time,thumbnail,abstract');
		if(!empty($status)){
			$this->db->where('status',$status);
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
		if (!empty($start_time)){						
			$start_time=strtotime($start_time);
			$this->db->where('time >=',$start_time );
		};
		if(!empty($end_time)){			
			$end_time = strtotime ($end_time);
			$this->db->where('time <=', $end_time );
		};	
		$this->db->order_by('orderlist asc,time desc');
		$query=$this->db->get('freeVideo');
		$data =$query->result_array();				
		return $data;	
	}
	function  getFreeVideoNum($status,$title,$start_time,$end_time){
		$this->db->select( 'id' );	
		if(!empty($status)){
			$this->db->where('status',$status);
		};
		if(!empty($title)){
			$this->db->or_like('title',$title,'before');
		};
		if(!empty($title)){
			$this->db->or_like('title',$title,'after');
		};
		if(!empty($title)){
			$this->db->or_like('title',$title,'both');
		};
		if (!empty($start_time)){						
			$start_time=strtotime($start_time);
			$this->db->where('time >=',$start_time );
		};
		if(!empty($end_time)){			
			$end_time = strtotime ($end_time);
			$this->db->where('time <=', $end_time );
		};			
		return $this->db->count_all_results ('freeVideo');
	}
	function updateFreeVideo($id,$data) {	
		$status= $this->db->update('freeVideo',$data,array('id'=>$id));
		return $status;				
	}
	function getOneFreeVideo($id){
		$query=$this->db->select ('id,title,url,status,orderlist,time,thumbnail,abstract')->get_where('freeVideo',array('id'=>$id),1);
		$data =$query->result_array();				
		return $data;
	}
	function  delect($id){
		$status= $this->db->delete('freeVideo', array('id' => $id));
		return $status;	 	
	}
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('freeVideo');
		return $status;
	}		
}