<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model user
        $this->load->model('login_model');
    }

    public function index()
    {

            if($this->login_model->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("laporan");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $email = $this->input->post("email", TRUE);
                $password = $this->input->post('password', TRUE);

                //checking data via model
                $checking = $this->login_model->check_login('user', array('email' => $email), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'id_user'   => $apps->id_user,
                            'nama_user' => $apps->nama_user,
                            'email' => $apps->email,
                            'password' => $apps->password
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        redirect('dashboard/');

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> email atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }

            }else{

                $this->load->view('login');
            }

        }

    }
    public function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}
}