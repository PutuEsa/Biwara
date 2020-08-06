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

    public function total_donasi($id_donasi)
	{
		$data_total = "SELECT id_donasi,
						SUM (IF (id_laporan = 1, nominal, 0)) AS total";
		$result = $conn->query($data_total);

		// return $data_donasi= $this->db->select('id_laporan, nominal');
		// ('SUM (IF (id_laporan = 1, nominal, 0)) AS total')
		// 							  ->get('donasi')->result();
	}

	public function hapus_transaksi($id_transaksi)
	{
		return $delete = $this->db->where('id_transaksi', $id_transaksi)->delete('transaksi');
	}

}