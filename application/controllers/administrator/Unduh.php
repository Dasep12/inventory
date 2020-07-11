<?php


/**
 * 
 */
class Unduh extends CI_Controller
{
	//menu download report penjualan
	public function penjualan()
	{
		$data['url'] = $this->uri->segment(2) ;
 		$data['url2'] = $this->uri->segment(3);
 		$data['produk'] = $this->m_transaksi->getData("tbl_barang")->result();
		$this->template->load("template/template","administrator/unduh_penjualan",$data);
	}

	//download report penjualan
	public function downloadPenjualan()
	{
		$data['kodebar']= $this->input->post("kode_barang"); $kodebar = $data['kodebar'];
	    header("Content-Disposition: attachment; filename=ReportPenjualan".$kodebar.".xls");
		date_default_timezone_set('Asia/Jakarta');
	    header("Content-type: application/vnd-ms-excel");
		$data['start'] = $this->input->post("start"); $start = $data['start'] ;
		$data['end'] = $this->input->post("end");   $end = $data['end'] ;
		$label = "keluar" ;
		$id = $this->input->post("id");
		if($id == 1){
			$data['label'] = "keluar" ;
			$data['list'] = $this->m_transaksi->unduhReport($data['start'] , $data['end'] ,$data['kodebar'],"lajur_stock","keluar")->result();
			$data['total'] = $this->m_transaksi->nilaiSaldo($start,$end,$kodebar,"keluar")->row();
		}else {
			$data['label'] = "keluar" ;
			$data['list'] = $this->db->get_where("lajur_stock",array("label" => "keluar"))->result();
			$data['total'] = $this->m_transaksi->nilaiSaldo2($start,$end,"keluar")->row();
		}

		$this->load->view("administrator/unduhPenjualan",$data);

	}


	//menu download report pembelian
	public function pembelian()
	{
		$data['url'] = $this->uri->segment(2) ;
 		$data['url2'] = $this->uri->segment(3);
 		$data['produk'] = $this->m_transaksi->getData("tbl_barang")->result();
		$this->template->load("template/template","administrator/unduh_pembelian",$data);
	}

	//download report pembelian
	public function downloadPembelian()
	{
		$data['kodebar']= $this->input->post("kode_barang"); $kodebar = $data['kodebar'];
	    header("Content-Disposition: attachment; filename=ReportPembelian".$kodebar.".xls");
		date_default_timezone_set('Asia/Jakarta');
	    header("Content-type: application/vnd-ms-excel");
		$data['start'] = $this->input->post("start"); $start = $data['start'] ;
		$data['end'] = $this->input->post("end");   $end = $data['end'] ;
		$label = "keluar" ;
		$id = $this->input->post("id");
		if($id == 1){
			$data['label'] = "masuk" ;
			$data['list'] = $this->m_transaksi->unduhReport($data['start'] , $data['end'] ,$data['kodebar'],"lajur_stock","masuk")->result();
			$data['total'] = $this->m_transaksi->nilaiSaldo($start,$end,$kodebar,"masuk")->row();
		}else {
			$data['label'] = "masuk" ;
			$data['list'] = $this->db->get_where("lajur_stock",array("label" => "masuk"))->result();
			$data['total'] = $this->m_transaksi->nilaiSaldo2($start,$end,"masuk")->row();
		}

		$this->load->view("administrator/unduhPenjualan",$data);

	}
}