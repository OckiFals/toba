<?php

class Reservation_model extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->model('Schedule_model');
    }
    
    public function getByBookingCode($code) {
        return $this->db->query("SELECT P.*, R.`booking_code`, 
            R.`customer_name`, R.`phone`, R.`status` 
            FROM `payment` P 
            RIGHT JOIN `reservation` R 
                ON P.`reservation_id` = R.`id`
            WHERE R.`booking_code` = ?",
            [$code]
        )->row();
    }

    public function create() {
        # ambil reservasi dengan id paling baru(terbesar)
        $reservation = $this->Schedule_model->db->query("SELECT MAX(`id`) as `id` FROM `reservation`")->row();
        # ambil data schedule
        $schedule = $this->Schedule_model->getByPK(
            $this->input->get('q')
        );

        $bus_name = (strrpos($schedule->bus_name, ' ')) ? 
            strtoupper(explode(' ', $schedule->bus_name)[0]) : strtoupper($schedule->bus_name);
        $reservation_id = $reservation->id+1;
        $booking_code = "{$bus_name}{$schedule->bus_id}-{$schedule->id}-{$reservation_id}";
        
        $data = array(
            'po_id' => $schedule->po,
            'customer_name' => $this->input->post('customer_name'),
            'phone' => $this->input->post('customer_phone'),
            'booking_code' => $booking_code
        );

        $this->db->insert('reservation', $data);

        return $booking_code;
    }

    public function validate() {
        $this->db->update('reservation', ['status' => 3], [
            'booking_code' => $this->input->post('booking_code')
        ]);
    }

    public function confirm() {
        $this->db->update('reservation', ['status' => 2], [
            'booking_code' => $this->input->post('booking_code')
        ]);
    }

}
