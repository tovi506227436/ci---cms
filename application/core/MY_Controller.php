<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//然后其他的类继承这个类
class MY_Controller extends CI_Controller{  
  
    public function __construct(){       
       parent::__construct();       
         
    } 
    public  function nav(){
    	$this->load->model('index/login_model','login');	    	 	   	
		$data=$this->digui(0);
		return  $data;
    } 
    
	public  function digui($id){		
		$da=$this->login->getdigui($id);		
			foreach ($da as $k=>$v){
				if($this->digui($v['id'])){			
					$da[$k]['list']=$this->digui($v['id']);					
				}								
			};																											
		return $da;
	}
	
	public function bottonNav(){
		$data=$this->login->getBottonNav();
		return $data;
	}

	
}  