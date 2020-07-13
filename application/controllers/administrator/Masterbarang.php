<?php



 /**
  * 
  */
 class Masterbarang extends CI_Controller
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
 		$this->template->load("template/template","administrator/masterbarang",$data);
 	}

 	//kirim data master barang ke json 
 	public function sendData()
 	{
 		$data= $this->m_transaksi->getData("tbl_barang")->result();
 		echo json_encode($data);
 	} 

 	//load data modal form update master barang
 	public function loadModal()
 	{
 		$id = $this->input->get("id");
 		$where = array('id' => $id);
 		$data['barang'] = $this->m_transaksi->cariBarang("tbl_barang" ,$where)->row();
 		$data['supplier'] = $this->m_transaksi->getData("supplier")->result();
 		$this->load->view("administrator/modal_master_barang",$data);
 	}

 	//update data barang
 	public function update()
 	{
 		$data = array(
 			'kode_barang'		=> $this->input->post("kode_barang"),
 			'nama_barang'		=> $this->input->post("nama_barang"),
 			'harga_satuan'		=> $this->input->post("harga_satuan"),
 			'deskripsi'			=> $this->input->post("deskripsi"),
 			'satuan'			=> $this->input->post("satuan"),
 			'kode_supplier'		=> $this->input->post("kode_supplier"),
 			'nama_supplier'		=> $this->input->post("nama_supplier"),
 		);

 		$where  = array('id'  => $this->input->post("id"));
 		$update = $this->m_transaksi->update("tbl_barang",$data,$where);
 			if($update){
 				echo "Sukses";
 			}else {
 				echo "Gagal";
 			}
 	}


 	//hapus barang dari data master
 	public function delete()
 	{
 		$where = array("id"  => $this->input->get("id"));
 		$hapus = $this->m_transaksi->delete($where,"tbl_barang");
 			if($hapus){
 				echo "Data Terhapus";
 			}else {
 				echo "Gagal";
 			}
 	}
 }