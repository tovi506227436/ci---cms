<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Enterprise extends MY_Controller  {
	function __construct() {
		parent::__construct ();		
		//$this->load->model('index/login_model','login');
		$this->load->model('index/enterprise_model','enterprise');
		if($this->session->userdata('userName')){
			$sessId=$this->enterprise->getSession($this->session->userdata('userID'));
			if($sessId['0']['sessId']!=session_id()){
				$this->session->sess_destroy();	
				alertPrompt('该账号在异地登陆',site_url('index'));						
			}
		}					
	}
	
	function  index(){
		$index['nav']=$this->nav();//导航	
		$index['bottonNav']=$this->bottonNav();//底部导航	
		$this->load->library('pagination');
		$classId=$this->uri->segment(2);  //id		
		$this->config->set_item('url_suffix','');			
		$per=30;//每页显示个数	
		$data['total_rows']=count($this->enterprise->getEnterprise());
		$config['base_url'] = site_url().'enterprise/'.$classId.'/';//分页的路径	
		$config['page_query_string'] = FALSE;
		$config['total_rows'] =$data['total_rows'];
		$config['per_page'] = $per;
		$config['uri_segment']=3;//分页方法自动测定你 URI 的哪个部分包含页数
		$config['num_links'] = 5;//当前链接前后显示几个分页						
		//当前页
		$config['cur_tag_open'] = '<div class="ym page"><a>';
		$config['cur_tag_close'] = '</a></div>';
		//其他链接
		$config['num_tag_open'] = '<div class="ym"><a>';
		$config['num_tag_close'] = '</a></div>';
		//上一页
		$config['prev_tag_open'] = '<div id=""><div class="ymy"><a>';
		$config['prev_tag_close'] = '</a></div></div>';
		//下一页
		$config['next_tag_open'] = '<div class="ymy"><a>';
		$config['next_tag_close'] = '</a></div>';
		
		$config['first_tag_open'] = '<div id=""><div class="ymy"><a>';//“第一页”链接的打开标签。
        $config['first_tag_close'] = '</a></div></div>';//“第一页”链接的关闭标签。
		
		$config['last_tag_open'] = '<div class="ymy"><a>';//“最后一页”链接的打开标签。
        $config['last_tag_close'] = '</a></div>';//“最后一页”链接的关闭标签
		
		$config['first_link'] = '第一页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['last_link'] = '最后一页';			
		$this->pagination->initialize($config); 	   	
        $offset=$this->uri->segment(3)!==FALSE?$this->uri->segment(3):0;
        $this->db->limit($per,$offset);    	    	 	   	
		$index['enterpriseList']=$this->enterprise->getEnterprise($classId);
		$index['num']=$config['total_rows'];
		$index['links']= $this->pagination->create_links();	
		$this->load->view('home/enterprise/list_view',$index);	
	}
	function  introduction(){
		$index['nav']=$this->nav();//导航	
		$index['bottonNav']=$this->bottonNav();//底部导航	
		$Id=$this->uri->segment(2);
		$index['userData']=$this->enterprise->getOneUser($Id);
		$index['ProductImg']=$this->enterprise->getUserProductImg($Id);
		$index['EnterpriseImg']=$this->enterprise->getUserEnterpriseImg($Id);
		$this->load->view('home/enterprise/introduction_view',$index);
	
	}
	function  classify(){
		$index['nav']=$this->nav();//导航	
		$index['bottonNav']=$this->bottonNav();//底部导航	
		$this->load->library('pagination');
		$type=$this->uri->segment(2);  //id		
		$this->config->set_item('url_suffix','');			
		$per=30;//每页显示个数	
		$data['total_rows']=count($this->enterprise->getClassify($type));
		$config['base_url'] = site_url().'classify/'.$type.'/';//分页的路径	
		$config['page_query_string'] = FALSE;
		$config['total_rows'] =$data['total_rows'];
		$config['per_page'] = $per;
		$config['uri_segment']=3;//分页方法自动测定你 URI 的哪个部分包含页数
		$config['num_links'] = 5;//当前链接前后显示几个分页						
		//当前页
		$config['cur_tag_open'] = '<div class="ym page"><a>';
		$config['cur_tag_close'] = '</a></div>';
		//其他链接
		$config['num_tag_open'] = '<div class="ym"><a>';
		$config['num_tag_close'] = '</a></div>';
		//上一页
		$config['prev_tag_open'] = '<div id=""><div class="ymy"><a>';
		$config['prev_tag_close'] = '</a></div></div>';
		//下一页
		$config['next_tag_open'] = '<div class="ymy"><a>';
		$config['next_tag_close'] = '</a></div>';
		
		$config['first_tag_open'] = '<div id=""><div class="ymy"><a>';//“第一页”链接的打开标签。
        $config['first_tag_close'] = '</a></div></div>';//“第一页”链接的关闭标签。
		
		$config['last_tag_open'] = '<div class="ymy"><a>';//“最后一页”链接的打开标签。
        $config['last_tag_close'] = '</a></div>';//“最后一页”链接的关闭标签
		
		$config['first_link'] = '第一页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['last_link'] = '最后一页';			
		$this->pagination->initialize($config); 	   	
        $offset=$this->uri->segment(3)!==FALSE?$this->uri->segment(3):0;
        $this->db->limit($per,$offset);    	    	 	   	
		$index['enterpriseList']=$this->enterprise->getClassify($type);
		$index['num']=$config['total_rows'];
		$index['links']= $this->pagination->create_links();	
		$this->load->view('home/enterprise/list_view',$index);	
	
	}
}