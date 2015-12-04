<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Account_model');
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
            $this->load->view('agent-home');
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
            'password' => '',
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
        # example data
        $data = [
            [
                'id' => '1',
                'bus_name' => 'Mayasari Bhakti',
                'destination' => 'Jakarta',
                'class' => 'Ekonomi',
                'color' => 'aqua'
            ],
            [
                'id' => '2',
                'bus_name' => 'Bimasena',
                'destination' => 'Jakarta',
                'class' => 'Bisnis',
                'color' => 'red'
            ],
            [
                'id' => '3',
                'bus_name' => 'Arjuno',
                'destination' => 'Jakarta',
                'class' => 'Eksekutif',
                'color' => 'green'
            ],
        ];

        sleep(1);

        echo json_encode($data);
    }

    public function search2() {
        
    }
}