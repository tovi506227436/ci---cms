<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class role_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}

	function getRole(){		
		$query=$this->db->select('id,role_name,status,prive,description')->get('role');
		$data =$query->result_array();
		return $data;	
	}		
	/**
	 * 通过自己反推查找一级目录
	 * Enter description here ...
	 * @param unknown_type $pid
	*/
	function role($pid){			
		$query=$this->db->select ('id,name,pid,t,url,listorder,class')->order_by("listorder", "asc")->get_where('menu',array('pid'=>$pid));
		$data =$query->result_array();				
		return $data;
	}
	/**
	 * 根据角色的id查找它所对应的权限id
	 */
	function getOneRole($id){
		$query=$this->db->select ('prive,role_name,status,description')->get_where('role',array('id'=>$id),1);
		$data =$query->result_array();				
		return $data;
	}	
	/**
	 * 获取一级导航
	 * Enter description here ...
	 * @param $roleArray
	 */
	function getTopMenu($menu){			
		$this->db->select('id,name,pid,class');
		$this->db->where_in('id', $menu);
		$query=$this->db->get('menu');		
		$data =$query->result_array();				
		return $data;				
	}
			
	/**
	 * 用户对应多个角色
	 * Enter description here ...
	 * @param $roleArray
	 */
	function getRoleArray($roleArray){		
		$this->db->select('role_name,id,orderlist');
		$this->db->where_in('id', $roleArray);
		$this->db->where(array('status'=>1));
		$query=$this->db->get('role');		
		$data =$query->result_array();				
		return $data;				
	}
	
	/**
	 * 获取多个角色的权限
	 * Enter description here ...
	 * @param $roleArray
	 */
	function getMenuArrayId($roleArray){
		//->get_where('role',array('id'=>$roleId,'status'=>1));
		
		$this->db->select('menu_id');
		$this->db->where_in('role_id', $roleArray);
		$query=$this->db->get('menu_role');		
		$data =$query->result_array();				
		return $data;				
	}

	/**
	 * 用户对应一个角色
	 * Enter description here ...
	 * @param unknown_type $roleId
	 */
	function  getRoleOne($roleId){
		$query=$this->db->select('role_name,id,orderlist')->get_where('role',array('id'=>$roleId,'status'=>1));
		$data =$query->result_array();				
		return $data;
	
	}
	/**
	 * 超级管理员获取所有的一级目录
	 */
	function  getMaxLevel(){
		$query=$this->db->select ('id,name,pid,t,url,listorder,class')->order_by("listorder", "asc")->get_where('menu',array('t'=>1));
		$data =$query->result_array();				
		return $data;
	
	}
	/**
	 * 获取单个角色的权限
	 */
	function  getmenuData($roleId){
		$query=$this->db->select('menu_id')->get_where('menu_role',array('role_id'=>$roleId));
		$data =$query->result_array();				
		return $data;			
	}
	/**
	 * 获取多个角色的权限
	 */
	function  menuArray($roleId){
		$query=$this->db->select('menu_id')->get_where('menu_role',array('role_id'=>$roleId));
		$data =$query->result_array();				
		return $data;
	
	}

	/**
	 * 获取一级导航
	 * Enter description here ...
	 * @param $roleArray
	 */
	function getMenu($roleArray){			
		$this->db->select('id,name,pid,t,url,listorder,class');
		$this->db->where_in('id', $roleArray);
		$this->db->order_by("listorder", "asc");
		$query=$this->db->get('menu');		
		$data =$query->result_array();				
		return $data;				
	}
	/**
	 * 获取左侧的二级导航
	 */
	function leftMenu($id){
		$query=$this->db->select ('id,name,pid,t,url,listorder,class')->order_by("listorder", "asc")->get_where('menu',array('pid'=>$id,'t'=>2));
		$data =$query->result_array();				
		return $data;
	}	
	function getchild($roleArray){			
		$this->db->select('id,name,pid,t,url,listorder,class');
		$this->db->where_in('id', $roleArray);
		//$this->db->where(array(''));
		$this->db->order_by("listorder", "asc");
		$query=$this->db->get('menu');		
		$data =$query->result_array();				
		return $data;				
	}	
	/**
	 * 获取该角色所有的二级目录
	 * Enter description here ...
	 * @param unknown_type $roleArray
	 */
	function getErJiMeun($roleArray){
		//->get_where('role',array('id'=>$roleId,'status'=>1));		
		$this->db->select('name,pid,class');
		$this->db->where_in('id', $roleArray);
		$query=$this->db->get('menu');		
		$data =$query->result_array();				
		return $data;				
	}
	function updateRole($id,$data) {	
		$status= $this->db->update('role',$data,array('id'=>$id));
		return $status;				
	}	
	function  delect($id){
		$status= $this->db->delete('role', array('id' => $id));
		return $status;	 
	
	}
}