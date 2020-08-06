<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Donasi extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Donasi_Model');
	}
	
public function index()
	{
        $data['konten']="v_donasi";
		$this->load->model('Donasi_Model');
		$this->load->model('Laporan_Model');
		$data['data_donasi']=$this->Donasi_Model->get_donasi();
		$data['data_laporan']=$this->Laporan_Model->get_laporan();
		$this->load->view('template', $data);
    } 
	
	public function activity()
	{
		$this->load->model('Donasi_Model');
		$data['activities']=$this->Donasi_Model->get_activity();
		$this->load->view('v_activity',$data);
	}

    public function simpan_donasi()
	{
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
			redirect('donasi/activity','refresh');
		} 

		else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('donasi','refresh');
		}
	}
	public function get_detail_donasi($id_donasi=''){
		$data_detail=$this->Donasi_Model->detail_donasi($id_donasi);
		echo json_encode($data_detail);
	}
	public function upload_bukti(){
		$config['upload_path'] = './assets/images/foto_bukti';
		$config['allowed_types'] = 'jpg|png';

		if ($_FILES['foto_bukti']['name'] != "") {
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto_bukti')) {
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('Donasi/activity');
			} else {
				if($this->Donasi_Model->upload_bukti($this->upload->data('file_name'))){
					$this->session->set_flashdata('pesan', 'Bukti pembayaran telah diunggah. Pembayaran akan segera kami konfirmasi');
				} else {
					$this->session->set_flashdata('pesan', 'Bukti pembayaran gagal diunggah');
				}
				redirect('Donasi/activity');
			}
				
		} else {
			if ($this->Donasi_Model->upload_bukti('')) {
				$this->session->set_flashdata('pesan', 'Bukti pembayaran telah diunggah. Pembayaran akan segera kami konfirmasi');
			} else {
				$this->session->set_flashdata('pesan', 'Bukti pembayaran gagal diunggah');
			}
			redirect('Donasi/activity');
		}
	}
}
?>
