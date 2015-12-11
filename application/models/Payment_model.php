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
        
    }
    public function getByYear(){
        
    }
    public function getByMonth(){
        
    }
}
