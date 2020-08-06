<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Model extends CI_Model {

	public function get_laporan()
	{
		return $data_laporan= $this->db->get('laporan')->result();
	}

	public function masuk_db()
	{
		$data_laporan=array(
            'id_laporan'=>$this->input->post('id_laporan'),
            'bencana'=>$this->input->post('bencana'),
            'lokasi'=>$this->input->post('lokasi'),
            'deskripsi'=>$this->input->post('deskripsi'),
            'gambar'=>$this->input->post('gambar'),
            'tanggal'=>$this->input->post('tanggal')       
		);
		$sql_masuk=$this->db->insert('laporan', $data_laporan);
		return $sql_masuk;
    }
}
?>