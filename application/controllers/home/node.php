<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Node extends MY_Controller  {
	function __construct() {
		parent::__construct ();		
		//$this->load->model('index/login_model','login');
		$this->load->model('index/node_model','node');
		if(delete_cookie('userName')){
			$sessId=$this->node->getSession(delete_cookie('userID'));
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
		$per=10;//每页显示个数	
		$data['total_rows']=$this->node->getArticleNum($classId);
		$config['base_url'] = site_url().'node/'.$this->uri->segment(2);//分页的路径		
		$config['page_query_string'] = FALSE;
		$config['total_rows'] =$data['total_rows'];
		$config['per_page'] = $per;
		$config['uri_segment']=3;//分页方法自动测定你 URI 的哪个部分包含页数
		$config['num_links'] = 5;//当前链接前后显示几个分页						
		//当前页
		$config['cur_tag_open'] = '<li id="current"><a>';
		$config['cur_tag_close'] = '</a></li>';
		//其他链接
		$config['num_tag_open'] = '<li class="links"><a>';
		$config['num_tag_close'] = '</a></li>';
		//上一页
		$config['prev_tag_open'] = '<li class="current"><a>';
		$config['prev_tag_close'] = '</a></li>';
		//下一页
		$config['next_tag_open'] = '<li class="current"><a>';
		$config['next_tag_close'] = '</a></li>';		
		$config['first_tag_open'] = '<li class="current"><a>';//“第一页”链接的打开标签。
        $config['first_tag_close'] = '</a></li>';//“第一页”链接的关闭标签。		
		$config['last_tag_open'] = '<li class="current"><a>';//“最后一页”链接的打开标签。
        $config['last_tag_close'] = '</a></li>';//“最后一页”链接的关闭标签		
		$config['first_link'] = '第一页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['last_link'] = '最后一页';			
		$this->pagination->initialize($config); 	   	
        $offset=$this->uri->segment(3)!==FALSE?$this->uri->segment(3):0;
        $this->db->limit($per,$offset);    	    	 	   	
		$index['data']=$this->node->getArticle($classId);
		$index['num']=$config['total_rows'];
		$index['links']= $this->pagination->create_links();	
		$pid=$this->node->getNodePid($classId);
		$index['right']=$this->node->getRightNode($classId,$pid['0']['pid']);
		$index['titleName']=$pid['0']['name'];
		$index['id']=$pid['0']['id'];
		$this->load->view('home/node_view',$index);	
	}
}