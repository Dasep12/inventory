<?php

 /**
  * 
  */
 class Dashboard extends CI_Controller
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
 		date_default_timezone_set('Asia/Jakarta');
 		$data['url'] = $this->uri->segment(2) ;
 		$data['url2'] = $this->uri->segment(3);

 		$start = array(
 			date('Y-01-01'),
 			date('Y-02-01'),
 			date('Y-03-01'),
 			date('Y-04-01'),
 			date('Y-05-01'),
 			date('Y-06-01'),
 			date('Y-07-01'),
 			date('Y-08-01'),
 			date('Y-09-01'),
 			date('Y-10-01'),
 			date('Y-11-01'),
 			date('Y-12-01'),
 		);

 		$end = array(
 			date('Y-01-30'),
 			date('Y-02-31'),
 			date('Y-03-31'),
 			date('Y-04-31'),
 			date('Y-05-31'),
 			date('Y-06-31'),
 			date('Y-07-31'),
 			date('Y-08-31'),
 			date('Y-09-31'),
 			date('Y-10-31'),
 			date('Y-11-31'),
 			date('Y-12-31'),
 		);


 		//hitung barang keluar per bulan / periodek
 		$data['januari'] = $this->m_transaksi->countBarangJual($start[0],$end[0])->row();
 		$data['februari'] = $this->m_transaksi->countBarangJual($start[1],$end[1])->row();
 		$data['maret'] = $this->m_transaksi->countBarangJual($start[2],$end[2])->row();
 		$data['april'] = $this->m_transaksi->countBarangJual($start[3],$end[3])->row();
 		$data['mei'] = $this->m_transaksi->countBarangJual($start[4],$end[4])->row();
 		$data['juni'] = $this->m_transaksi->countBarangJual($start[5],$end[5])->row();
 		$data['juli'] = $this->m_transaksi->countBarangJual($start[6],$end[6])->row();
 		$data['agustus'] = $this->m_transaksi->countBarangJual($start[7],$end[7])->row();
 		$data['september'] = $this->m_transaksi->countBarangJual($start[8],$end[8])->row();
 		$data['oktober'] = $this->m_transaksi->countBarangJual($start[9],$end[9])->row();
 		$data['november'] = $this->m_transaksi->countBarangJual($start[10],$end[10])->row();
 		$data['desember'] = $this->m_transaksi->countBarangJual($start[11],$end[11])->row();
/*
 		echo $data['juli']->barang_keluar ;*/
 		$this->template->load('template/template','administrator/Dashboard',$data);
 	}
 }