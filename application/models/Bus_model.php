<?php

class Bus_model extends CI_Model {

    public function getAll() {
        $query = $this->db->query("SELECT A.*, B.`region` as destination_display 
            FROM `bus` A 
            INNER JOIN `destination` B 
                ON A.`destination` = B.`alias`
            ORDER BY A.`po`"
        );
        return $query->result();
    }

    public function create() {
        
    }

    public function delete($id) {

    }

    public function update() {
        
    }

    public function getByPK() {
        
    }

}
