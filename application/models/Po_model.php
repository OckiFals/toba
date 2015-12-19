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

    public function getReservations() {
        return $this->db->query("SELECT R.*, ( 
                SELECT COUNT(`id`)
                FROM `ticket` 
                WHERE `reservation_id` = R.`id` 
            ) AS `ticket_count`,
            (
                SELECT SUM(B.`ticket_price`) 
                FROM `ticket` T 
                INNER JOIN `schedule` S 
                    ON T.`schedule_id` = S.`id` 
                INNER JOIN `bus` B 
                    ON S.`bus_id` = B.`id` 
                WHERE T.`reservation_id` = R.`id`
            ) AS `total_income`
            FROM reservation R
            WHERE R.`po_id` = ?",
            [$this->session->userdata('id')]
        )->result();
    }

    public function getIncomeThisMonth() {
        return $this->db->query("SELECT SUM(B.`ticket_price`) AS `total_income` 
            FROM `ticket` T 
            INNER JOIN `reservation` R 
                ON T.`reservation_id` = R.`id` 
            INNER JOIN `schedule` S 
                ON T.`schedule_id` = S.`id` 
            INNER JOIN `bus` B 
                ON S.`bus_id` = B.`id` 
            INNER JOIN `destination` D 
                ON B.`destination` = D.`alias`
            WHERE R.`po_id` = ?",
            [$this->session->userdata('id')]
        )->row();
    }
}

