<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class enterprise_model extends CI_Model {
	function __construct(){
		parent::__construct ();
	}
	
	function  getEnterprise(){			
		$query=$this->db->select('id,companyName')->get('user');				
		$data =$query->result_array();		
		return $data;
	}	
	function  getOneUser($id){			
		$query=$this->db->select('id,pwd,name,record,logImg,type,level,status,time,examine,corporation,companyName,companyProfile,contact,companyAddress,industryClass,license,tax,prove,Product')->get_where('user',array('id'=>$id),1);				
		$data =$query->result_array();		
		return $data;
	}
	function  getUserProductImg($id){			
		$this->db->select('id,userId,productImg,time')->where('productImg !=','0');
		$query=$this->db->get_where('productImg',array('userId'=>$id),9);				
		$data =$query->result_array();		
		return $data;
	}
	
	function  getUserEnterpriseImg($id){			
		$this->db->select('id,userId,enterpriseImg,time')->where('enterpriseImg !=','0');
		$query=$this->db->get_where('enterpriseImg',array('userId'=>$id),9);				
		$data =$query->result_array();		
		return $data;
	}

	function  getClassify($type){			
		$query=$this->db->select('id,companyName')->get_where('user',array('type'=>$type));				
		$data =$query->result_array();		
		return $data;
	}
	function  getSession($id){			
		$this->db->select('id,sessId');		
		$query=$this->db->get_where('user',array('id'=>$id),1);
		$data =$query->result_array();
		return $data;
	}

}