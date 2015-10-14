<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Index extends MY_Controller  {
	function __construct() {
		parent::__construct ();
		$this->load->model('index/login_model','login');
		$this->load->model('index/index_model','index');				
	}	
	
	public  function index(){
		$index['nav']=$this->nav();//导航
		$index['bottonNav']=$this->bottonNav();//底部导航
		/**
		 * 上面部分模块
		 * Enter description here ...
		 * @var unknown_type
		 */
		$index['top']=$this->index->getTop();		
		/**
		 * 左边部分
		 */
		$index['left']=$this->index->getLeft();
		$index['middle']=$this->index->getMiddle();
		$index['right']=$this->index->getRight();
		$index['videoData']=$this->index->getVideoList();		
		if(get_cookie('userName')){
			$session_id=session_id();
			$id=get_cookie('userID');			
			$data=$this->login->getOne($id);
			$data=$data['0'];			
			if($session_id != $data['sessId']){	
				delete_cookie("username");  
				delete_cookie("userID");
				delete_cookie("type");
				delete_cookie("sessId");
				delete_cookie("level");
				delete_cookie("userName");	
				loginError('账号在异地登陆',site_url('home/index/quit'));								
			}else{		
				$this->load->view('home/index_view',$index);		
			}
		 }else{
			$this->load->view('home/index_view',$index);
		 }		
			 
	}
	public function login(){
		$name=trim($this->input->post('name',true));
		$pwd=md5(trim($this->input->post('pwd',true)));	
			
		if($name==""){
			echo '-1';
			return;
		}
	
		if($pwd==""){
			echo '-2';
			return;
		}		
		$data=$this->login->loginUser($name,$pwd);
		$userData=$data['0'];
		
		$session_id=session_id();
		$isSessId=$this->login->updateSessId($userData['id'],array('sessId'=>$session_id));
		if($userData){
			$this->input->set_cookie("userID",$userData['id'],time+360000);	
			$this->input->set_cookie("type", $userData['type'],time+360000);
			$this->input->set_cookie("sessId", $session_id,time+360000);
			$this->input->set_cookie("level", $userData['level'],time+360000);
			$this->input->set_cookie("userName", $userData['name'],time+360000);
			$this->input->set_cookie("companyName", $userData['companyName'],time+360000);			
			echo '2';
			return;
		}else{
			echo '-3';
			return;
		}
		
	}
	public function quit(){
		//$this->session->sess_destroy();
		delete_cookie("username");  
		delete_cookie("userID");
		delete_cookie("type");
		delete_cookie("sessId");
		delete_cookie("level");
		delete_cookie("userName");
		redirect ('home/index/index');
	}
		
	public function register(){	
		$index['nav']=$this->nav();//导航
		$index['bottonNav']=$this->bottonNav();//底部导航	
		$index['industryClass']=$this->login->getIndustry();
				
		$this->load->view('home/register_view',$index);
	}
	public function regSub(){					
		if($this->input->post('sub',true)){	
			$data=array(
				'name'=>trim($this->input->post('name',true)),
				'pwd'=>md5(trim($this->input->post('pwd',true))),
				'type'=>trim($this->input->post('type',true)),
				'companyName'=>trim($this->input->post('companyName',true)),
				'industryClass'=>trim($this->input->post('industryClass',true)),
				'corporation'=>trim($this->input->post('corporation',true)),
				'contact'=>trim($this->input->post('contact',true)),
				'companyAddress'=>trim($this->input->post('companyAddress',true)),
				'companyProfile'=>trim($this->input->post('companyProfile',true)),						
				'time'=>time()				
			);
						
			$isUser=$this->login->checkUser($data['name']);
			if($isUser){
				//$this->input->set_cookie($data);
				$this->session->set_flashdata('userError','该用户已存在');
				$this->session->set_flashdata('name',$data['name']);			
				$this->session->set_flashdata('companyName',$data['companyName']);
				$this->session->set_flashdata('industryClass',$data['industryClass']);
				$this->session->set_flashdata('corporation',$data['corporation']);
				$this->session->set_flashdata('contact',$data['contact']);
				$this->session->set_flashdata('companyAddress',$data['companyAddress']);
				$this->session->set_flashdata('companyProfile',$data['companyProfile']);
				
                redirect ('home/index/register');
                return ;
			}						
			$config['upload_path'] = './uploads/userImg/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000';
			$config['max_width']  = '1500';
			$config['max_height']  ='1500' ;		  
			$config['file_name']  = time().mt_rand(1000,999);			
			$info=array();
			$imgEXT=array('gif','png','jpg','jpeg');			
			//检查是否有不是图片上传									
		 	foreach($_FILES as $key=>$val){ 
				$filename = $_FILES[$key]['name'];
                $tmp = explode('.', $filename);              
                $ext= $tmp[count($tmp) - 1];                 
                if(!in_array($ext,$imgEXT)){ 
	                $this->session->set_flashdata('name',$data['name']);			
					$this->session->set_flashdata('companyName',$data['companyName']);
					$this->session->set_flashdata('industryClass',$data['industryClass']);
					$this->session->set_flashdata('corporation',$data['corporation']);
					$this->session->set_flashdata('contact',$data['contact']);
					$this->session->set_flashdata('companyAddress',$data['companyAddress']);
					$this->session->set_flashdata('companyProfile',$data['companyProfile']);
					$this->session->set_flashdata('imgError','上传图片格式错误');             	                	
					redirect ('home/index/register');
	                return ;
                }                                          
            }
			$error=array();
            //上传图片
			$this->load->library('upload');
            foreach($_FILES as $key=>$val){ 				                 	
                $this->upload->initialize($config);
                $this->upload->do_upload($key);               
                $info[$key] =$this->upload->data();
                if ($this->upload->display_errors()!=0){
                	$error[$key]=$this->upload->display_errors();
                }
                                                 
            }
			if(count($error)>0){				
				if($error['license']){
					$imgerror=$error['license'];
				}elseif ($error['tax']){
					$imgerror=$error['tax'];
				}elseif ($error['prove']){
					$imgerror=$error['prove'];
				}elseif ($error['Product']){
					$imgerror=$error['Product'];
				};				
				$this->session->set_flashdata('name',$data['name']);			
				$this->session->set_flashdata('companyName',$data['companyName']);
				$this->session->set_flashdata('industryClass',$data['industryClass']);
				$this->session->set_flashdata('corporation',$data['corporation']);
				$this->session->set_flashdata('contact',$data['contact']);
				$this->session->set_flashdata('companyAddress',$data['companyAddress']);
				$this->session->set_flashdata('companyProfile',$data['companyProfile']);
				$this->session->set_flashdata('imgError',$imgerror);             	                	
	             redirect ('home/index/register');
	             return ;			
			}            
            
            $data['license']=$info['license']['is_image']?$info['license']['file_name']:0;
            $data['tax']=$info['tax']['is_image']?$info['tax']['file_name']:0;
            $data['prove']=$info['prove']['is_image']?$info['prove']['file_name']:0;
            $data['Product']=$info['Product']['is_image']?$info['Product']['file_name']:0;         
			$rs=$this->db->insert('user', $data);
			if($rs){				
				loginError('注册成功',site_url('home/index/quit'));
			}else{
				redirect ('home/index/register');
			}
            

		}
	
	}
	
	function search(){
		$index['nav']=$this->nav();//导航
		$index['bottonNav']=$this->bottonNav();//底部导航
		$index['title']=$this->input->get('title',true);
		
		if($index['title']==""){
			$index['searchErroe']="搜索条件不可为空";
			$this->load->view('home/search_view',$index);
			return false;
		};	
		$this->config->set_item('url_suffix','');												
		$this->load->library('pagination');				
		$data ['page'] = $this->input->get ('page') ? $this->input->get ('page' ):0;
		$data ['title'] = $this->input->get('title');		
		$this->load->library('pagination');
		$per=30;
		$data['total_rows']=count($this->index->getArticle($data ['title']));
		$config['base_url'] = site_url('search?title='.$data ['title']);//分页的路径
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;	
		$config['query_string_segment'] = 'page';	
		$config['total_rows'] =$data ['total_rows'];//
		$config['per_page'] = $per;
		$config['uri_segment']=$data ['page'];
		$config['num_links'] = 3;
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
		$index['links']= $this->pagination->create_links();
    	$offset=$data ['page'];  //偏移量	
    	$this->db->limit($per,$offset);    	    	 	   	
		$index['num']=$config['total_rows'];
		$index['searchData']=$this->index->getArticle($data ['title']);
		
		$this->load->view('home/search_view',$index);
	}
	function about(){
		$index['nav']=$this->nav();//导航
		$index['bottonNav']=$this->bottonNav();//底部导航
		$this->load->view('home/about_view',$index);
	}
	function freeVideoList(){
		$index['nav']=$this->nav();//导航	
		$index['bottonNav']=$this->bottonNav();//底部导航		
		$this->load->library('pagination');	
		$this->config->set_item('url_suffix','');			
		$per=10;//每页显示个数	
		$data['total_rows']=count($this->index->getFreeVideo());
		$config['base_url'] = site_url().'freeVideoList';//分页的路径		
		$config['page_query_string'] = FALSE;
		$config['total_rows'] =$data['total_rows'];
		$config['per_page'] = $per;
		$config['uri_segment']=2;//分页方法自动测定你 URI 的哪个部分包含页数
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
        $offset=$this->uri->segment(2)!==FALSE?$this->uri->segment(2):0;
        $this->db->limit($per,$offset);    	    	 	   	
		$index['freeVideoData']=$this->index->getFreeVideo();
		$index['num']=$config['total_rows'];
		$index['links']= $this->pagination->create_links();		
		$index['rightFreevideo']=$this->index->getRightFreeVideo();
		$this->load->view('home/freeVideoList_view',$index);
	}
	function freeVideo(){
		$index['nav']=$this->nav();//导航	
		$index['bottonNav']=$this->bottonNav();//底部导航
		$id=$this->uri->segment(2);
		$index['freevideo']=$this->index->getOneFreeVideo($id);
		$index['rightFreevideo']=$this->index->getRightFreeVideo();
		$this->load->view('home/freeVideo_view',$index);	
	}
	function contact(){
		$index['nav']=$this->nav();//导航	
		$index['bottonNav']=$this->bottonNav();//底部导航
		$this->load->view('home/contact_view',$index);
	}

}