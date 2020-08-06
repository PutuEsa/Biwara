<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends CI_Controller {

public function index()
	{
        $data['konten']="v_user";
		$this->load->model('user_Model');
		$data['data_user']=$this->user_Model->get_user();
		$this->load->view('template', $data);
    } 
    
    public function simpan_user()
	{
        $this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required', array('required'=>'nama_user harus diisi'));
        $this->form_validation->set_rules('email', 'email', 'trim|required', array('required'=>'email harus diisi'));
        $this->form_validation->set_rules('password', 'password', 'trim|required', array('required'=>'Password harus diisi'));
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('user_Model','user');
			$masuk=$this->user->masuk_db();
			if ($masuk==TRUE) {
				$this->session->set_flashdata('pesan', 'berhasil menambah');
			}else{
				$this->session->set_flashdata('pesan', 'gagal menambah');
			}
			redirect('user','refresh');
		} 

		else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('user','refresh');
		}
	}

	public function get_detail_user($id_user='')	/*api*/
	{
		$this->load->model('user_Model');
		$data_detail=$this->user_Model->detail_user($id_user);
		echo json_encode($data_detail);
	}
	public function update_user()
	{
        $this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required', array('required'=>'nama_user harus diisi'));
        $this->form_validation->set_rules('email', 'email', 'trim|required', array('required'=>'email harus diisi'));
        $this->form_validation->set_rules('password', 'password', 'trim|required', array('required'=>'Password harus diisi'));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('user','refresh');
		} 
		else {
			$this->load->model('user_Model');
			$proses_update=$this->user_Model->update_user();
			if ($proses_update) {
				$this->session->set_flashdata('pesan','berhasil update');
			}
			else{
				$this->session->set_flashdata('pesan','gagal update');
			}
			redirect('user','refresh');
		}
	}

	public function hapus_user($id_user)
	{
		$this->load->model('user_Model');
		$proses_delete = $this->user_Model->hapus_user($id_user);

		if ($proses_delete) {
			$this->session->set_flashdata('pesan','berhasil hapus data');
		}else{
			$this->session->set_flashdata('pesan','gagal hapus data');
		}
		redirect('user','refresh');
    }
}