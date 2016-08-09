<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class storage extends CI_Model {

     /*public function GetTeachersResult($userid,$SessionId){
        $this->db->where('UserId',$userid);
        $this->db->where('SessionId',$SessionId);
        $query=$this->db->get('store');
        return $query;

    }*/




     public function GetTeachersResult($userid,$SessionId){
        
        $this->db->select('*');
        $this->db->where('UserId',$userid);
        $this->db->where('SessionId',$SessionId);  
        $this->db->from('store');
        $this->db->join('course', 'store.CourseId = course.CourseId');
        $query = $this->db->get();
        
        return $query;

    }

    public function IqacFormDetails($value){
        
        $this->db->select('*');
        $this->db->where('StoreId',$value);   
        $this->db->from('store');
        $this->db->join('section', 'store.SessionId = section.SectionId');
        $this->db->join('course', 'store.CourseId = course.CourseId');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
                                  $UserCourseName = $row->Tittle;
                                  $SectionName = $row->SectionName;
                                  
                                  
                                  $this->session->set_userdata('UserCourseName',  $UserCourseName);
                                  $this->session->set_userdata('UserSectionName',  $SectionName);

        }
        return $query;

    }



    function _update($id, $data) {
        $table = 'store';
        $this->db->where('StoreId', $id);
        $this->db->update($table, $data);
    }



    function StatusUpdate($id, $data) {
        $table = 'status';
        $this->db->where('StatusId', $id);
        $this->db->update($table, $data);
        if ($this->db->_error_message()) {
            return FALSE; // Or do whatever you gotta do here to raise an error
        } 
        else {
            return TRUE;
        }
    }


    

}