<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->login();
                
	}
	public function login(){
	
    $this->load->model('preload');
    $data['LoadType'] =$this->preload->LoadType('UserTypeId');
    $data['LoadSemester'] =$this->preload->LoadSemester('Name');
    $data['LoadDepertment'] =$this->preload->LoadDepertment('Name');
    $data['Loadyear'] =$this->preload->Loadyear('Name');
    $data['LoadFaculty'] =$this->preload->LoadFaculty('Name');
	$this->load->view('welcome',$data);

	}
        
     
}

