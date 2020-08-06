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
}
?>