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
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name')
        );

        $this->db->insert('po', $data);
    }
}

