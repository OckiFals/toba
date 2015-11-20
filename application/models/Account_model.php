<?php

class Account_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $this->db->order_by('type', 'DSC');
        $query = $this->db->get('account');
        return $query->result();
    }

    /**
     * Fetch data berdasarkan ID akun
     * @param  String $name ID akun
     * @return stdClass
     */
    public function getByPK($pk) {
        $query = $this->db->get_where('account', ['id' => $pk]);
        return $query->row_array(); // untuk model lain gunakan row()
    }

    /**
     * Fetch data berdasarkan nama akun
     * @param  String $name nama akun
     * @return stdClass
     */
    public function getByName($name) {
        
    }

    /**
     * Membuat akun baru
     * Data yang disimpan berasal dari input
     * yang dikirim melalui method post
     */
    public function create() {
        $data = array(
            'id' => $this->input->post('id'),
            'password' => md5($this->input->post('password')),
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type')
        );

        $this->db->insert('account', $data);
    }

    /**
     * Mengubah data akun yang sudah ada
     * Data yang disimpan berasal dari input
     * yang dikirim melalui method post
     *
     * @param $id id akun
     */
    public function update($id) {
        $data = array(
            'id' => $this->input->post('id'),
            'password' => md5($this->input->post('password')),
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type')
        );
        $this->db->update('account', $data, array('id' => $id));
    }

    /**
     * Menghapus data akun
     * Data dihapus berdasarkan data yang dikirim 
     * melalui AJAX
     *
     * @param $id id akun
     */
    public function delete($id) {
        $this->db->delete('account', array('id' => $id));
    }

}
