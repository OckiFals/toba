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
    	# mengambil id reservasi terbaru
    	$reservation = $this->db->query("SELECT MAX(`id`) FROM `ticket`")->result();
    	# mengambil id bus dari get('bus')
    	$bus = $this->db->query("SELECT `id` 
    		FROM `bus`
    		WHERE `bus_name` = ?",
    		[$this->input->get('bus')]
    	)->result();

        $data = array(
            'passenger_name' => $name,
            'identity_no' => $identity,
            'date_of_birth' => $birth,
            'bus_id' => $bud->id,
            'reservation_id' => $reservation->id
        );

        $this->db->insert('ticket', $data);
    }

    public function getByCodeBooking($code) {
        
    }

}
