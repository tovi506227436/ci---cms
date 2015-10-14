<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class videoHistory_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getUserVideoHistory($status,$type,$level,$name,$start_time,$end_time){
		$this->db->select ('h.id,h.videoID,h.userID,h.time,v.title,v.coverUrl,u.name as username');	
		$this->db->from ('videohistory h');
		$this->db->join ('video v', 'h.videoID 	= v.id');
		$this->db->join ('user u',  'h.userID 	= u.id');
		$this->db->order_by('h.time', 'asc');
		$query=$this->db->get();
		$data =$query->result_array();				
		return $data;
	}

	
	function  delect($id){
		$status= $this->db->delete('videohistory', array('id' => $id));
		return $status;	 	
	}
	
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('videohistory');
		return $status;
	}		
}