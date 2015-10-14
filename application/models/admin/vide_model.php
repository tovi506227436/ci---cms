<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class vide_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getVide($status,$classId,$title,$start_time,$end_time){			
		$this->db->select('id,title,time,videoUrl,classId,orderlist,status,coverUrl,duration,resourceClass');		
		if(!empty($status)){
			$this->db->where('status',$status);
		};
		if(!empty($classId)){
			$this->db->where('classId',$classId);
		};		
		if(!empty($title)){
			$this->db->or_like ('title',$title,'before');
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
		$query=$this->db->get('video');
		$data =$query->result_array();
		return $data;
	}
	function  getResourceClass($pid){
		$query=$this->db->select('id,name,status,time,orderlist,pid')->order_by('orderlist','asc')->get_where('resourceclass',array('pid'=>$pid));				
		$data =$query->result_array();				
		return $data;	
	}
	function  delect($id){
		$status= $this->db->delete('video', array('id' => $id));
		return $status;	 	
	}
	function update($id,$data) {	
		$status= $this->db->update('video',$data,array('id'=>$id));
		return $status;				
	}
	function getOne($id){
		$query=$this->db->select ('id,title,time,videoUrl,classId,orderlist,status,coverUrl,duration,abstract,resourceClass')->get_where('video',array('id'=>$id),1);
		$data =$query->result_array();				
		return $data;
	}
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('video');
		return $status;
	}
	function  getIndustryClass(){
		$query=$this->db->select('id,industryName,status,time,orderlist')->order_by('orderlist asc,time asc')->get('industryclass');				
		$data =$query->result_array();				
		return $data;	
	}	
}