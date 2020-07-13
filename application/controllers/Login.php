<?php



 /**
  * 
  */
 class Login extends CI_Controller
 {
 	public function __construct()
 	{
 		parent::__construct();

 			if(!empty($this->session->userdata("role_id"))){
 				redirect("administrator/Dashboard");
 			}
 	}

 	public function index()
 	{
 		$this->load->view("login");
 	}

 	public function cekLogin()
 	{
 		$nik = $this->input->post("nik");
 		$password = $this->input->post("pass");
 		
 		$auth = $this->m_transaksi->cekLogin($nik,$password)->row();
 		$auth2 = $this->m_transaksi->cekLogin($nik,$password)->num_rows();
 		
 		if($auth2 == 0 ){
 			echo "0";
 		}else {

 			$this->session->set_userdata("nik",$auth->id_nik);
 			$this->session->set_userdata("nama",$auth->nama);
 			$this->session->set_userdata("role_id",$auth->role_id);
 			echo "1";
 		}
 		
 	}
 }