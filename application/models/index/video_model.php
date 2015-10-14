<?php
header("Content-type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class video_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function  getIndustryName($classId){			
		$query=$this->db->select('id,name,pid')->get_where('resourceclass',array('id'=>$classId));				
		$data =$query->result_array();					
		return $data;
	}
	function  getVideo($classId){			
		$query=$this->db->select('id,title,videoUrl,classId,coverUrl,resourceClass')->order_by('orderlist asc,time desc')->get_where('video',array('status'=>1,'resourceClass'=>$classId));				
		$data =$query->result_array();
		return $data;
	}
	
	function  getVideoNum($classId){			
		$this->db->select('id');
		$this->db->where(array('status'=>1,'resourceClass'=>$classId));
		$this->db->from('video');
		return $this->db->count_all_results();
	}	

	function  getRightNode($id,$classId){			
		$query=$this->db->select('id,name')->where('id !=',$id)->order_by('orderlist asc,time desc')->get_where('resourceclass',array('status'=>1,'pid'=>$classId),3);				
		$data =$query->result_array();
		foreach ($data as $k=>$v){
			$data[$k]['list']=$this->getRightVideo($v['id']);
		}
		return $data;
	}
	
	function  getRightVideo($classId){
		$query=$this->db->select('id,title,time')->order_by('orderlist asc,time desc')->get_where('video',array('status'=>1,'resourceClass'=>$classId),6);				
		$data =$query->result_array();
		return $data;
	
	}
	function  getOneVideo($id){			
		$query=$this->db->select('id,title,videoUrl,classId,coverUrl,resourceClass,abstract,time')->order_by('orderlist asc,time desc')->get_where('video',array('status'=>1,'id'=>$id));				
		$data =$query->result_array();
		$data['IndustryName']=$this->getIndustryName($data['0']['resourceClass']);
		return $data;
	}
	function getRecordingSpot($userID,$videoID){
		$query=$this->db->select('id,recordingSpot')->order_by('time', 'desc')->get_where('videohistory',array('userID'=>$userID,'videoID'=>$videoID),1);				
		$data =$query->result_array();
		return $data;
	
	}
	
	
	function  videoHistory($id,$videoId){			
		$query=$this->db->select('id,videoID,userID')->get_where('videoHistory',array('videoID'=>$videoId,'userID'=>$id));				
		$data =$query->result_array();		
		return $data;
	}
	//更新观看时间
	function  updataVideoHistoryTime($id,$data){			
		$this->db->where('id', $id);
		$rs=$this->db->update('videoHistory', $data);
		return $rs; 		
	}
	//观看条数
	function videoHistoryNum($userId){
		$query=$this->db->select('id')->get_where('videoHistory',array('userId'=>$userId));				
		return $query->num_rows();	
	}
	
	//删除最早的一条记录
	function  delect($id){	
		$data=$this->selectMin($id);	
		$status= $this->db->delete('videoHistory', array('id' =>$data['0']['id']));
		return $data;	 	
	}
	function selectMin($id){
		$query=$this->db->select('id,time')->order_by('time','asc')->get_where('videoHistory',array('userID'=>$id),1);
		$data =$query->result_array();
		return $data;
	}
	
	//修改观看视频完成
	function  updataVideo($userId,$videoId,$data){			
		$this->db->where(array('userID'=>$userId,'videoID'=>$videoId));
		$rs=$this->db->update('videoHistory', $data);
		return $rs; 
		
	}
	//观看完成的视频是否已经存在
	function  isVideoComplete($id,$videoId){			
		$query=$this->db->select('id,videId,userId')->get_where('videoComplete',array('videId'=>$videoId,'userId'=>$id));				
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