<?php


 /**
  * 
  */
 class Transaksi extends CI_Controller
 {


 	public function Hariini()
 	{
 		$data['url'] = $this->uri->segment(2);
 		$data['url2'] = $this->uri->segment(3);
 		$this->template->load("template/template","administrator/transaksi_hari_ini",$data);
 	}


 	//get data invoice dan kirim lewat ajax 
 	public function sendData()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		$where = array('tanggal'	=> date('Y-m-d'));
 		$data = $this->m_transaksi->cari("invoice" ,$where)->result();
 		echo json_encode($data);
 	}


 	//load list pesanan ke dalam modal
 	public function listPesanan()
 	{
 		$id = $this->input->get("id");
 		$data['list'] = $this->m_transaksi->join($id)->result(); 
 		$data['list2'] = $this->m_transaksi->join($id)->row(); 
 		$this->load->view("administrator/modal_transaksi_hari_ini",$data);
 	}
 }