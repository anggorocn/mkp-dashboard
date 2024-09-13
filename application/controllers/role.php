<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		if (!$this->kauth->getInstance()->hasIdentity())
		{
			redirect('app');
		}			
				
		$this->HAKAKSES = $this->kauth->getInstance()->getIdentity()->HAKAKSES; 
		$this->HAKAKSES_DESC = $this->kauth->getInstance()->getIdentity()->HAKAKSES_DESC; 
		$this->USER_LOGIN_ID = $this->kauth->getInstance()->getIdentity()->USER_LOGIN_ID; 

							
		
	}
	public function index()
	{
		$this->load->view('role/index', $data);
	}
	

}

