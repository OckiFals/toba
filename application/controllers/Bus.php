<?php

class Bus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Bus_model');
    }

    /**
     * Halaman kelola bus
     * Pada halaman ini semua bus yang ada
     * ditampilkan menggunakan AJAX request
     *
     * @target: Admin
     * @method: GET
     * @route: /bus
     */
    public function index() {
        $buses = $this->Bus_model->getAll();
        $this->load->view('buses/bus-all', ['buses' => $buses]);
    }

    /**
     * Form tambah bus
     *
     * @target: Admin
     * @method: POST, GET
     * @route: /bus/add  
     */
    public function add() {
        if ("POST" === $this->input->server('REQUEST_METHOD')) {
            # taruh kode disini
        } else {
            $this->load->view('buses/add-bus');
        }
    }
    
    public function search() {

    }

    public function edit() {
        
    }

    public function delete() {
  
    }

}
