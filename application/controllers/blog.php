<?php if (! defined('BASEPATH'))
		exit ('No direct script access allowed');
		

class Blog extends CI_Controller {
	
	function _construct ()
	{
		parent::_construct();
	}
	function index()
	{
		$this->load->view('coba1.html');
	}
	function belajar () 
	{
		$this->load->view('coba2');
	}
}

?>