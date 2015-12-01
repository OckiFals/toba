<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Destination extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Destination_model');
    }
    
    /**
     * Mencetak semua kota dalam bentuk JSON
     * @target: all
     * @route: /destination
     */
    public function index() {
        echo json_encode($this->Destination_model->getAll());
    }

    /**
     * Mencetak kota yang berelasi dengan bus dalam bentuk JSON
     * @target: all
     * @route: /destination/busjoin
     */
    public function busJoin() {
        echo json_encode($this->Destination_model->getBusJoin());
    }

}
