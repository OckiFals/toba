<?php

class Reservation extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Reservation_model');
        $this->load->model('Payment_model');
        $this->load->model('Schedule_model');
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

            $booking_code = $this->Reservation_model->create();

            for ($i=1; $i < $ticket_count+1; $i++) { 
                $passenger_name = $this->input->post("passenger_name_{$i}");
                $passenger_id = $this->input->post("passenger_id_{$i}");
                $passenger_birth = $this->input->post("passenger_birth_{$i}");

                $this->Ticket_model->create(
                    $passenger_name,
                    $passenger_id,
                    $passenger_birth
                );
            }

            # simpan informasi 'Pesanan telah dikirim' kedalam session
            # generate booking_code 
            echo $booking_code;

        } else {
            $this->load->view('reservation', [
                'data' => $this->Schedule_model->getByPK(
                    $this->input->get('q')
                )
            ]);
        }
    }

    public function cancel() {

    }
    
    /**
     * Konfirmasi Pembayaran 
     * ----------------------
     * Untuk menghindari Pelanggan melakukan konfirmasi lebih dari satu
     * Sebelum data disimpan, dilakukan pengecekan terlebih dahulu
     * 1. Jika tidak ada data konfirmasi untuk kode booking tersebut
     *    Simpan data konfirmasi baru
     * 2. Jika data konfirmasi telah ada
     *    Perbarui berdasarkan data input yang baru 
     * @target: Pelanggan
     * @method: GET, POST 
     * @route: /konfirmasi-pembayaran
     */
    public function confirmation() {
        if ("POST" === $this->input->server('REQUEST_METHOD')) {
            $data = $this->Reservation_model->getByBookingCode($this->input->post('booking_code'));
            # jika kode booking valid
            if (null !== $data) {
                # membuat data konfirmasi baru
                if (null === $data->reservation_id) {
                    $this->Payment_model->create();
                } else { # ubah konfirmasi yang sudah ada
                    $this->Payment_model->update();
                }

                $this->Reservation_model->confirm();
                echo 'valid';
            } else {
                echo 'tidak-valid';
            }

        } else {
            $this->load->view('payment-confirmation');
        }
    }

    public function validation() {
        if (2 != $this->session->userdata('type'))
            show_error('401 Unauthorized Request', 401 );
        
        if ("POST" === $this->input->server('REQUEST_METHOD')) {
            if ("search" === $this->input->post('action')) {
                echo json_encode(
                    $this->Reservation_model->getByBookingCode(
                        $this->input->post('code')
                    )
                ); 
            } else if ("validate" === $this->input->post('action')) {
                $this->Reservation_model->validate();
                echo "Pembayaran dengan kode booking <strong>" .
                    $this->input->post('booking_code') .
                    "</strong> telah divalidasi!";
            }
        } else {
            $this->load->view('validate-payment');   
        }
    }

}
