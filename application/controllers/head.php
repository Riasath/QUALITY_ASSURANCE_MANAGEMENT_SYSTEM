<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Head extends CI_Controller {

	public function index()
	{
		$this->loadheaddata();
                
	}



	public function loadheaddata()
	{
		$userid = $this->session->userdata('userid');
		$YearId = $this->session->userdata('YearId');
		$SemesterId = $this->session->userdata('SemesterId');
		$UserTypeId = $this->session->userdata('UserTypeId');
		$DepertmentId = $this->session->userdata('DepertmentId');
		$FacultyId = $this->session->userdata('FacultyId');
		$this->load->model('user');
		$userDetails = $this->user->UserDetails($userid);
    $FacultyName = $this->user->GetFaculty($FacultyId);      
    $YearName = $this->user->GetYear($YearId);
    $SemesterName = $this->user->GetSemester($SemesterId);
    $SessionId = $this->user->GetSession($YearId,$SemesterId);
    $DepertmentTeacherList = $this->user->HeadScrach($DepertmentId,$SessionId);






        $data['userDetails']= $userDetails;
        $data['FacultyName']= $FacultyName;
        $data['YearName']= $YearName;
        $data['SemesterName']= $SemesterName;
        $data['DepertmentTeacherList']= $DepertmentTeacherList;
        $this->session->set_userdata('UserYearName',  $YearName);
        $this->session->set_userdata('UserSemesterName',  $SemesterName);
        $this->load->view('head',$data);
                
	}


	public function loadteacherdata($userid){

		$YearId = $this->session->userdata('YearId');
		$SemesterId = $this->session->userdata('SemesterId');
		$UserTypeId = $this->session->userdata('UserTypeId');
		$DepertmentId = $this->session->userdata('DepertmentId');
		$FacultyId = $this->session->userdata('FacultyId');


	
    	
        $this->load->model('user');
        $SessionId = $this->user->GetSession($YearId,$SemesterId);
        if($SessionId==NULL)
        {
           $this->session->set_flashdata('login_failed','Session Invalid');
          redirect('welcome');
        }
        $Status = $this->user->VelidationSession($SessionId,$userid);


         foreach ($Status->result() as $row) {
                                  $StatusId = $row->StatusId;
                                  $Status = $row->Status;
                                  $this->session->set_userdata('UserStatus',  $StatusId);

        }

        
        




        
        $this->load->model('storage');
        $TeacherResult = $this->storage->GetTeachersResult($userid,$SessionId);




        $userDetails = $this->user->UserDetails($userid);
        $FacultyName = $this->user->GetFaculty($FacultyId);      
        $YearName = $this->user->GetYear($YearId);
        $SemesterName = $this->user->GetSemester($SemesterId);




        foreach ($userDetails->result() as $row) {
                                  $abc = $row->SortName;
                                  //echo $abc;
                                  $this->session->set_userdata('UserCodeName',  $abc);

        }
        //$testdata = $userDetails->SortName;
        //echo $testdata;
        $data['userDetails']= $userDetails;
        //$data['tempuser']= $userid;
        $data['FacultyName']= $FacultyName;
        $data['YearName']= $YearName;
        $data['SemesterName']= $SemesterName;
        $data['TeacherResult']= $TeacherResult;
        $this->session->set_userdata('UserYearName',  $YearName);
        $this->session->set_userdata('UserSemesterName',  $SemesterName);
        //$this->session->set_userdata('tempid',  $userid);
        $this->load->view('headtoteacher',$data);
        


	}

	public function view($value)
	{
		$data['value'] = $value;
    	$this->load->model('storage');
    	$data['iqacFormDetails'] = $this->storage->IqacFormDetails($value);
    	$this->load->view('iqacformvalidation',$data);
	}


	public function attaindencedownload($Attaindence)
	{
		$this->load->helper('download');
		//Get the file from whatever the user uploaded (NOTE: Users needs to upload first), @See http://localhost/CI/index.php/upload
		$data = file_get_contents($Attaindence);
		//Read the file's contents
		$name = 'AttaindenceDownload.jpg';

		//use this function to force the session/browser to download the file uploaded by the user 
		force_download($name, $data);
	}





// working on this tab
	public function revartteacher($value)
	{
		$data['Status'] = 0;
    	$this->load->model('user');
    	$this->user->Revert($value,$data);
        $this->loadheaddata();    	
	}



    public function submission()
   {
    //echo "Head";
     $status = 1;
     $data = array(
               'Status' => $status
               
       );


    $userid = $this->session->userdata('userid');
    $YearId = $this->session->userdata('YearId');
    $SemesterId = $this->session->userdata('SemesterId');
    $UserTypeId = $this->session->userdata('UserTypeId');
    $this->load->model('user');
    $SessionId = $this->user->GetSession($YearId,$SemesterId);





      $this->load->model('administrations');
      $result=$this->administrations->HaadSubmittion($userid,$UserTypeId,$SessionId,$data);
      $data['result']= $result;
      $data['UserYearName'] = $this->session->userdata('UserYearName');
      $data['UserSemesterName'] = $this->session->userdata('UserSemesterName');
      $this->load->view('success',$data);


  }
}