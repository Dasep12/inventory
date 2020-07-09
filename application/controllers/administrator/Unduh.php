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
	    /*header("Content-Disposition: attachment; filename=ReportPenjualan".$kodebar.".xls");
		date_default_timezone_set('Asia/Jakarta');
	    header("Content-type: application/vnd-ms-excel");*/
		$data['start'] = $this->input->post("start"); $start = $data['start'] ;
		$data['end'] = $this->input->post("end");   $end = $data['end'] ;
		$label = "keluar" ;
		$data['list'] = $this->m_transaksi->unduhReport($data['start'] , $data['end'] ,$data['kodebar'],"lajur_stock")->result();

		$data['total'] = $this->db->query("SELECT nama_barang , SUM(nilai) as jumlah from lajur_stock where kode_barang = $kodebar and label = $label ")->row();
		$this->load->view("administrator/unduhPenjualan",$data);

	}


	public function pembelian()
	{
		$data['url'] = $this->uri->segment(2) ;
 		$data['url2'] = $this->uri->segment(3);
 		$data['produk'] = $this->m_transaksi->getData("tbl_barang")->result();
		$this->template->load("template/template","administrator/unduh_pembelian",$data);
	}
}