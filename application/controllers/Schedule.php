<?php

class Schedule extends CI_Controller{

    /**
     * Halaman kelola jadwal
     * Pada halaman ini semua jadwal yang ada
     * ditampilkan menggunakan AJAX request
     *
     * @target: Admin
     * @method: GET
     * @route: /schedule
     */
    public function index() {
        $this->load->view('schedules/schedule-all');
    }

    /**
     * Form tambah jadwal
     *
     * @target: Admin
     * @method: POST, GET
     * @route: /schedule/add  
     */
    public function add() {
        if ("POST" === $this->input->server('REQUEST_METHOD')) {
            # taruh kode disini
        } else {
            $this->load->view('schedules/add-schedule');
        }
    }

    public function search() {
        
    }


    public function edit() {
        
    }

    public function delete() {
        
    }

}
