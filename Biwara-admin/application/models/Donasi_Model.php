<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi_Model extends CI_Model {

	public function get_donasi()
	{
		$this->db->select('*');
    $this->db->from('donasi');
	$this->db->join('user','user.id_user=donasi.id_user');
	$this->db->join('laporan','laporan.id_laporan=donasi.id_laporan');
    $query = $this->db->get()->result();
    return $query;
	}

	public function get_laporan()
	{
		return $data_laporan= $this->db->get('laporan')->result();
	}

	public function masuk_db()
	{
		$data_donasi=array(
            'id_donasi'=>$this->input->post('id_donasi'),
            'nama'=>$this->input->post('nama'),
            'no_telp'=>$this->input->post('no_telp'),
            'email'=>$this->input->post('email'),
            'tanggal'=>$this->input->post('tanggal'),
            'nominal'=>$this->input->post('nominal'),
            'alat_pembayaran'=>$this->input->post('alat_pembayaran')            
		);
		$sql_masuk=$this->db->insert('donasi', $data_donasi);
		return $sql_masuk;
	}

	
	public function detail_donasi($id_donasi)
	{
		return $this->db->where('id_donasi',$id_donasi)->get('donasi')->row();
	}

	public function update_donasi()
	{
		$dt_up_donasi = array(
			'id_donasi'=>$this->input->post('id_donasi'),
            'nama'=>$this->input->post('nama'),
            'no_telp'=>$this->input->post('no_telp'),
            'email'=>$this->input->post('email'),
            'tanggal'=>$this->input->post('tanggal'),
            'nominal'=>$this->input->post('nominal'),
            'alat_pembayaran'=>$this->input->post('alat_pembayaran')     
		 );
		return $this->db->where('id_donasi',$this->input->post('id_donasi'))->update('donasi', $dt_up_donasi);
	}
	public function status_sukses($id_donasi)
	{
		$dt_up_donasi = array(
			"status"=>"Donasi Sukses"     
		 );
		return $this->db->where('id_donasi',$id_donasi)->update('donasi', $dt_up_donasi);
	}

	public function hapus_donasi($id_donasi)
	{
		return $delete = $this->db->where('id_donasi', $id_donasi)->delete('donasi');
	}

}