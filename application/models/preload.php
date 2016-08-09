<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class preload extends CI_Model {




    function LoadType($order_by) {
    $table = "usertype";
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
    }


    function LoadSemester($order_by) {
    $table = "semester";
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
    }

    function LoadDepertment($order_by) {
    $table = "depertment";
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
    }

    function Loadyear($order_by) {
    $table = "year";
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
    }

    function LoadFaculty($order_by) {
    $table = "faculty";
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
    }

   
}