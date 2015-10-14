<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class industry_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getIndustryClass(){
		$query=$this->db->select('id,industryName,status,time,orderlist')->order_by('orderlist asc,time asc')->get('industryclass');				
		$data =$query->result_array();				
		return $data;	
	}
	function  getIndustryClassNum(){
		$this->db->select ('id');
		return $this->db->count_all_results ('industryclass');
	}	
	
	function  delect($id){
		$status= $this->db->delete('industryclass', array('id' =>$id));
		return $status;	 	
	}
	function update($id,$data) {	
		$status= $this->db->update('industryclass',$data,array('id'=>$id));
		return $status;				
	}
	function getOne($id){
		$query=$this->db->select ('id,industryName,status,time,orderlist')->get_where('industryclass',array('id'=>$id),1);
		$data =$query->result_array();				
		return $data;
	}
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('industryclass');
		return $status;
	}
}