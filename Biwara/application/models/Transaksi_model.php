<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Model extends CI_Model {

    public function get_transaksi()
	{
        return $data_transaksi= $this->db->join('laporan','laporan.id_laporan=transaksi.id_laporan')
                                         ->join('donasi','donasi.id_donasi=transaksi.id_donasi')
                                         ->get('transaksi')->result();
	}

	public function get_laporan()
	{
		return $data_laporan= $this->db->get('laporan')->result();
    }
    
    public function get_donasi()
	{
		return $data_donasi= $this->db->get('donasi')->result();
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

	
	public function detail_laporan($id_laporan)
	{
		return $this->db->where('id_laporan',$id_laporan)->get('laporan')->row();
	}

	public function update_laporan()
	{
		$dt_up_laporan = array(
            'id_laporan'=>$this->input->post('id_laporan'),
            'bencana'=>$this->input->post('bencana'),
            'lokasi'=>$this->input->post('lokasi'),
            'deskripsi'=>$this->input->post('deskripsi'),
            'gambar'=>$this->input->post('gambar'),
            'tanggal'=>$this->input->post('tanggal')    
		 );
		return $this->db->where('id_laporan',$this->input->post('id_laporan'))->update('laporan', $dt_up_laporan);
	}

	public function hapus_laporan($id_laporan)
	{
		return $delete = $this->db->where('id_laporan', $id_laporan)->delete('laporan');
	}

}