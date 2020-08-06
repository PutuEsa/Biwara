<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	public function get_admin()
	{
		return $data_admin= $this->db->get('admin')->result();
	}

	public function masuk_db()
	{
		$data_admin=array(
			'id_admin'=>$this->input->post('id_admin'),
			'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')            
		);
		$sql_masuk=$this->db->insert('admin', $data_admin);
		return $sql_masuk;
	}

	
	public function detail_admin($id_admin)
	{
		return $this->db->where('id_admin',$id_admin)->get('admin')->row();
	}

	public function update_admin()
	{
		$dt_up_admin = array(
			'id_admin'=>$this->input->post('id_admin'),
			'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')    
		 );
		return $this->db->where('id_admin',$this->input->post('id_admin'))->update('admin', $dt_up_admin);
	}

	public function hapus_admin($id_admin)
	{
		return $delete = $this->db->where('id_admin', $id_admin)->delete('admin');
	}

}