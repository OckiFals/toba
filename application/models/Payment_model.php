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
        
    }
    public function getByMonth(){
        
    }
}
