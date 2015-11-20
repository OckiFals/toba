<?php

class Bus extends CI_Controller {

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
        $this->load->view('buses/bus-all');
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
