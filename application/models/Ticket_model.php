<?php

class Ticket_model extends CI_Model {

	public function search($dest, $date, $class) {
		return $this->db->query("SELECT B.*, S.`id` as schedule_id, S.`time` as schedule_time, 
				D.`region` 
			FROM `bus` B 
				INNER JOIN `schedule` S 
					ON B.`id` = S.`bus_id` 
				INNER JOIN `destination` D 
					ON B.`destination` = D.`alias` 
            WHERE D.`region` = ? AND S.`time` LIKE '" . $this->db->escape_like_str($date) . "%'",
            [$dest]
        )->result();
	}

    public function create($name, $identity, $birth) {
        
    }

    public function getByCodeBooking($code) {
        
    }

}
