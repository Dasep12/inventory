<?php



 /**
  * 
  */
 class Pembelian extends CI_Controller
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
 		$this->template->load("template/template","administrator/pembelian",$data);
 	}


 	public function sendData()
 	{
 		// Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


         $books = $this->m_transaksi->listingPembelian("lajur_stock","tanggal");

          $data = array();
          $no = 1 ;
          $total = 0 ;
          $jml = 0  ;
          foreach($books->result() as $r) {

               $data[] = array(
                    $no++  ,
                    $r->no_transaksi,
                    $r->tanggal,
                    $r->supplier,
                    '<a href="javascript:;" data-id="'. $r->no_transaksi .'" data-toggle="modal" data-target="#lihat_pembelian" class="btn btn-xs btn-info"><i class="fa fa-book"></i> </a>',
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

 	public function listPembelian()
 	{
 		$id = $this->input->get("id");
 		$data['id'] = $this->input->get("id");
		$where = array("no_transaksi" => $id);
 		$data['listbeli'] = $this->m_transaksi->cari("lajur_stock" ,$where)->result();
 		$data['listbeli2'] = $this->m_transaksi->cari("lajur_stock" ,$where)->row();
 		$this->load->view("administrator/modal_pembelian",$data);
 	}

 }