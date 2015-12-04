<?php

class Schedule extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Schedule_model');
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
        if (1 != $this->session->userdata('type')) show_error('401 Unauthorized Request', 401);

        $schedules = $this->Schedule_model->getAll();
        $this->load->view('schedules/schedule-all', ['schedules' => $schedules]);
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
            # set zona waktu lokal
            date_default_timezone_set('Asia/Jakarta');
            # ambil !D bus
            $bus = substr($this->input->post('bus'), strpos(
                    $this->input->post('bus'), ':'
                ) + 2, -1
            );
            /**
             * monday-1 senin, tuesday-2 selasa, dst...
             * Jika input post hari adalah tuesday-2 maka akan
             * di explode menjadi [0] => 'tuesday', [1] => 2
             */
            $schedule_day = explode('-', $this->input->post('day'));
            $schedule_time = date('H:i:s', strtotime($this->input->post('time')));
            $startDateSource = strtotime("next {$schedule_day[0]}");
            $startDate = date('Y-m-d', $startDateSource);
            # simpan 1 jadwal pertama dalam database
            $this->Schedule_model->create(3, "{$startDate} {$schedule_time}");
            $dateNext = $startDateSource;
            $i = 0;
            for (; $i < 11; $i++) {
                # simpan 11 jadwal sisanya dalam database
                $this->Schedule_model->create($bus, date('Y-m-d', strtotime('+1 week', $dateNext)) . ' ' . $schedule_time);
                $dateNext = strtotime('+1 week', $dateNext);
            }
            # simpan info dalam session
            $this->session->set_userdata('flash-message', 'Jadwal telah ditambahkan!');
            # arahkan kembali ke /account
            redirect(base_url('account'), 'refresh');
        } else {
            $buses = $this->Bus_model->getAll();
            $this->load->view('schedules/add-schedule', ['buses' => $buses]);
        }

    }

    public function edit() {
        if (1 != $this->session->userdata('type')) show_error('401 Unauthorized Request', 401);
    }

    public function delete() {
        if (1 != $this->session->userdata('type')) show_error('401 Unauthorized Request', 401);
    }
}
