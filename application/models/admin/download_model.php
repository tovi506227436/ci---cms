<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class download_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getDownload($status,$title){
		$this->db->select ('id,status,time,orderlist,title,url');
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
		$this->db->order_by('orderlist asc , time desc');
		$query=$this->db->get('download');
		$data =$query->result_array();				
		return $data;	
	}		
	function addDownload($data){
		$rs=$this->db->insert('download', $data); 
		return $rs;
			
	}
	function update($id,$data){
		$status= $this->db->update('download',$data,array('id'=>$id));
		return $status;	
	}
	function getOneDownload($id){
		$this->db->select ('id,status,time,orderlist,title,url');
		$query=$this->db->get_where('download',array('id'=>$id));
		$data =$query->result_array();				
		return $data;
	}
	function  delect($id){
		$status= $this->db->delete('download', array('id' => $id));
		return $status;	 	
	}
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('download');
		return $status;
	}
	
}