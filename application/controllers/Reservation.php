<?php

class Reservation extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        # $this->load->model('Lat5_model');
    }

    public function index() {
        
    }

    public function add() {
        
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
