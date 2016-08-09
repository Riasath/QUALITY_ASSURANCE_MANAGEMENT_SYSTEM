<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->LoginValidation();
                
	}


	public function loginvalidation(){
            $username = $this->input->post('name');
            $password = $this->input->post('password');
            $UserTypeId = $this->input->post('UserTypeId');
            $SemesterId = $this->input->post('SemesterId');
            $YearId = $this->input->post('YearId');
            $DepertmentId = $this->input->post('DepertmentId');
            $FacultyId = $this->input->post('FacultyId');
            $this->form_validation->set_rules('name','username','trim|required|xss_clean');
            $this->form_validation->set_rules('password','Password','trim|required|xss_clean');
            if($this->form_validation->run()=== FALSE)
            {
       
                redirect('welcome');
                	
             
                
            }
            else {
                $this->submit();
                
            }
     }






      public function submit(){

            $username = $this->input->post('name');
            $password = $this->input->post('password');
            $UserTypeId = $this->input->post('UserTypeId');
            $SemesterId = $this->input->post('SemesterId');
            $YearId = $this->input->post('YearId');
            $DepertmentId = $this->input->post('DepertmentId');
            $FacultyId = $this->input->post('FacultyId');
            

            
            $this->load->model('user');
            $userid = $this->user->login_check($username,$password);
            
            if($userid == FALSE){
                $this->session->set_flashdata('login_failed','you are not invited or check ur password');
                redirect('welcome');
                //echo $result;
            }
            else{
                    $this->load->model('user');
                    $result = $this->user->loginTypeCheck($userid,$UserTypeId);
                    if($result == FALSE)
                    {
                        $this->session->set_flashdata('login_failed','Please Check Your User Type');
                        redirect('welcome');
                    }
                    else
                    {
                        if($UserTypeId == '1')
                        {
                            $user_data = array(
                                                'YearId' => $YearId,
                                                'SemesterId' => $SemesterId,
                                                'UserTypeId' => $UserTypeId,
                                                'userid' => $userid,
                            
                                                'FacultyId' => $FacultyId,
                                                'DepertmentId' => $DepertmentId
                                                
                                               );
                            $this->session->set_userdata($user_data);
                            redirect('teacher');

                        } 
                        else if ($UserTypeId == '2') {


                            $this->load->model('user');
                            $result = $this->user->CheckDepartment($userid,$DepertmentId);
                            if($result == FALSE)
                            {
                                $this->session->set_flashdata('login_failed','Sir Please Check Your Department ');
                                redirect('welcome');
                            }
                            $SessionId = $this->user->GetSession($YearId,$SemesterId);
                            $SubmissionTestuser= $this->user->SubmissionTest($userid,$SessionId,$UserTypeId);

                            if($SubmissionTestuser == 1)
                            {
                                $this->session->set_flashdata('login_failed','Sir You already Submit This Form ');
                                redirect('welcome');
                            }


                            $user_data = array(
                                                'YearId' => $YearId,
                                                'SemesterId' => $SemesterId,
                                                'UserTypeId' => $UserTypeId,
                                                'userid' => $userid,
                            
                                                'FacultyId' => $FacultyId,
                                                'DepertmentId' => $DepertmentId
                                                
                                               );
                            $this->session->set_userdata($user_data);
                            redirect('head');
                            







                        }
                        else if($UserTypeId == '3'){
                            

                          

                            $result = $this->user->CheckFaculty($userid,$DepertmentId,$FacultyId);
                            if($result == FALSE)
                            {
                                $this->session->set_flashdata('login_failed','Sir Please Check Your Faculty ');
                                redirect('welcome');
                            }

                            
                            $result = $this->user->DeanVarification($userid,$DepertmentId,$FacultyId);

                            $SessionId = $this->user->GetSession($YearId,$SemesterId);
                            $SubmissionTestuser= $this->user->SubmissionTest($userid,$SessionId,$UserTypeId);

                            if($SubmissionTestuser == 1)
                            {
                                $this->session->set_flashdata('login_failed','Sir You already Submit This Form ');
                                redirect('welcome');
                            }

                            if($result == FALSE)
                            {
                                $this->session->set_flashdata('login_failed','Sir Please Check Your Department with Faculty ');
                                redirect('welcome');
                            }
                            $user_data = array(
                                                'YearId' => $YearId,
                                                'SemesterId' => $SemesterId,
                                                'UserTypeId' => $UserTypeId,
                                                'userid' => $userid,
                            
                                                'FacultyId' => $FacultyId,
                                                'DepertmentId' => $DepertmentId
                                                
                                               );
                            $this->session->set_userdata($user_data);
                            redirect('dean');




                        }
                        else
                        {
                             $user_data = array(
                                                'YearId' => $YearId,
                                                'SemesterId' => $SemesterId,
                                                'UserTypeId' => $UserTypeId,
                                                'userid' => $userid,
                            
                                                'FacultyId' => $FacultyId,
                                                'DepertmentId' => $DepertmentId
                                                
                                               );
                            $this->session->set_userdata($user_data);
                            redirect('iqac');
                        }
                    }
                
            }
     }



     public function logout()
    {
        $this->session->unset_userdata('user_data');
        $this->session->unset_userdata('UserCodeName');
        $this->session->unset_userdata('UserYearName');
        $this->session->unset_userdata('UserSemesterName');
        $this->session->unset_userdata('UserCourseName');
        $this->session->unset_userdata('UserSectionName');
        $this->session->sess_destroy();
        redirect('welcome');
                
    }

}