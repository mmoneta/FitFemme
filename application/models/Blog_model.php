<?php
    class Blog_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }
        
        function form_insert($table, $data) {
            $this->db->insert($table, $data);
        }
        
        function comments_select($table, $url) {
            $this->db->select('*');
            $this->db->from($table);
            $this->db->order_by("Date", "desc");
            $this->db->where('URL', $url);
            $query = $this->db->get();
            $row = $query->result_array();
            return $row;
        }
    }
?>