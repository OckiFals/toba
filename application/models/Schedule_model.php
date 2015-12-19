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

    public function getByPK($id) {
        $query = $this->db->query("SELECT A.*, 
            B.`po`, B.`bus_name`, B.`destination`, 
            B.`class`, B.`capacity`, B.`ticket_price`, C.`region` as `destination_display` 
            FROM `schedule` A 
                INNER JOIN `bus` B 
                    ON A.`bus_id` = B.`id` 
                INNER JOIN `destination` C
                    ON B.`destination` = C.`alias`
            WHERE A.`id` = ?",
            [$id]
        );
        return $query->row();
    }

    public function getByBusname($bus_name) {
        
    }

    public function update($id) {
        $data = array(
            'time' => $this->input->post('time')
        );

        $this->db->update('schedule', $data, ['id' => $id]);
    }

    /**
     * Menghapus jadwal bus
     * Data dihapus berdasarkan id yang dikirim 
     * melalui AJAX
     *
     * @param $id id jadwal
     */
    public function delete($id) {
        $this->db->delete('schedule', array('id' => $id));
    }

}
