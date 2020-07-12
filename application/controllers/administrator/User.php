<?php


/**
 * 
 */
class User extends CI_Controller
{
	public function index()
	{
		$data['url'] = $this->uri->segment(2) ;
 		$data['url2'] = $this->uri->segment(3);
 		$data['user'] = $this->m_transaksi->joinUser()->result();
		$this->template->load("template/template",'administrator/user',$data);
	}

	public function input()
	{
		$data = array(
			'nama'	=> $this->input->post("nama"),
			'nik'	=> $this->input->post("nik"),
		);

		$data2 = array(
			'id_nik'	=> $this->input->post("nik"),
			'pass'		=>$this->input->post("password"),
			'role_id'	=> $this->input->post("role_id")
		);

	/*	var_dump($data2);*/
		$this->m_transaksi->input("user",$data);
		$this->m_transaksi->input("akun",$data2);
		
		echo "Sukses";
	}

	public function form_update()
	{
		$id = $this->input->post("id");
		$data['user'] = $this->m_transaksi->joinUser2($id)->row();
		$this->load->view("administrator/form_update_user",$data);
	}


	public function update()
	{
		$pass = $this->input->post("password");
		$where = array("nik" => $this->input->post("nik2"));
		$where2 = array("id_nik" => $this->input->post("nik2"));
		if($pass == ""){
			$data = array(
				'nama'	=> $this->input->post("nama"),
				'nik'	=> $this->input->post("nik")
			);

			$data2 = array(
				'id_nik'	=> $this->input->post("nik"),
				'role_id'	=> $this->input->post("role_id")
			);

			$this->m_transaksi->update("user",$data,$where);
			$this->m_transaksi->update("akun",$data2,$where2);
			echo "Sukses";
		}else {
			$data = array(
				'nama'	=> $this->input->post("nama"),
				'nik'	=> $this->input->post("nik")
			);

			$data2 = array(
				'id_nik'	=> $this->input->post("nik"),
				'role_id'	=> $this->input->post("role_id"),
				'pass'		=> $this->input->post("password")
			);

			$this->m_transaksi->update("user",$data,$where);
			$this->m_transaksi->update("akun",$data2,$where2);
			echo "Sukses";
		}


		
	}


	public function delete()
	{
		$where = array("nik" => $this->input->get("id"));
		$where2 = array("id_nik" => $this->input->get("id"));
		$this->m_transaksi->delete($where,"user");
		$this->m_transaksi->delete($where2,"akun");

		echo "Sukses";
	}
}