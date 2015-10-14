<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class user_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getUser($status,$type,$level,$examine,$name,$companyName,$start_time,$end_time){
		$this->db->select ('u.id ,u.name,u.pwd,u.type,u.corporation,u.record,u.level,u.status,u.time,u.examine,u.companyName,u.companyProfile,u.contact,u.companyAddress,u.industryClass,i.industryName,i.id as industryClassId');
		$this->db->from ('user u');	
		$this->db->join ('industryClass i', 'u.industryClass = i.id');
		
		if(!empty($status)){
			$this->db->where('u.status',$status);
		};
		if(!empty($type)){
			$this->db->where('u.type',$type);
		};
		if(!empty($examine)){
			$this->db->where('u.examine',$examine);
		};		
		if(!empty($level)){
			$this->db->where ('u.level',$level);
		};
		
		if(!empty($companyName)){
			$this->db->or_like ('u.companyName',$companyName,'before');
		};
		if(!empty($companyName)){
			$this->db->or_like ('u.companyName',$companyName,'after');
		};
		if(!empty($companyName)){
			$this->db->or_like ('u.companyName',$companyName,'both');
		};		
		
		if(!empty($name)){
			$this->db->or_like ('u.name',$name,'before');
		};
		if(!empty($name)){
			$this->db->or_like ('u.name',$name,'after');
		};
		if(!empty($name)){
			$this->db->or_like ('u.name',$name,'both');
		};				
		if (!empty($start_time)){						
			$start_time=strtotime($start_time);
			$this->db->where('u.time >=',$start_time );
		};
		if(!empty($end_time)){			
			$end_time = strtotime ($end_time);
			$this->db->where('u.time <=', $end_time );
		};
		$this->db->order_by('u.time desc');		
		$query=$this->db->get();
		$data =$query->result_array();
		foreach ($data as $k=>$v){
			$data[$k]['videocompleteNum']=$this->videocompleteNum($v['id']);
		}					
		return $data;	
	}
	function videocompleteNum($userId){
		$this->db->select ('id,videId,userId');		
		$query=$this->db->get_where('videocomplete',array('userId'=>$userId));
		return $query->num_rows(); 	
	}
	
	
	
	function  videocompleteData($userId){
		$this->db->select ('c.id,c.videId,c.userId,c.time,v.title');		
		$this->db->from ('videocomplete c');	
		$this->db->join ('video v', 'c.videId = v.id');
		$this->db->where('c.userId',$userId);
		$this->db->order_by('c.time desc');	
		$query=$this->db->get();
		$data =$query->result_array();				
		return $data;
	}		
	
	function  getUserNum($status,$type,$level,$examine,$name,$companyName,$start_time,$end_time){
		$this->db->select ( 'id' );
		if(!empty($status)){
			$this->db->where('status',$status);
		};
		if(!empty($type)){
			$this->db->where('type',$type);
		};		
		if(!empty($level)){
			$this->db->where ('level',$level);
		};
		if(!empty($examine)){
			$this->db->where('examine',$examine);
		};
		if(!empty($companyName)){
			$this->db->or_like('companyName',$companyName,'before');
		};
		if(!empty($companyName)){
			$this->db->or_like ('companyName',$companyName,'after');
		};
		if(!empty($companyName)){
			$this->db->or_like('companyName',$companyName,'both');
		};	
		if(!empty($name)){
			$this->db->or_like('name',$name,'before');
		};
		if(!empty($name)){
			$this->db->or_like('name',$name,'after');
		};
		if(!empty($name)){
			$this->db->or_like('name',$name,'both');
		};				
		if (!empty($start_time)){						
			$start_time=strtotime($start_time);
			$this->db->where('time >=',$start_time );
		};
		if(!empty($end_time)){			
			$end_time = strtotime ($end_time);
			$this->db->where('time <=', $end_time );
		};			
		return $this->db->count_all_results ( 'user' );
	}	
	function  delect($id){
		$status= $this->db->delete('user', array('id' => $id));
		return $status;	 	
	}
	function update($id,$data) {	
		$status= $this->db->update('user',$data,array('id'=>$id));
		return $status;				
	}
	function getOne($id){
		$query=$this->db->select ('id,name,pwd,type,record,level,status,time,examine,companyName,companyProfile,contact,companyAddress,industryClass,license,tax,prove,Product')->get_where('user',array('id'=>$id));
		$data =$query->result_array();				
		return $data;
	}
	function delectArray($dataId){
		$status= $this->db->where_in('id', $dataId)->delete('user');
		return $status;
	}
	function getIndustryClass(){
		$query=$this->db->select ('id,industryName,status,time,orderlist')->order_by('orderlist asc')->get('industryClass');
		$data =$query->result_array();				
		return $data;
	}		
}