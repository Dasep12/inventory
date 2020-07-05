<?php



/**
 * 
 */
class InputTransaksi extends CI_Controller
{
	
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['url'] = $this->uri->segment(2); 
		$data['url2'] = $this->uri->segment(3);
		$data['produk'] = $this->db->get("tbl_barang")->result() ; 
		$this->template->load("template/template","administrator/inputtransaksi",$data);
	}


	//input pesanan ke dalam cart 
	public function listPesanan()
	{
		$where = array('kode_barang' => $this->input->post("kode_barang"));
		$barang = $this->m_transaksi->cariBarang("tbl_barang",$where)->row();
		$data = array(
			'id'		=> $barang->kode_barang ,
			'price'		=> $barang->harga_satuan  ,
			'qty'		=> $this->input->post("qtypesan"),
			'name'		=> $barang->nama_barang ,
			'invoice'	=> $this->input->post("no_invoice"),
			'nama_user'	=> $this->input->post("namapelanggan"),
			'tanggal'	=> $this->input->post("tanggal")
		);

		$this->cart->insert($data);
	}


	//load list dalam cart kedalam list transaksi
	public function list_pembelian()
	{ 	
	 foreach($this->cart->contents() as $list) : ?>
						<tr>
							<td><input type="text" value="<?= $list['invoice'] ?>" name="invoice"></td>
							<td><input type="text" value="<?= $list['name'] ?>" name="nama_barang"></td>
							<td><input type="text" value="<?= $list['id'] ?>" name="kode_barang"></td>
							<td><input type="text" value="<?= $list['qty'] ?>" name="qty"></td>
							<td><input type="text" value="<?= $list['price'] * $list['qty'] ?>" name="harga"></td>
							<td><a href="javascript:del('<?= $list['rowid'] ?>')" class="text-danger" ><i class="fa fa-remove"></i> </a></td>
						</tr>
		<?php	endforeach ;
	}

	//kosongkan semua list di dalam cart
	public function deleteAllListitem()
	{
		$this->cart->destroy();
		redirect("administrator/InputTransaksi");
	}

	//hapus list dalam cart per item 
	public function hapusItem()
	{
		$id = $this->input->get("id");

		$data = array(
			'rowid'	=> $id ,
			'qty'	=> 0 
		);

		$this->cart->update($data);

	}


	//load daftar pesanan yang sudah harus di bayar
	public function loadItemBayar()
	{
		$no = 1 ;
		foreach($this->cart->contents() as $list) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $list['id'] ?></td>
							<td><?= $list['name'] ?></td>
							<td><?= $list['qty'] ?></td>
							<td><?= $list['price'] * $list['qty']  ?></td>
						</tr>
		<?php	endforeach ; ?>
		<td></td>
		<td></td>
		<td></td>
		<td >Grand Total</td>
		<td><input type="hidden" name="grndtotal" id="grndtotal" value="<?= $this->cart->total() ?>"> <?= $this->cart->total() ?></td>
	<?php

	}

	//input data transaksi ke table invoice dan tabel transaksi 
	public function saveTransaksi()
	{
		$bayar = $this->input->post("uang_bayar");
		$kembali = $this->input->post("uang_kembali");
		$data2 = array();
		//input data ke table transaksi
		foreach($this->cart->contents() as $item) {
			$data = array(
					'nama_pelanggan' => $item['nama_user'] ,
					'no_transaksi'	=> $item['invoice'],
					'qty'			=> $item['qty'],
					'kode_barang'	=> $item['id'],
					'harga_satuan'	=> $item['price'],
					'nama_barang'	=> $item['name'],
					'harga_bayar'	=> $item['price']  * $item['qty']
			);

			$data2 = array(
				'no_transaksi'	=> $item['invoice'],
				'tanggal'		=> date('Y-m-d'),
				'pembayaran'	=> $bayar,
				'kembali'		=> $kembali,
				'id_transaksi'	=>$item['invoice']
			);

			//data input ke tabel lajur_stock
			$data3 = array(
				'nama_barang'		=> $item['name'],
	 			'kode_barang'		=> $item['id'],
	 			'barang_keluar'		=> $item['qty'],
	 			'barang_masuk'		=> 0,
	 			'label'				=> "keluar",
	 			'tanggal'			=> date('Y-m-d'),
	 			'no_transaksi'		=> $item['invoice'],
	 			'nilai'				=> $item['price'] * $item['qty'],
	 			'supplier'			=> $item['nama_user']
			);

			$this->m_transaksi->input("transaksi",$data);
			$this->m_transaksi->input("lajur_stock",$data3);
		}
			$this->m_transaksi->input("invoice",$data2);
			$this->cart->destroy();		

			echo "Sukses";

	}
}