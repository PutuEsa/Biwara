<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

	public function get_user()
	{
		return $data_user= $this->db->get('user')->result();
	}

	public function masuk_db()
	{
		$data_user=array(
			'id_user'=>$this->input->post('id_user'),
            'nama_user'=>$this->input->post('nama_user'),
			'email'=>$this->input->post('email'),
            'password'=>$this->input->post('password')            
		);
		$sql_masuk=$this->db->insert('user', $data_user);
		return $sql_masuk;
	}

	
	public function detail_user($id_user)
	{
		return $this->db->where('id_user',$id_user)->get('user')->row();
	}

	public function update_user()
	{
		$dt_up_user = array(
			'id_user'=>$this->input->post('id_user'),
			'nama_user'=>$this->input->post('nama_user'),
			'email'=>$this->input->post('email'),
            'password'=>$this->input->post('password')    
		 );
		return $this->db->where('id_user',$this->input->post('id_user'))->update('user', $dt_up_user);
	}

	public function hapus_user($id_user)
	{
		return $delete = $this->db->where('id_user', $id_user)->delete('user');
	}

}