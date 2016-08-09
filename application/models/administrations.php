<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class administrations extends CI_Model {

    function HaadSubmittion($userid,$UserTypeId,$SessionId,$data) {
        $table = 'administrations';
        $this->db->where('UserId', $userid);
        $this->db->where('UsertypeId', $UserTypeId);
        $this->db->where('SessionId', $SessionId);
        $this->db->update($table, $data);
        if ($this->db->_error_message()) {
            return FALSE; 
        } 
        else {
            return TRUE;
        }
    }




    function DeanSubmittion($userid,$UserTypeId,$SessionId,$data) {
        $table = 'administrations';
        $this->db->where('UserId', $userid);
        $this->db->where('UsertypeId', $UserTypeId);
        $this->db->where('SessionId', $SessionId);
        $this->db->update($table, $data);
        if ($this->db->_error_message()) {
            return FALSE; 
        } 
        else {
            return TRUE;
        }
    }



    function IqacHeadSubmittion($userid,$UserTypeId,$SessionId,$data) {
        $table = 'administrations';
        $this->db->where('UserId', $userid);
        $this->db->where('UsertypeId', $UserTypeId);
        $this->db->where('SessionId', $SessionId);
        $this->db->update($table, $data);
        if ($this->db->_error_message()) {
            return FALSE; 
        } 
        else {
            return TRUE;
        }
    }

}