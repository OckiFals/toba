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

    /**
     * Membuat data bus baru
     * Data yang disimpan berasal dari input
     * yang dikirim melalui method post
     */
    public function create() {
        $data = array(
            'po' => $this->input->post('po'),
            'bus_name' => $this->input->post('bus'),
            'destination' => substr($this->input->post('destination'), strpos(
                    $this->input->post('destination'), '('
                ) + 1, -1
            ),
            'class' => $this->input->post('class'),
            'capacity' => $this->input->post('capacity'),
            'ticket_price' => $this->input->post('ticket_price')
        );

        $this->db->insert('bus', $data);
    }

    /**
     * Mengubah data bus yang sudah ada
     * Data yang disimpan berasal dari input
     * yang dikirim melalui method post
     *
     * @param $id id bus
     */
    public function update($id) {
        $data = array(
            'po' => $this->input->post('po'),
            'bus_name' => $this->input->post('bus'),
            'destination' => strtoupper(
                substr($this->input->post('destination'), strpos(
                        $this->input->post('destination'), '('
                    ) + 1, -1
                )
            ),
            'class' => $this->input->post('class'),
            'capacity' => $this->input->post('capacity'),
            'ticket_price' => $this->input->post('ticket_price')
        );

        $this->db->update('bus', $data, ['id' => $id]);
    }

    /**
     * Menghapus data bus
     * Data dihapus berdasarkan data yang dikirim 
     * melalui AJAX
     *
     * @param $id id bus
     */
    public function delete($id) {
        $this->db->delete('bus', array('id' => $id));
    }

    /**
     * Fetch data berdasarkan ID bus
     * @param  String $name ID bus
     * @return stdClass
     */
    public function getByPK($pk) {
        return $this->db->query("SELECT A.*, B.`region` as destination_display 
            FROM `bus` A 
            INNER JOIN `destination` B 
                ON A.`destination` = B.`alias`
            WHERE A.`id` = ?
            ORDER BY A.`po`", 
            [$pk]
        )->row();
    }

}
