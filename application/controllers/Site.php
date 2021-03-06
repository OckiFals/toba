<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Account_model');
        $this->load->model('Ticket_model');
        $this->load->model('Payment_model');
        $this->load->model('Reservation_model');
        $this->load->model('Po_model');
    }

    /**
     * Halaman Utama Sistem
     * ---------------------
     * Menentukan isi halaman yang akan dimuat
     * berdasarkan pada jenis aktor  
     * 
     * @target: all
     * @method: GET
     * @route: /  
     */
    public function index() {
        # jika request berasal dari admin
        if (1 == $this->session->userdata('type')) {
            $this->load->view('admin-home');
        }
        # jika request berasal dari agent
        else if (2 == $this->session->userdata('type')) {
            $graphic_incomes = [];
            $data = $this->Payment_model->getByYear();
            for ($i=0; $i<count($data); $i++) {
                $graphic_incomes[$data[$i]->month] = $data[$i]->count;
            }

            $this->load->view('agent-home', [
                'payments' => $this->Payment_model->getAll(),
                'graphic_incomes' => $graphic_incomes,
                'total_income' => $this->Po_model->getIncomeThisMonth()->total_income,
                'total_reservation' => count($this->Po_model->getReservations())
            ]);
        }
        # jika request berasal dari selainnya(pelanggan)
        else {
            $this->load->view('home');
        }
    }

    /**
     * Halaman Login
     * --------------
     * Menyediakan layanan untuk menulis sesi aktif pada sistem
     * 
     * @target: Admin, Agent
     * @method: GET, POST
     * @route: /login-rahasia 
     */
    public function login() {
        # memastikan aktor tidak melakukan login dua kali
        if (null !== $this->session->userdata('id'))
            redirect(base_url(), 'refresh');

        if ("POST" === $this->input->server('REQUEST_METHOD')) {
            # ambil data dari model
            $dataAccount = $this->Account_model->getByPK(
                $this->input->post('id')
            );

            # validasi akun
            if ((null !== $dataAccount) && 
                (md5($this->input->post('password')) === $dataAccount['password'])) {
                unset($dataAccount['password']);
                # set data session sebagai tanda bahwa user telah ter otentifikasi
                $this->session->set_userdata($dataAccount);

                # arahkan kembali ke home
                redirect(base_url());
            } else {
                $this->session->set_userdata('flash-message', 'ID atau password salah');
                redirect(base_url('login-rahasia'));
            }
            
        } else {
            $this->load->view('login');
        }
    }

    /**
     * Fungsi Logout
     * --------------
     * Menyediakan layanan untuk menghapus sesi aktif
     * 
     * @target: Admin, Agent
     * @method: GET
     * @route: /logout-rahasia 
     */
    public function logout() {
        $this->session->unset_userdata([
            'id' => '',
            'name' => '',
            'type' => '',
            'created_at' => ''
        ]);
        $this->session->sess_destroy();
        # arahkan kembali ke home
        redirect(base_url(), 'refresh');
    }

    /**
     * Fungsi Pencarian Tiket
     * --------------
     * Menyediakan layanan bagi Pelangan untuk melakukan
     * Pencarian tiket
     * 
     * @target: Pelanggan
     * @method: GET, AJAX
     * @route: /search 
     */
    public function search() {
        # set zona waktu lokal
        date_default_timezone_set('Asia/Jakarta');
        
        $data = $this->Ticket_model->search(
            $this->input->get('dest'),
            date('Y-m-d', strtotime($this->input->get('date'))),
            $this->input->get('class')
        );

        sleep(1);

        echo json_encode($data);
    }
}