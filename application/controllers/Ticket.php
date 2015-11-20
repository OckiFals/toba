<?php

class Ticket extends CI_Controller {

    public function export_pdf() {
        if ("POST" === $this->input->server('REQUEST_METHOD')) {
        	if ($this->validate()) {
        		# tiket dikonversi ke format pdf
        	}
        } else {
            $this->load->view('print-ticket');
        }
    }

    public function validate() {
        return true;
    }

}
