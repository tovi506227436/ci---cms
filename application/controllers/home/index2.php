<?php
header("Content-Type:text/html;charset=utf-8");
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Index2 extends MY_Controller  {
	function __construct() {
		parent::__construct ();	
		
	}
	public  function index(){		
		dump($this->article());	
	
	}
	

}