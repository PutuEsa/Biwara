<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

public function index()
	{
        $data['konten']="v_admin";
		$this->load->model('Admin_Model');
		$data['data_admin']=$this->Admin_Model->get_admin();
		$this->load->view('template', $data);
    } 
    
    public function simpan_admin()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required', array('required'=>'Username harus diisi'));
        $this->form_validation->set_rules('password', 'password', 'trim|required', array('required'=>'Password harus diisi'));
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Admin_Model','admin');
			$masuk=$this->admin->masuk_db();
			if ($masuk==TRUE) {
				$this->session->set_flashdata('pesan', 'berhasil menambah');
			}else{
				$this->session->set_flashdata('pesan', 'gagal menambah');
			}
			redirect('admin','refresh');
		} 

		else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('admin','refresh');
		}
	}

	public function get_detail_admin($id_admin='')	/*api*/
	{
		$this->load->model('Admin_Model');
		$data_detail=$this->Admin_Model->detail_admin($id_admin);
		echo json_encode($data_detail);
	}
	public function update_admin()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required', array('required'=>'Username harus diisi'));
        $this->form_validation->set_rules('password', 'password', 'trim|required', array('required'=>'Password harus diisi'));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('admin','refresh');
		} 
		else {
			$this->load->model('Admin_Model');
			$proses_update=$this->Admin_Model->update_admin();
			if ($proses_update) {
				$this->session->set_flashdata('pesan','berhasil update');
			}
			else{
				$this->session->set_flashdata('pesan','gagal update');
			}
			redirect('admin','refresh');
		}
	}

	public function hapus_admin($id_admin)
	{
		$this->load->model('Admin_Model');
		$proses_delete = $this->Admin_Model->hapus_admin($id_admin);

		if ($proses_delete) {
			$this->session->set_flashdata('pesan','berhasil hapus data');
		}else{
			$this->session->set_flashdata('pesan','gagal hapus data');
		}
		redirect('admin','refresh');
    }
}