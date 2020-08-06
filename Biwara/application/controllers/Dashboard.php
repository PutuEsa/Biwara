<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends CI_Controller {
 
	//public function index(){
        //$this->load->view('header');
        //$this->load->view('v_dashboard');
        //$this->load->view('footer');
    //}
    
    public function index()
	{
		$data['konten']='v_dashboard';
		$this->load->view('template',$data);
    }
    public function lapor()
	{
		$this->load->view('v_lapor');
    }
    public function donasi()
	{
		$this->load->view('v_donasi');
  }
  
}