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

 }