<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Error extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
	}
	function error404(){
		
		$this->load->view('error404_view');
	}
	function index(){
		
		$this->load->view('error404_view');
	}
	
}