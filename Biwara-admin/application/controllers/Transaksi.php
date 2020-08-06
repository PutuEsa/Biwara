<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi extends CI_Controller {

public function index()
	{
        $data['konten']="v_transaksi";
        $this->load->model('Transaksi_Model');
        $data['data_transaksi']=$this->Transaksi_Model->get_transaksi();
        $this->load->model('Donasi_Model');
		$data['data_donasi']=$this->Donasi_Model->get_donasi();
		$this->load->model('Laporan_Model');
        $data['data_laporan']=$this->Laporan_Model->get_laporan();
        $data['data_total']=$this->Donasi_Model->total_donasi();
		$this->load->view('template', $data);
    } 
    
	public function hapus_transaksi($id_transaksi)
	{
		$this->load->model('Transaksi_Model');
		$proses_delete = $this->Transaksi_Model->hapus_transaksi($id_transaksi);

		if ($proses_delete) {
			$this->session->set_flashdata('pesan','berhasil hapus data');
		}else{
			$this->session->set_flashdata('pesan','gagal hapus data');
		}
		redirect('transaksi','refresh');
    }
}