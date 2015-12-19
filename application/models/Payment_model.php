<?php
class Payment_model extends CI_Model{
	public function create() {
		$data = array(
            'reservation_id' => explode('-', $this->input->post('booking_code'))[2],
            'account_holder' => $this->input->post('account_holder'),
            'transfer_time' => $this->input->post('transfer_time')
        );

        # buat akun baru
        $this->db->insert('payment', $data);
	}

    public function update() {
        $data = array(
            'account_holder' => $this->input->post('account_holder'),
            'transfer_time' => $this->input->post('transfer_time')
        );

        # buat akun baru
        $this->db->update('payment', $data, [
            'reservation_id' => explode('-', $this->input->post('booking_code'))[2],
        ]);
    }

    public function getAll(){
        return $this->db->query("SELECT P.*, R.`booking_code`, 
            R.`customer_name`, R.`phone`, R.`status` 
            FROM `payment` P 
            INNER JOIN `reservation` R 
                ON P.`reservation_id` = R.`id`
            WHERE R.`po_id` = ?
            LIMIT 50",
            [$this->session->userdata('id')]
        )->result();
    }

    public function getByYear(){
        return $this->db->query("SELECT MONTH(`transfer_time`) as month, COUNT(*) as `count` 
            FROM `reservation` R 
            INNER JOIN `payment` P 
                ON R.`id` = P.`reservation_id` 
            WHERE R.`status` = 3 
                AND YEAR(`transfer_time`) = YEAR(CURRENT_TIMESTAMP)
            GROUP BY MONTH(`transfer_time`)"
        )->result();
    }

    public function getByMonth(){
        
    }
}
