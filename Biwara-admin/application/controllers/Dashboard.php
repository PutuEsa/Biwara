<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

//public function index()
//    {
//        $data['konten']='dashboard';
//        $this->load->view('template',$data);
//    }
//}
public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('login_model');
    }

    public function index()
    {
        if($this->login_model->logged_id())
        {

            //$this->load->view("dashboard");   
            $data['konten']='v_laporan';
            $this->load->view('template',$data);      

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}