<?php

class Reservation extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Reservation_model');
        $this->load->model('Ticket_model');
    }

    public function index() {
        
    }

    /**
     * Buat Pemesanan
     * --------------
     * 1. Form ditampilkan jika HTTP method yang digunakan adalah GET
     *    (untuk pengaksesan pertama kali)
     * 2. HTTP method akan berubah menjadi POST jika aktor melakukan submit
     * 3. Kemudian data disimpan kedalam database
     *    
     * @target: Pelanggan
     * @method: GET, POST 
     * @route: /pemesanan
     */
    public function add() {
        if ("POST" === $this->input->server('REQUEST_METHOD')) {
            $ticket_count = $this->input->post('ticket_count');

            $this->Reservation_model->create();

            for ($i=0; $i < $ticket_count; $i++) { 
                $passanger_name = $this->input->post('passanger_name_' + $i);
                $passanger_id = $this->input->post('passanger_id_' + $i);
                $passanger_birth = $this->input->post('passanger_birth_' + $i);

                $this->Ticket_model->create(
                    $passanger_name,
                    $passanger_id,
                    $passanger_birth
                );
            }

            # simpan informasi 'Pesanan telah dikirim' kedalam session
            # generate booking_code 

        } else {
            $this->load->view('reservation');
        }
    }

    public function confirmation() {
        if ("POST" === $this->input->server('REQUEST_METHOD')) {

        } else {
            $this->load->view('payment-confirmation');
        }
    }

    public function validation() {
        if ("POST" === $this->input->server('REQUEST_METHOD')) {

        } else {
            $this->load->view('validate-payment');   
        }
    }

}
