<?php

class Destination_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $query = $this->db->query("SELECT DISTINCT A.* 
        	FROM `destination` A 
        		INNER JOIN `bus` B 
        	ON A.`alias` = B.`destination`
        	ORDER BY A.`region`"
        );
        return $query->result();
    }
}