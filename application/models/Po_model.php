<?php

class Po_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
    	$this->db->order_by('name', 'DSC');
        $query = $this->db->get('po');
        return $query->result();
    }

    public function create() {

    }
}

