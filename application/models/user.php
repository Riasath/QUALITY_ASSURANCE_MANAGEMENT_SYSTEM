<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class user extends CI_Model {

    public function Login_check($username,$password){
        $this->db->where('Email',$username);
        $this->db->where('Password',$password);
        
        $result = $this->db->get('user');
        return $result->row(0)->UserId;
    }


     public function LoginTypeCheck($userid,$UserTypeId){
        $this->db->where('UserId',$userid);
        $this->db->where('UsertypeId',$UserTypeId);
        $qs = $this->db->get('usertyperelation');
        return $qs->result();
    }


    public function GetSession($YearId,$SemesterId){
        $this->db->where('SemesterId',$SemesterId);
        $this->db->where('YearId',$YearId);
        $qs = $this->db->get('session');
        return $qs->row(0)->SessionId;
    }


    public function VelidationSession($SessionId,$userid){
        $this->db->where('SessionId',$SessionId);
        $this->db->where('UserId',$userid);
        $qs = $this->db->get('status');
        return $qs;
    }




    public function UserDetails($userid){
    	
    	$this->db->select('*');
        $this->db->where('UserId',$userid);   
		$this->db->from('user');
		$this->db->join('depertment', 'user.DepertmentId = depertment.DepertmentId');
		$query = $this->db->get();
		return $query;

    }

    public function GetFaculty($FacultyId){
        $this->db->where('FacultyId',$FacultyId);
        $qs = $this->db->get('faculty');
        return $qs->row(0)->Name;
    }

    public function GetYear($YearId){
        $this->db->where('YearId',$YearId);
        $qs = $this->db->get('year');
        return $qs->row(0)->Name;
    }


    public function GetSemester($semester){
        $this->db->where('SemesterId',$semester);
        $qs = $this->db->get('semester');
        return $qs->row(0)->Name;
    }




    public function CheckDepartment($userid,$departmentid){
        $this->db->where('UserId',$userid);
        $this->db->where('DepertmentId',$departmentid);
        
        $result = $this->db->get('user');
        return $result->row(0)->UserId;
    }


    public function CheckFaculty($userid,$departmentid,$FacultyId){
        
        


        $this->db->select('*');
        $this->db->where('user.UserId',$userid); 
        $this->db->where('depertment.DepertmentId',$departmentid);
        $this->db->where('depertment.FacultyId',$FacultyId);  
        $this->db->from('user');
        $this->db->join('depertment', 'user.DepertmentId = depertment.DepertmentId');
        $query = $this->db->get();
        return $query->row(0)->UserId;




    }


    public function DeanVarification($userid,$DepertmentId,$FacultyId){
        
        
        $this->db->select('*');
        $this->db->where('UserId',$userid); 
        $this->db->where('user.DepertmentId',$DepertmentId);
        $this->db->where('depertment.FacultyId',$FacultyId);     
        $this->db->from('user');
        $this->db->join('depertment', 'user.DepertmentId = depertment.DepertmentId');
        $query = $this->db->get();
        return $query;
    }


    public function SubmissionTest($userid,$SessionId,$UsertypeId){

        $this->db->where('UserId',$userid);
        $this->db->where('SessionId',$SessionId);
        $this->db->where('UsertypeId',$UsertypeId);
        
        $result = $this->db->get('administrations');
        return $result->row(0)->status;

    }



    public function HeadScrach($departmentid,$SessionId){
        
        $this->db->select('*');
        $this->db->where('DepertmentId',$departmentid);
        $this->db->where('SessionId',$SessionId);    
        $this->db->from('user');
        $this->db->join('status', 'user.UserId = status.UserId');
        $query = $this->db->get();
        return $query;

    }


    public function DeanScrach($FacultyId,$SessionId){
        
        $this->db->select('*');
        $Headtype = 2;
        $this->db->where('administrations.FacultyId',$FacultyId);
        $this->db->where('administrations.SessionId',$SessionId);
        $this->db->where('administrations.UsertypeId',$Headtype);      
        $this->db->from('user');
        $this->db->join('administrations', 'user.UserId = administrations.UserId');
        $query = $this->db->get();
        return $query;

    }


    public function DepertmentDeanList($SessionId){
        
        $this->db->select('*');
        $Headtype = 3;
        $this->db->where('administrations.SessionId',$SessionId);
        $this->db->where('administrations.UsertypeId',$Headtype);      
        $this->db->from('user');
        $this->db->join('administrations', 'user.UserId = administrations.UserId');
        $query = $this->db->get();
        return $query;

    }


     function Revert($id, $data) {
        $table = 'status';
        $this->db->where('UserId', $id);
        $this->db->update($table, $data);
    }


    function RevartHead($id,$FacultyId,$SessionId,$data) {
        $Headtype = 2;
        $table = 'administrations';
        $this->db->where('UserId', $id);
        $this->db->where('UsertypeId',$Headtype); 
        $this->db->where('SessionId',$SessionId);
        $this->db->where('FacultyId',$FacultyId); 


        $this->db->update($table, $data);
    }


    function RevartDean($id,$SessionId,$data) {
        $Headtype = 3;
        $table = 'administrations';
        $this->db->where('UserId', $id);
        $this->db->where('UsertypeId',$Headtype); 
        $this->db->where('SessionId',$SessionId);



        $this->db->update($table, $data);
    }

}