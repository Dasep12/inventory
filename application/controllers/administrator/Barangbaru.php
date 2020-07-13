<?php

 /**
  * 
  */
 class Barangbaru extends CI_Controller
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
 		$data['url'] = $this->uri->segment(2);
 		$data['url2'] = $this->uri->segment(3);
 		$data['supplier'] = $this->m_transaksi->getData("supplier")->result();
 		$this->template->load("template/template",'administrator/barangbaru',$data);
 	}


 	//input barang baru
 	public function input()
 	{
 		$data = array(
 			'kode_barang'		=> $this->input->post("kode_barang"),
 			'nama_barang'		=> $this->input->post("nama_barang"),
 			'harga_satuan'		=> $this->input->post("harga_satuan"),
 			'satuan'			=> $this->input->post("satuan"),
 			'deskripsi'			=> $this->input->post("deskripsi"),
 			'kode_supplier'		=> $this->input->post("kode_supplier"),
 			'nama_supplier'		=> $this->input->post("nama_supplier"),
 		);

 		$input = $this->m_transaksi->input("tbl_barang",$data);
 			if($input){
 				echo "Sukses";
 			}else {
 				echo "Gagal";
 			}
 	}
 }