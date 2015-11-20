 <?php

class Lat5_model extends CI_Model {
 	public function getAll() {
		$this->db->order_by('username','ASC');
		$query = $this->db-> get('user');
		return $query->result();
	}

    public function getByPK($pk) {
        $query = $this->db-> get_where('user', ['id' => $pk]);
        return $query->result();
    }

	public function save() {
		$data = array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'level'=>$this->input->post('level')
		);
		$this->db->insert('user',$data);
	}

    public function update($id) {
        $data = array(
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
            'level'=>$this->input->post('level')
        );

        $this->db->update('user', $data, array('id' => $id));
    }

    public function delete($id) {
    	$this->db->delete('user', array('id' => $id));
    }

}