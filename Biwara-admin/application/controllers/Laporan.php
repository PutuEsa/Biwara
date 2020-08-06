<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {

public function index()
	{
        $data['konten']="v_laporan";
		$this->load->model('Laporan_Model');
		$data['data_laporan']=$this->Laporan_Model->get_laporan();
		$this->load->view('template', $data);
    } 
    
    public function simpan_laporan()
	{
		$this->form_validation->set_rules('bencana', 'bencana', 'trim|required', array('required'=>'bencana harus diisi'));
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required', array('required'=>'lokasi harus diisi'));
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required', array('required'=>'deskripsi harus diisi'));
        $this->form_validation->set_rules('gambar', 'gambar', 'trim|required', array('required'=>'gambar harus diisi'));
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required', array('required'=>'Tanggal harus diisi'));
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Laporan_Model','laporan');
			$masuk=$this->laporan->masuk_db();
			if ($masuk==TRUE) {
				$this->session->set_flashdata('pesan', 'berhasil menambah');
			}else{
				$this->session->set_flashdata('pesan', 'gagal menambah');
			}
			redirect('laporan','refresh');
		} 

		else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('laporan','refresh');
		}
	}

	public function get_detail_laporan($id_laporan='')	/*api*/
	{
		$this->load->model('Laporan_Model');
		$data_detail=$this->Laporan_Model->detail_laporan($id_laporan);
		echo json_encode($data_detail);
	}
	public function update_laporan()
	{
		$this->form_validation->set_rules('bencana', 'bencana', 'trim|required', array('required'=>'bencana harus diisi'));
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required', array('required'=>'lokasi harus diisi'));
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required', array('required'=>'deskripsi harus diisi'));
        $this->form_validation->set_rules('gambar', 'gambar', 'trim|required', array('required'=>'gambar harus diisi'));
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required', array('required'=>'Tanggal harus diisi'));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('laporan','refresh');
		} 
		else {
			$this->load->model('Laporan_Model');
			$proses_update=$this->Laporan_Model->update_laporan();
			if ($proses_update) {
				$this->session->set_flashdata('pesan','berhasil update');
			}
			else{
				$this->session->set_flashdata('pesan','gagal update');
			}
			redirect('laporan','refresh');
		}
	}

	public function hapus_laporan($id_laporan)
	{
		$this->load->model('Laporan_Model');
		$proses_delete = $this->Laporan_Model->hapus_laporan($id_laporan);

		if ($proses_delete) {
			$this->session->set_flashdata('pesan','berhasil hapus data');
		}else{
			$this->session->set_flashdata('pesan','gagal hapus data');
		}
		redirect('laporan','refresh');
    }
}