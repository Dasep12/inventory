<?php



 /**
  * 
  */
 class Penjualan extends CI_Controller
 {
 	public function index()
 	{
 		$data['url'] = $this->uri->segment(2);
 		$data['url2'] = $this->uri->segment(3);
 		$this->template->load("template/template","administrator/penjualan",$data);
 	}


 	public function getData()
 	{
 		// Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


         // $books = $this->m_admin->getData("karyawan");
          $books = $this->m_transaksi->getData("invoice");

          $data = array();
          $no = 1 ;
          $total = 0 ;
          $jml = 0  ;
          foreach($books->result() as $r) {

               $data[] = array(
                    $no++  ,
                    $r->no_transaksi,
                    $r->tanggal,
                    number_format($r->pembayaran - $r->kembali,2),
                    '<a href="javascript:;" data-id="'. $r->no_transaksi .'" data-toggle="modal" data-target="#lihat_transaksi" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-book"></i> </a>  </a></td>'
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $books->num_rows(),
                 "recordsFiltered" => $books->num_rows(),
                 "data" => $data , 
             );
          echo json_encode($output);
          exit();
 	}
 }