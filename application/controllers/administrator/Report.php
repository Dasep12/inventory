<?php


/**
 * 
 */
class Report extends CI_Controller
{
	public function viewReport($id)
	{
		
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
 		$dompdf = new Dompdf();
 		

 		//$data['result'] = $this->db->get_where('pkwt',array('kode_post' => 'LNlx9F'))->result();
 		
 		$where = array("no_transaksi" => $id);
 		$data['data'] = $this->m_transaksi->cetakPDF($id)->result();
 		$data['data2'] = $this->m_transaksi->cetakPDF($id)->row();
 		$html = $this->load->view('administrator/Report',$data,true);

 		$dompdf->load_html($html);
 		$dompdf->set_paper('A4','portrait');
 		$dompdf->render();
 		$pdf = $dompdf->output();
 		$filename = "ReportTransaksi".$id ;
 		$dompdf->stream( $filename .'.pdf' ,array('Attachment' => 0 ) );

	}

}