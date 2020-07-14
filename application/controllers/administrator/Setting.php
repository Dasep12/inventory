<?php


/**
 * 
 */
class Setting extends CI_Controller
{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
 		$data['url'] = $this->uri->segment(2) ;
 		$data['url2'] = $this->uri->segment(3);
 		$data['user'] = $this->m_transaksi->joinUser2($this->session->userdata('nik'))->row();
 		$this->template->load("template/template","administrator/setting",$data);
	}


	public function update()
	{
		$pass  = $this->input->post("pass");
		$where = array("nik"		=> $this->input->post("id"));
		$where2 = array("id_nik"	=> $this->input->post("id"));
		if($pass == ""){
			$data = array(
				'nama'		=> $this->input->post("username"),
				'nik'		=> $this->input->post("nik"),
			);

			$data2 = array(
				'id_nik'		=> $this->input->post("nik"),
			);

			$update = $this->m_transaksi->update("user",$data,$where);
			$update2 = $this->m_transaksi->update("akun",$data2,$where2);
			if($update && $update2){
				echo "Ok";
			}
		}else {
			$data = array(
				'nama'		=> $this->input->post("username"),
				'nik'		=> $this->input->post("nik"),
			);

			$data2 = array(
				'id_nik'		=> $this->input->post("nik"),
				'pass'			=> $this->input->post("pass")
			);

			$update = $this->m_transaksi->update("user",$data,$where);
			$update2 = $this->m_transaksi->update("akun",$data2,$where2);
			if($update && $update2){
				echo "Ok";
			}
		}

	}
}