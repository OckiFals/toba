<?php

class Schedule_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        
    }

    public function create($bus_id, $dateTime) {
        $data = array(
            'bus_id' => $bus_id,
            'time' => $dateTime
        );

        $this->db->insert('schedule', $data);
    }

    public function getByBusname() {
        
    }

    public function update() {
        
    }

    public function delete() {
        
    }

}
