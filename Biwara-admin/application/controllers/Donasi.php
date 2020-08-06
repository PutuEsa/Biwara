<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Donasi extends CI_Controller {

public function index()
	{
        $data['konten']="v_donasi";
		$this->load->model('Donasi_Model');
		$this->load->model('Laporan_Model');
		$data['data_donasi']=$this->Donasi_Model->get_donasi();
		$data['data_laporan']=$this->Laporan_Model->get_laporan();
		$this->load->view('template', $data);
    } 
    
    public function simpan_donasi()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required', array('required'=>'Nama donatur harus diisi'));
        $this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required', array('required'=>'No telp harus diisi'));
        $this->form_validation->set_rules('email', 'email', 'trim|required', array('required'=>'Email harus diisi'));
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required', array('required'=>'Tanggal harus diisi'));
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required', array('required'=>'Nominal harus diisi'));
        $this->form_validation->set_rules('alat_pembayaran', 'alat_pembayaran', 'trim|required', array('required'=>'Pembayaran harus diisi'));
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Donasi_Model','donasi');
			$masuk=$this->donasi->masuk_db();
			if ($masuk==TRUE) {
				$this->session->set_flashdata('pesan', 'berhasil menambah');
			}else{
				$this->session->set_flashdata('pesan', 'gagal menambah');
			}
			redirect('donasi','refresh');
		} 

		else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('donasi','refresh');
		}
	}

	public function get_detail_donasi($id_donasi='')	/*api*/
	{
		$this->load->model('Donasi_Model');
		$data_detail=$this->Donasi_Model->detail_donasi($id_donasi);
		echo json_encode($data_detail);
	}
	
	public function hapus_donasi($id_donasi)
	{
		$this->load->model('Donasi_Model');
		$proses_delete = $this->Donasi_Model->hapus_donasi($id_donasi);

		if ($proses_delete) {
			$this->session->set_flashdata('pesan','berhasil hapus data');
		}else{
			$this->session->set_flashdata('pesan','gagal hapus data');
		}
		redirect('donasi','refresh');
	}
	public function status_sukses($id_donasi)
	{
		$this->load->model('Donasi_Model');
		$ambil=$this->Donasi_Model->status_sukses($id_donasi);
   	    redirect('donasi','refresh');
	}
}