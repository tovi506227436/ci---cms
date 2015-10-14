<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class menu_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function getMenuTop(){
		$query=$this->db->select('id,name,t,pid,url,listorder,time,class')->where(array('t'=>1))->order_by('listorder')->get('menu');
		$data =$query->result_array();				
		return $data;
	
	}
	
}