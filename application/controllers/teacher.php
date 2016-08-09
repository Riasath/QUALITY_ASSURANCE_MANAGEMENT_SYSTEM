<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teacher extends CI_Controller {

	public function index()
	{
		$this->loadteacherdata();
                
	}

	public function loadteacherdata(){

		$userid = $this->session->userdata('userid');
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

        if($Status!=0)
        {

          $this->session->set_flashdata('login_failed','You already Submit Your IQAC Form');
          redirect('welcome');
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
        $data['userDetails']= $userDetails;
        $data['FacultyName']= $FacultyName;
        $data['YearName']= $YearName;
        $data['SemesterName']= $SemesterName;
        $data['TeacherResult']= $TeacherResult;
        $this->session->set_userdata('UserYearName',  $YearName);
        $this->session->set_userdata('UserSemesterName',  $SemesterName);
        $this->load->view('teacher',$data);

	}

	public function View($value)
	{
		$data['value']= $value;
    $this->load->model('storage');
    $data['iqacFormDetails'] = $this->storage->IqacFormDetails($value);
    $this->load->view('iqacForm',$data);
	}


  public function Store($value)
  {
    




    $CourseOutline = $_POST["CourseOutline"];
    $GoogleClassroom = $_POST["GoogleClassrooms"];
    $NumberOfClasses = $_POST["NumberOfClasses"];
    $ClassTest = $_POST["ClassTest"];
    $Assignment = $_POST["Assignment"];
    $Presentation = $_POST["Presentation"];
    $MidTermExamTaken = $_POST["MidTermExamTaken"];
    $FinalTermExamTaken = $_POST["FinalTermExamTaken"];
    $Attandence = $this->upload_Attandence();
    $MidTermExam = $this->upload_MidTermExam();
    $FinalTermExam = $this->upload_FinalTermExam();
    $data = array(
               'CourseOutline' => $CourseOutline,
               'GoogleClassroom' => $GoogleClassroom,
               'ClassTaken' => $NumberOfClasses,
               'ClassTest' => $ClassTest,
               'AssignmentTaken' => $Assignment,
               'PresentationTaken' => $Presentation,
               'MidTermExamTaken' => $MidTermExamTaken,
               'FinalTermExamTaken' => $FinalTermExamTaken,
               'Attaindence' => $Attandence,
               'MidQuestion' => $MidTermExam,
               'FinalQuestion' => $FinalTermExam,
               'status' => '2'
    );


   
    $this->load->model('storage');
    $this->storage->_update($value,$data);
    //echo "done";
    $this->loadteacherdata();

    



  }



  private function upload_attandence()
  {
    $UserCodeName = $this->session->userdata('UserCodeName');
    $UserYearName = $this->session->userdata('UserYearName');
    $UserSemesterName = $this->session->userdata('UserSemesterName');
    $UserCourseName = $this->session->userdata('UserCourseName');
    $UserSectionName = $this->session->userdata('UserSectionName');
    $faulplay= $UserCodeName.'-'.$UserCourseName.'-'.$UserSectionName.'-'.$UserYearName.'-'.$UserSemesterName;
    $filename=$faulplay;
    $type = explode('.', $_FILES["Attandence"]["name"]);
    $type = strtolower($type[count($type)-1]);
    $url = "./store/upload_Attandence/".$filename.'.'.$type;
    if(in_array($type, array("jpg", "jpeg", "gif", "png","pdf")))
      if(is_uploaded_file($_FILES["Attandence"]["tmp_name"]))
        if(move_uploaded_file($_FILES["Attandence"]["tmp_name"],$url))
          return $url;
    return "";
  }


  private function upload_midtermexam()
  {
    $UserCodeName = $this->session->userdata('UserCodeName');
    $UserYearName = $this->session->userdata('UserYearName');
    $UserSemesterName = $this->session->userdata('UserSemesterName');
    $UserCourseName = $this->session->userdata('UserCourseName');
    $UserSectionName = $this->session->userdata('UserSectionName');
    $faulplay= $UserCodeName.'-'.$UserCourseName.'-'.$UserSectionName.'-'.$UserYearName.'-'.$UserSemesterName;
    $filename=$faulplay;
    $type = explode('.', $_FILES["MidTermExam"]["name"]);
    $type = strtolower($type[count($type)-1]);
    $url = "./store/upload_MidTermExam/".$filename.'.'.$type;
    if(in_array($type, array("jpg", "jpeg", "gif", "png","pdf")))
      if(is_uploaded_file($_FILES["MidTermExam"]["tmp_name"]))
        if(move_uploaded_file($_FILES["MidTermExam"]["tmp_name"],$url))
          return $url;
    return "";
  }

  private function upload_finaltermexam()
  {
    $UserCodeName = $this->session->userdata('UserCodeName');
    $UserYearName = $this->session->userdata('UserYearName');
    $UserSemesterName = $this->session->userdata('UserSemesterName');
    $UserCourseName = $this->session->userdata('UserCourseName');
    $UserSectionName = $this->session->userdata('UserSectionName');
    $faulplay= $UserCodeName.'-'.$UserCourseName.'-'.$UserSectionName.'-'.$UserYearName.'-'.$UserSemesterName;
    $filename=$faulplay;
    $type = explode('.', $_FILES["FinalTermExam"]["name"]);
    $type = strtolower($type[count($type)-1]);
    $url = "./store/upload_FinalTermExam/".$filename.'.'.$type;
    if(in_array($type, array("jpg", "jpeg", "gif", "png","pdf")))
      if(is_uploaded_file($_FILES["FinalTermExam"]["tmp_name"]))
        if(move_uploaded_file($_FILES["FinalTermExam"]["tmp_name"],$url))
          return $url;
    return "";
  }
    public function submission($value)
  {
      //$data['value']= $value;
      //echo $value;
      $status = 1;
      $data = array(
               'Status' => $status
               
       );
      $this->load->model('storage');
      $result=$this->storage->StatusUpdate($value,$data);
      $data['result']= $result;
      //$data['UserCodeName'] = $this->session->userdata('UserCodeName');
      $data['UserYearName'] = $this->session->userdata('UserYearName');
      $data['UserSemesterName'] = $this->session->userdata('UserSemesterName');
      //$data['UserCourseName'] = $this->session->userdata('UserCourseName');
      //$data['UserSectionName'] = $this->session->userdata('UserSectionName');
      $this->load->view('success',$data);


  }

}