<?php



 /**
  * 
  */
 class Laporan extends CI_Controller
 {
  
  public function __construct()
  {
    parent::__construct();

      if(empty($this->session->userdata("role_id"))){
        redirect("Login");
      }
  }


 	public function stock()
 	{

  
 		$data['url']  = $this->uri->segment(2);
 		$data['url2'] = $this->uri->segment(3);
 		$data['produk'] = $this->m_transaksi->getData("tbl_barang")->result() ; 
 		$this->template->load("template/template","administrator/listing_stock",$data);
 		//$this->load->view("administrator/tes");


 	}

 	//report lajur stock barang berdasarkan history
 	public function report()
 	{

 		$start = $this->input->post("start");
 		$end = $this->input->post("end");
 		$kodebar = $this->input->post("kode_barang");
 		$where = $kodebar ;
 		$this->session->set_userdata("start",$start);
 		$this->session->set_userdata("end",$end);
 		$this->session->set_userdata("kodebar",$kodebar);
 		$data['saldo_akhir'] = $this->m_transaksi->hitung($start,$end,$where)->row() ;
 		$beli = $this->m_transaksi->nilaiSaldo($start,$end,$where,"masuk")->row();
 		$jual = $this->m_transaksi->nilaiSaldo($start,$end,$where,"keluar")->row();
 		$data['nilaiSaldo'] = $jual->jumlah - $beli->jumlah;
 		$this->load->view("administrator/report_stock",$data);
 	}


 	//kirim data history lajur stock ke ajax 
 	public function sendReport()
 	{

 		// Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


         // $books = $this->m_admin->getData("karyawan");
          $books = $this->m_transaksi->cetakReport($this->session->userdata("start") , $this->session->userdata("end") ,$this->session->userdata("kodebar"));

          $data = array();
          $no = 1 ;
          $total = 0 ;
          $jml = 0  ;
          foreach($books->result() as $r) {

               $data[] = array(
                    $no++  ,
                    $r->nama_barang,
                    $r->kode_barang,
                    $r->tanggal,
                    $r->no_transaksi,
                    $r->supplier,
                    $r->label == "masuk" ? "Pembelian" : "Penjualan",
                    $r->barang_masuk,
                    $r->barang_keluar,
                    $total += $r->barang_masuk - $r->barang_keluar,
                    number_format($r->nilai)     ,
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



 	//laporan stock akhir
 	public function stockAkhir()
 	{
 		$data['url']  = $this->uri->segment(2);
 		$data['url2'] = $this->uri->segment(3);
 		$data['produk'] = $this->m_transaksi->getData("tbl_barang")->result() ; 
 		$this->template->load("template/template","administrator/stockAkhir",$data);
 	}

 	//
 	public function reportStockakhir()
 	{
 		$start = $this->input->post("start");
 		$end = $this->input->post("end");
 		$kodebar = $this->input->post("kode_barang");
 		$this->session->set_userdata("start",$start);
 		$this->session->set_userdata("end",$end);
 		$this->session->set_userdata("kodebar",$kodebar);

    //hitung saldo akhir barang 
 		$data['saldo_akhir'] = $this->m_transaksi->hitung($start,$end,$kodebar)->row() ;
    //hitung nilai pembelian barang
 		$data['beli'] = $this->m_transaksi->nilaiSaldo($start,$end,$kodebar,"masuk")->row();

    //hitung nilai penjualan barang
 		$data['jual'] = $this->m_transaksi->nilaiSaldo($start,$end,$kodebar,"keluar")->row();

    //hitung nilai saldo akhir antara penjualan dan pembelian
 		$data['nilaiSaldo'] = $data['beli']->jumlah - $data['jual']->jumlah;

    //hituung barang masuk 
    $data['barang_masuk'] = $this->m_transaksi->inoutBarang($start,$end,$kodebar,"barang_masuk")->row();

    //hitung barang keluar
    $data['barang_keluar'] = $this->m_transaksi->inoutBarang($start,$end,$kodebar,"barang_keluar")->row();
 		$this->load->view("administrator/report_stock_akhir",$data);
 	}


 }