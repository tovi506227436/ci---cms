<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class user_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getOneUser($id){			
		$query=$this->db->select('id,pwd,name,record,logImg,type,level,status,time,examine,corporation,companyName,companyProfile,contact,companyAddress,industryClass,license,tax,prove,Product')->get_where('user',array('id'=>$id),1);				
		$data =$query->result_array();		
		return $data;
	}
	function  getVideoCompleteNum($id){
		$query=$this->db->select('id,videId,userId')->get_where('videoComplete',array('userId'=>$id));				
		return  $query->num_rows(); 
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
	
	function isPwd($id,$pwd){
		$query=$this->db->select('id,pwd,name')->get_where('user',array('id'=>$id,'pwd'=>$pwd),1);				
		$data =$query->result_array();
		return $data;
	}
	function changePwd($id,$data){
		$status= $this->db->update('user',$data,array('id'=>$id));
		return $status;	
	}
	function  userArticleHistory($id){			
		$query=$this->db->select('id,userId,time,article,articleId')->order_by('time','desc')->get_where('articlerecord',array('userId'=>$id),6);				
		$data =$query->result_array();		
		return $data;
	}			
	
	function  userVideoHistory($id){
		$this->db->select ('h.id,h.videoID,h.userID,h.time,v.title,v.coverUrl');	
		$this->db->from ('videohistory h');
		$this->db->where(array('h.userID'=>$id));	
		$this->db->join ('video v', 'h.videoID 	= v.id');
		$this->db->order_by('h.time', 'desc');
		$this->db->limit(6);
		$query=$this->db->get();
		$data =$query->result_array();				
		return $data;
	}
	
	
	
	
	function enterpriseImgNum($id){
		$query=$this->db->select('id,userId')->where('enterpriseImg !=','0')->get_where('enterpriseImg',array('userId'=>$id));				
		return $query->num_rows();	
	}
	function addEnterprise($data){
		$rs=$this->db->insert('enterpriseImg', $data); 
		return $rs;
	}
	function  delect($form,$id){
		$status= $this->db->delete($form, array('id' => $id));
		return $status;	 	
	}
	function productImgNum($id){
		$query=$this->db->select('id,userId')->where('productImg !=','0')->get_where('productImg',array('userId'=>$id));				
		return $query->num_rows();	
	}
	function addProduct($data){
		$rs=$this->db->insert('productImg', $data); 
		return $rs;
	}
	function log($id,$data){
		$status= $this->db->update('user',$data,array('id'=>$id));
		return $status;	
	}
	
	function  getDownload(){
		$query=$this->db->select ('id,status,time,orderlist,title,url')->order_by('orderlist asc , time desc')->get_where('download',array('status'=>1));
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