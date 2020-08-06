<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi_Model extends CI_Model {

	public function get_donasi()
	{
		return $data_donasi= $this->db->join('laporan','laporan.id_laporan=donasi.id_laporan')
									  ->get('donasi')->result();
	}

	public function get_laporan()
	{
		return $data_laporan= $this->db->get('laporan')->result();
	}

	public function masuk_db()
	{
		$data_donasi=array(
			'id_user'=>$this->session->userdata('id_user'),
			'tanggal'=>date("Y-m-d"),
			'id_laporan'=>$this->input->post('id_laporan'),
            'nominal'=>$this->input->post('nominal'),
			'alat_pembayaran'=>$this->input->post('alat_pembayaran'),
			'status'=>"Menunggu Pembayaran"           
		);
		$sql_masuk=$this->db->insert('donasi', $data_donasi);
		return $sql_masuk;
	}

	public function get_activity()
	{
	$this->db->select('*');
    $this->db->from('donasi');
	$this->db->join('user','user.id_user=donasi.id_user');
	$this->db->join('laporan','laporan.id_laporan=donasi.id_laporan');
    $this->db->where('donasi.id_user',$this->session->userdata('id_user'));
    $query = $this->db->get()->result();
    return $query;
	}

	public function detail_donasi($id_donasi=''){
		return $this->db->where('id_donasi', $id_donasi)->get('donasi')->row();
	}
	
	public function upload_bukti($nama_file){
			$upload = array(
				'foto_bukti'=>$nama_file
			);
		$this->db->where('id_donasi',$this->input->post('id_donasi'));
		$this->db->update('donasi', $upload);
	}
}
?>