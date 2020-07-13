<?php




  /**
   * 
   */
  class Supplier extends CI_Controller
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
  		$data['url']  = $this->uri->segment(2);
      $data['url2'] = $this->uri->segment(3);
  		$this->template->load("template/template","administrator/supplier",$data);
  	}


    //kirim data lewat json untuk memuat list supplier
    public function sendData()
    {
      $data = $this->m_transaksi->getData("supplier")->result();
      echo json_encode($data);
    }



    //input data supplier
    public function input()
    {
      $data = array(
        'kode_supplier'   => $this->input->post("kode_supplier"),
        'nama_supplier'   => $this->input->post("nama_supplier"),
      );

      $where = array('kode_supplier' => $this->input->post("kode_supplier"));
      $cekkode = $this->m_transaksi->cariBarang("supplier" ,$where)->num_rows();
      if($cekkode >= 1){
        echo "Kode Supplier Sudah Ada";
      }else {
        $simpan = $this->m_transaksi->input("supplier",$data);
          if($simpan){
            echo "Sukses";
          }else {
            echo "Gagal";
          }
      }
    }

    //delete supplier
    public function delete()
    {
      $where = array('id' => $this->input->get("id"));
      $hapus = $this->m_transaksi->delete($where,"supplier");
        if($hapus){
          echo "Terhapus";
        }
    }

    //load form modal update data supplier
    public function loadForm()
    {
        $id = $this->input->post("id");
        $where = array('id' => $id);
        $data['supplier'] = $this->m_transaksi->cari("supplier" ,$where)->row();
        $this->load->view("administrator/modal_supplier",$data);
    }

    //update data supplier
    public function update()
    {
      $data = array(
        'kode_supplier'   => $this->input->post("kode_supp"),
        'nama_supplier'   => $this->input->post("nama_supp")
      );
      $where = array('id' =>  $this->input->post("id"));
      $update = $this->m_transaksi->update("supplier",$data,$where);
        if($update){
          echo "Data Update";
        }else {
          echo "Gagal Update";
        }
    }


  }