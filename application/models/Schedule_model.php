<?php

class Schedule_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $query = $this->db->query("SELECT A.*, 
            B.`po`, B.`bus_name`, B.`destination`, 
            B.`class`, B.`capacity`, B.`ticket_price` 
            FROM `schedule` A 
                INNER JOIN `bus` B 
                ON A.`bus_id` = B.`id` 
            ORDER BY B.`po`"
        );
        return $query->result();
    }

    public function create($bus_id, $dateTime) {
        $data = array(
            'bus_id' => $bus_id,
            'time' => $dateTime
        );

        $this->db->insert('schedule', $data);
    }

    public function getByBusname($bus_name) {
        
    }

    public function update($id) {
        
    }

    public function delete($id) {
        
    }

}
