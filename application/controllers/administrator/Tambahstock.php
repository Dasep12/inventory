<?php



 /**
  * 
  */
 class Tambahstock extends CI_Controller
 {

 	public function __construct()
 	{
 		parent::__construct();

 			if(empty($this->session->userdata("role_id"))){
 				redirect("Login");
 			}
 	}

 	public function index()
 	{
 		$data['url']  = $this->uri->segment(2);
 		$data['url2'] = $this->uri->segment(3);
 		$data['produk'] = $this->db->get("tbl_barang")->result() ;
 		$this->template->load("template/template","administrator/Tambahstock",$data);
 	}


 	//input data stock barang
 	public function input()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		$data = array(
 			'nama_barang'		=> $this->input->post("nama_barang"),
 			'kode_barang'		=> $this->input->post("kode_barang"),
 			'barang_masuk'		=> $this->input->post("barang_masuk"),
 			'nilai'				=> $this->input->post("nilai"),
 			'barang_keluar'		=> 0,
 			'label'				=> "masuk",
 			'supplier'			=> $this->input->post("nama_supplier"),
 			'kode_supplier'		=> $this->input->post("kode_supplier"),
 			'tanggal'			=> date('Y-m-d'),
 			'no_transaksi'		=> "INV-" . date("his"),
 			'user'				=> $this->session->userdata("nama"),
			'nik'				=> $this->session->userdata("nik"),
 		);

 		$input = $this->m_transaksi->input("lajur_stock",$data);
 		if($input){
 			echo "Sukses";
 		}else {
 			echo "Gagal input";
 		}
 	}

 }