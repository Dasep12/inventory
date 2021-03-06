<?php


 /**
  * 
  */
 class M_transaksi extends CI_Model
 {

 	//ambil data di database berdasarkan nama tabel
 	public function getData($table)
 	{
 		return $this->db->get($table);

 	}

 	//tampilkan lis all penjualan
 	 public function listingPenjualan($table,$id)
 	{
 		$this->db->order_by($id,"DESC");
 		return $this->db->get($table);
 	}


 	//tampilkan list all pembelian barang
 	 public function listingPembelian($table,$id)
 	{
 		$this->db->order_by($id,"DESC");
 		return $this->db->get_where($table,array("label" => "masuk"));

 	}


 	//cari barang berdasarkan kode barang
 	public function cariBarang($table ,$where)
 	{
 		return $this->db->get_where($table,$where);
 	}


 	//tambah data 
 	public function input($data,$table)
 	{
 		return $this->db->insert($data,$table);
 	}

 	//delete data
 	public function delete($where,$table)
 	{
 		$this->db->where($where);
 		return $this->db->delete($table);
 	}

 	//cari data berdasarkan inputan
 	public function cari($table ,$where)
 	{
 		return $this->db->get_where($table,$where);
 	}

 	//update data di database
 	public function update($table,$data,$where)
 	{
 		$this->db->where($where);
 		return $this->db->update($table,$data);
 	}

 	//hitung jumlah stock barang
 	public function hitungStock($where)
 	{
 		$this->db->select('(SELECT  SUM(barang_masuk) - SUM(barang_keluar) FROM lajur_stock WHERE kode_barang = '.$where.' ) AS jumlah', FALSE);
		$query = $this->db->get('lajur_stock');
 		return $query ;
 	}


 	//join data invoice dan tabel transaksi
 	public function join($where)
 	{
 		$this->db->select("*");
 		$this->db->from("invoice");
 		$this->db->where(array("id_transaksi" => $where));
 		$this->db->join("transaksi" , "transaksi.no_transaksi = invoice.no_transaksi " );
 		$query = $this->db->get();
 		return $query ;
 	}



 	//menampilkan data laporan stock berdasarkan tanggal 
 	public function cetakReport($start , $end ,$kodebar)
 	{
 		$this->db->where('tanggal >=',$start);
		$this->db->where('tanggal <=',$end);
		$this->db->where("kode_barang",$kodebar);
		return $this->db->get("lajur_stock");
 	}



 	//hitung saldo akhir untuk report
 	public function hitung($start,$end,$where)
 	{
 		/*$this->db->select('(SELECT  SUM(barang_masuk - barang_keluar ) FROM lajur_stock where kode_barang =  ' . $where . ' AND tanggal  between   "' . $start . '" AND  "' .  $end .'") AS jumlah', FALSE);*/
 		$sql = "SELECT nama_barang , tanggal ,sum(barang_masuk - barang_keluar) as jumlah FROM lajur_stock  where kode_barang= $where and tanggal between '$start' AND '$end' order by tanggal desc ";
		$query = $this->db->query($sql);
		return $query ;
 	}

 	//hitung total rupiah saldo akhir
 	public function nilaiSaldo($start,$end,$where,$label)
 	{
 		$this->db->select('(SELECT SUM(nilai) FROM lajur_stock where label = "'.$label.'"  AND kode_barang = "'.$where.'" AND tanggal between "'.$start.'" AND "'.$end.'" )AS jumlah',FALSE);
 		return $this->db->get("lajur_stock");
 	}

 	//hitung total rupiah saldo akhir
 	public function nilaiSaldo2($start,$end,$label)
 	{
 		$this->db->select('(SELECT SUM(nilai) FROM lajur_stock where label = "'.$label.'" AND tanggal between "'.$start.'" AND "'.$end.'" )AS jumlah',FALSE);
 		return $this->db->get("lajur_stock");
 	}

 	//hitung barang keluar masuk
 	public function inoutBarang($start,$end,$where,$label)
 	{
 		$this->db->select('(SELECT SUM(' .$label.' ) FROM lajur_stock where kode_barang =  ' . $where . ' AND tanggal  between   "' . $start . '" AND  "' .  $end .'") AS jumlah', FALSE);
		$query = $this->db->get('lajur_stock');
		return $query ;
 	}

 	//join table untuk cetak report pdf 
 	public function cetakPDF($where)
 	{
 		$this->db->select("*");
 		$this->db->from("invoice");
 		$this->db->where("id_transaksi",$where);
 		$this->db->join("transaksi","transaksi.no_transaksi = invoice.id_transaksi");
 		return $this->db->get();
 	}


 	//menampilkan data laporan stock berdasarkan tanggal 
 	public function unduhReport($start , $end ,$kodebar,$table,$label)
 	{
 		$this->db->where('tanggal >=',$start);
		$this->db->where('tanggal <=',$end);
		$this->db->where("label",$label);
		$this->db->where("kode_barang",$kodebar);
		return $this->db->get($table);
 	}


 	//hitung grafik penjualan barang
 	public function countBarangJual($start,$end)
 	{
 		$this->db->select_sum('barang_keluar');
 		$this->db->where("label","keluar");
 		$this->db->where('tanggal >=',$start);
		$this->db->where('tanggal <=',$end);
		$query = $this->db->get('lajur_stock');
 		return $query ;
 	}

 	//join user dan akun
 	public function joinUser()
 	{
 		$this->db->select("*");
 		$this->db->from("user");
 		$this->db->join("akun",'user.nik = akun.id_nik');
 		return $this->db->get();
 	}

 	//join user dan akun
 	public function joinUser2($where)
 	{
 		$this->db->select("*");
 		$this->db->from("user");
 		$this->db->where("nik",$where);
 		$this->db->join("akun",'user.nik = akun.id_nik');
 		return $this->db->get();
 	}

 	//join user dan akun
 	public function cekLogin($nik,$pass)
 	{
 		$this->db->select("*");
 		$this->db->from("akun");
 		$this->db->where("id_nik",$nik);
 		$this->db->where("pass",$pass);
 		$this->db->join("user",'user.nik = akun.id_nik');
 		return $this->db->get();
 	}



 }