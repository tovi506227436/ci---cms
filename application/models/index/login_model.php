<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Login_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  loginUser($name,$pwd){			
		$this->db->select('id,name,pwd,type,sessId,record,level,status,time,examine,companyName,companyProfile,contact,companyAddress,industryClass');		
		$query=$this->db->get_where('user',array('name'=>$name,'pwd'=>$pwd),1);
		$data =$query->result_array();
		return $data;
	}
	
	function updateSessId($id,$data) {	
		$status= $this->db->update('user',$data,array('id'=>$id));
		return $status;				
	}	
	
	function  getOne($id){			
		$this->db->select('id,name,pwd,type,sessId,record,level,status,time,examine,companyName,companyProfile,contact,companyAddress,industryClass');		
		$query=$this->db->get_where('user',array('id'=>$id),1);
		$data =$query->result_array();
		return $data;
	}
	
	function  getdigui($pid){			
		$this->db->select('id,name,status,time,orderlist,pid,picType');		
		$query=$this->db->get_where('resourceclass',array('pid'=>$pid,'status'=>1));
		$data =$query->result_array();
		return $data;
	}
	function  getIndustry(){			
		$this->db->select('id,industryName,status,time,orderlist');		
		$query=$this->db->get_where('industryclass',array('status'=>1));
		$data =$query->result_array();
		return $data;
	}
	/**
	 * 检查用户是否已存在
	 * Enter description here ...
	 */
	function  checkUser($name){
		$this->db->select('id,name');		
		$query=$this->db->get_where('user',array('name'=>$name),1);
		$data =$query->result_array();
		return $data;
	}
	/**
	 * 底部导航
	 */
	function  getBottonNav($classId){
		$query=$this->db->select('id,name,picType')->order_by('orderlist asc,time desc')->get_where('resourceclass',array('status'=>1,'t'=>6),7);				
		$data =$query->result_array();
		return $data;
	
	}
	
	
}