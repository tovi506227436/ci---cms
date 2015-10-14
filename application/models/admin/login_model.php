<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class login_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}	
	function login($name,$pwd) {

		$this->db->select ('a.id,a.status,a.name,a.pwd,a.time,a.roleId,r.status as roleStatus');	
		$this->db->from ('admin a');		
		$this->db->join ('role r', 'a.roleId = r.id');
		$this->db->order_by('a.time', 'asc');
		$this->db->where(array('name'=>$name,'pwd'=>$pwd));
		$query=$this->db->get();
		$data =$query->result_array();				
		return $data;			
	}	
	function updateSessId($id,$data){		
		$status= $this->db->update('admin',$data,array('id'=>$id));
		return $status;	
	}
}