<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dean extends CI_Controller {

	public function index()
	{
		$this->loaddeandata();
                
	}


	public function loaddeandata()
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

    	//echo "Hello Dean";




    	$DepertmentTeacherList = $this->user->DeanScrach($FacultyId,$SessionId);






        $data['userDetails']= $userDetails;
        $data['FacultyName']= $FacultyName;
        $data['YearName']= $YearName;
        $data['SemesterName']= $SemesterName;
        $data['DepertmentTeacherList']= $DepertmentTeacherList;
        $this->session->set_userdata('UserYearName',  $YearName);
        $this->session->set_userdata('UserSemesterName',  $SemesterName);
        $this->load->view('dean',$data);
                
	}





	public function loadheaddata($userid)
	{
		
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


        $this->session->set_userdata('HeadTempId',  $userid);


        $this->session->set_userdata('UserYearName',  $YearName);
        $this->session->set_userdata('UserSemesterName',  $SemesterName);
        $this->load->view('deantoHead',$data);
                
	}












	public function loadteacherdata($userid){


		$this->session->set_userdata('TeacherTempId',  $userid);


		$YearId = $this->session->userdata('YearId');
		$SemesterId = $this->session->userdata('SemesterId');


		$HeadTempId = $this->session->userdata('HeadTempId');


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
        $data['tempuser']= $userid;
        $data['FacultyName']= $FacultyName;


         $data['HeadTempId']= $HeadTempId;


        $data['YearName']= $YearName;
        $data['SemesterName']= $SemesterName;
        $data['TeacherResult']= $TeacherResult;
        $this->session->set_userdata('UserYearName',  $YearName);
        $this->session->set_userdata('UserSemesterName',  $SemesterName);
        //$this->session->set_userdata('tempid',  $userid);
        $this->load->view('deantoTeacher',$data);
        


	}


	public function view($value)
	{
		$data['value'] = $value;
    	$this->load->model('storage');
    	$data['iqacFormDetails'] = $this->storage->IqacFormDetails($value);
    	$this->load->view('iqacFormValidationDean',$data);
	}


	public function revarthead($value)
	{
		$data['status'] = 0;
    	$this->load->model('user');
    	$YearId = $this->session->userdata('YearId');
		$SemesterId = $this->session->userdata('SemesterId');
		$SessionId = $this->user->GetSession($YearId,$SemesterId);
    	$FacultyId = $this->session->userdata('FacultyId');
    	$this->user->RevartHead($value,$FacultyId,$SessionId,$data);
        $this->LoadDeanData();    	
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
      $result=$this->administrations->DeanSubmittion($userid,$UserTypeId,$SessionId,$data);
      $data['result']= $result;
      $data['UserYearName'] = $this->session->userdata('UserYearName');
      $data['UserSemesterName'] = $this->session->userdata('UserSemesterName');
      $this->load->view('success',$data);


  }
}