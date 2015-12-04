<?php

class Schedule extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Bus_model');
    }

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
        if (1 != $this->session->userdata('type'))
            show_error('401 Unauthorized Request', 401 );

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
        date_default_timezone_set('Asia/Jakarta');

        /**
         * monday-1 senin, tuesday-2 selasa, dst...
         * Jika input post hari adalah tuesday-2 maka akan
         * di explode menjadi [0] => 'tuesday', [1] => 2
         */
        $schedule_day = explode('-', 'tuesday-2');

        # menampung nama hari(dalam int) dari waktu sekarang
        // $dayOfWeek = jddayofweek(date('j'));
        $dayNowOfWeek = date('N');

        if ($schedule_day[1] <= $dayNowOfWeek) {
            # menampung beda hari sekarang dengan hari yang diinputkan
            $diffDay = $dayNowOfWeek - $schedule_day[1];
            $startDate = date('j') - $diffDay;
            $startDate = strtotime("next {$schedule_day[0]}");

            echo date('d-m-Y', $startDate ) . "<br>";

            $i=0;
            for ($i; $i < 11; $i++) { 
                echo date('d-m-Y', strtotime('+1 week', $startDate ) ) . "<br>";
                $startDate = strtotime('+1 week', $startDate );
            }
        }
    }

    public function search() {
        
    }


    public function edit() {
        if (1 != $this->session->userdata('type'))
            show_error('401 Unauthorized Request', 401 );
    }

    public function delete() {
        if (1 != $this->session->userdata('type'))
            show_error('401 Unauthorized Request', 401 );
    }
}
