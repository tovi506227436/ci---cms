<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class admin_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getAdmin(){
		$this->db->select ('a.id,a.status,a.name,a.pwd,a.time,a.roleId,r.role_name');	
		$this->db->from ('admin a');	
		$this->db->join ('role r', 'a.roleId 	= r.id');
		$this->db->order_by('a.time', 'asc');
		$query=$this->db->get();
		$data =$query->result_array();				
		return $data;	
	}
	function getAdminName($name){
		$query=$this->db->select ('id,name,pwd')->get_where('admin',array('name'=>$name));
		$data =$query->result_array();				
		return $data;
	
	}
	function  getAdminNum(){
		$this->db->select ( 'id' );
		
		return $this->db->count_all_results ( 'admin' );
	}	
	function  delect($id){
		$status= $this->db->delete('admin', array('id' => $id));
		return $status;	 	
	}
	function updateAdmin($id,$data) {	
		$status= $this->db->update('admin',$data,array('id'=>$id));
		return $status;				
	}
	function getOneAdmin($id){
		$query=$this->db->select ('id,name,pwd,status,time,roleId')->get_where('admin',array('id'=>$id),1);
		$data =$query->result_array();				
		return $data;
	}
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('admin');
		return $status;
	}			
}