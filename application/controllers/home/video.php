<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Video extends MY_Controller  {
	function __construct(){
		parent::__construct ();
		$this->load->model('index/login_model','login');
		$this->load->model('index/index_model','index');
		$this->load->model('index/video_model','video');
		if(get_cookie('userID')==""){
			alertPrompt('请先登陆',site_url('index'));						
		}
		if(get_cookie('level')!='2'){
			alertPrompt('此栏目为会员可观看，请先开通会员',site_url('index'));						
		}
		if(get_cookie('userName')){
			$sessId=$this->video->getSession(get_cookie('userID'));
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
		$index['IndustryName']=$this->video->getIndustryName($classId);//分类名称		
		$this->config->set_item('url_suffix','');			
		$per=9;//每页显示个数	
		$data['total_rows']=$this->video->getVideoNum($classId);
		$config['base_url'] = site_url().'video/'.$this->uri->segment(2);//分页的路径		
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
		$index['videoData']=$this->video->getVideo($classId);
		$index['num']=$config['total_rows'];
		$index['links']= $this->pagination->create_links();	
		$index['RightData']= $this->video->getRightNode($classId,$index['IndustryName']['0']['pid']);		
		$this->load->view('home/video_view',$index);	
	}
	function videoPlayer(){
		$index['nav']=$this->nav();//导航	
		$index['bottonNav']=$this->bottonNav();//底部导航	
		$id=intval($this->uri->segment(2));		
		$index['videoPlayerData']=$this->video->getOneVideo($id);					
		$index['RightData']= $this->video->getRightNode($index['videoPlayerData']['0']['resourceClass'],$index['videoPlayerData']['IndustryName']['0']['pid']);	
		$num=$this->video->videoHistoryNum(get_cookie('userID'));
		
		$index['isHistoryData']=$this->video->isVideoComplete(get_cookie('userID'),$id);//查看之前是否已经观看完成
		
		
		$index['recordingSpot']=$this->video->getRecordingSpot(get_cookie('userID'),$id);
		//dump($recordingSpot);
		
		
		
		$data=$this->video->videoHistory(get_cookie('userID'),$id);
		if($data){
			$updateTime=array('time'=>time());
			$rs=$this->video->updataVideoHistoryTime($data['0']['id'],$updateTime);
		}else{
			if($num =='6'){
				$this->video->delect(get_cookie('userID'));				
			};				
			$addData=array(
				'userID'=>get_cookie('userID'),
				'videoID'=>$id,							
				'time'=>time()			
			);						
			$rs=$this->db->insert('videoHistory', $addData);		
		};	
				
		$this->load->view('home/videoPlayer_view',$index);
	}
	function okPlayer(){
		$videoId=$this->input->post('vodeId',true);
		//$data=array('isComplete'=>2);
		//$is=$this->video->updataVideo(get_cookie('userID'),$videoId,$data);
		
		$data=$this->video->isVideoComplete(get_cookie('userID'),$videoId);//已看完的电影是否存在
		if(!$data){
			$data=array(
				'videId'=>$videoId,
				'userId'=>get_cookie('userID'),
				'time'=>time()	
			);			
			$rs=$this->db->insert('videoComplete', $data);	
		}			
	}
	function recordingSpot(){		
		$videoId=$this->input->post('vodeId',true);
		$palyTime=$this->input->post('palyTime',true);
		$data=array('recordingSpot'=>$palyTime);
		$is=$this->video->updataVideo(get_cookie('userID'),$videoId,$data);
		//echo get_cookie('userID');
		//echo $this->db->last_query();
		//exit;
		if($is){
			echo 1;
		}else{
			echo 2;
		}
	
	}
}