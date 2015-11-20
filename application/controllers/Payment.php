<?php

class Payment extends CI_Controller {

    /**
     * Halaman data pembayaran
     * 
     * @target: Agent
     * @method: GET
     * @route: /payment  
     */
    public function index() {
        $this->load->view('all-onsales-data');
    }

    public function sumByYear() {
        
    }

    public function sumByMonth() {
        
    }

}
