<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Article extends MY_Controller  {
	function __construct() {
		parent::__construct ();
		$this->load->model('index/article_model','article');		
		if(get_cookie('userName')){
			$sessId=$this->article->getSession(get_cookie('userID'));
			if($sessId['0']['sessId']!=session_id()){
				delete_cookie("username");  
				delete_cookie("userID");
				delete_cookie("type");
				delete_cookie("sessId");
				delete_cookie("level");
				delete_cookie("userName");
				alertPrompt('该账号在异地登陆',site_url('index'));						
			}			
		}
						
	}	
	function  index(){
		$index['nav']=$this->nav();//导航
		$index['bottonNav']=$this->bottonNav();//底部导航	
		$id=intval($this->uri->segment(2));
		$index['article']=$this->article->getArticle($id);		
		$index['nodeData']=$this->article->getNodePid($index['article']['0']['classId']);
		$index['getRightNode']=$this->article->getRightNode($index['nodeData']['0']['id'],$index['nodeData']['0']['pid']);	
		$num=$this->article->articleList(delete_cookie('userID'));
		$oneArticle=$this->article->getOneArticle(delete_cookie('userID'),$index['article']['0']['id']);
		if($oneArticle){
			$updateTime=array('time'=>time());
			$rs=$this->article->updataArticle($oneArticle['0']['articleId'],$updateTime);		
		}else{
			if($num =='6'){
				$this->article->delect(delete_cookie('userID'));				
			}				
			$data=array(
				'userId'=>delete_cookie('userID'),
				'article'=>$index['article']['0']['title'],
				'user'=>delete_cookie('userName'),		
				'articleId'=>$index['article']['0']['id'],
				'time'=>time()			
			);						
			$rs=$this->db->insert('articlerecord', $data);		
		}				
		$rs=$this->article->readingNumber($index['article']['0']['id']); 
		$this->load->view('home/article_view',$index);	
	}
	
}