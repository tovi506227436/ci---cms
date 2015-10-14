<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Index extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('admin/index_model','index');
		if($this->session->userdata('roleId')==""||$this->session->userdata('roleId')=='0'){
			echo "<script  type='text/javascript'>top.window.location.href=".site_url('admin/login/index')."</script>";
			
		}
	}	
	public function index(){
		$prive=$this->index->getRole($this->session->userdata('roleId'));
		$priveArray=explode('|',$prive['0']['prive']);//所有的二级目录数组		
		$this->session->set_userdata('priveArray', $priveArray);		
		$data['data']=$this->digui(0);//递归一级二级一次排序			
		$topMenu=$this->index->getTopMenu($priveArray);
		$topMenuIdArray=array();
		foreach ($topMenu as $k=>$v){
			$topMenuIdArray[]=$v['pid'];
		}
		$topMenuIdArray=array_unique($topMenuIdArray);
		$this->session->set_userdata('topMenuIdArray', $topMenuIdArray);//一级目录全部id		
		$this->load->view('admin/index_view',$data);
	}
	public function right(){			
		$this->load->view('admin/right_view');
	}
			
	/**
	 * 通过递归的方式
	 * Enter description here ...
	 * @param $id
	 */
	public  function digui($id){
		$da=$this->index->role($id);		
			foreach ($da as $k=>$v){
				//$n=str_repeat("&nbsp&nbsp",$v['t']*2);		
				//echo  $n."|-".$v['name']."</br>";				
					$da[$k]['list']=$this->digui($v['id']);	
					$b=$da;					
			}																										
		return $b;				
	}		
}