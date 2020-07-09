<?php


/**
 * 
 */
class Report extends CI_Controller
{
	//report penjualan
	public function viewReport($id)
	{
		
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
 		$dompdf = new Dompdf();
 		

 		//$data['result'] = $this->db->get_where('pkwt',array('kode_post' => 'LNlx9F'))->result();
 		
 		$where = array("no_transaksi" => $id);
 		$data['data'] = $this->m_transaksi->cetakPDF($id)->result();
 		$data['data2'] = $this->m_transaksi->cetakPDF($id)->row();
 		$data['total'] = $this->db->query("SELECT sum(harga_bayar) as jumlah from transaksi  where no_transaksi = '$id' ")->row();
 		$html = $this->load->view('administrator/Report',$data,true);

 		$dompdf->load_html($html);
 		$dompdf->set_paper('A4','portrait');
 		$dompdf->render();
 		$pdf = $dompdf->output();
 		$filename = "ReportTransaksi".$id ;
 		$dompdf->stream( $filename .'.pdf' ,array('Attachment' => 0 ) );

	}

	//report pembelian
	public function reportBeli($id)
	{
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
 		$dompdf = new Dompdf();
 		
		$where = array("no_transaksi" => $id);
 		$data['data'] = $this->m_transaksi->cari("lajur_stock" ,$where)->result();
 		$data['data2'] = $this->m_transaksi->cari("lajur_stock" ,$where)->row();
 		$html = $this->load->view('administrator/reportBeli',$data,true);

 		$dompdf->load_html($html);
 		$dompdf->set_paper('A4','portrait');
 		$dompdf->render();
 		$pdf = $dompdf->output();
 		$filename = "ReportPembelian".$id ;
 		$dompdf->stream( $filename .'.pdf' ,array('Attachment' => 0 ) );
	}

}