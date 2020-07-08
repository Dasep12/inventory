<!DOCTYPE html><html><head><title>Laporan Penjualan</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"></head><body>
<table width="100%" class="table">
	<tr >
		<th align="left">APLIKASI INVENTORY</th>
		<th colspan="3" align="left">Invoice</th>
	</tr>

<tbody>
	<tr>
		<td>Jl Ancol Barat</td>
		<td>Date</td>
		<td>:</td>
		<td colspan="2"><?= $data2->tanggal ?></td>
	</tr>
		
	<tr>
		<td>Pademangan Kota Jakarta Utara</td>
		<td>Invoice</td>
		<td>:</td>
		<td colspan="2"><?= $data2->no_transaksi ?></td>
	</tr>

	<tr>
		<td>(021) 68454 8985</td>
		<td>Id Costumer</td>	
		<td>:</td>	
		<td colspan="2"><?= $data2->id_costumer ?></td>		
	</tr>
</tbody>
</table>

<p>Bill to :<span><?= $data2->nama_pelanggan ?></span> </p>
<p>No Telp : <span><?= $data2->no_telp ?></span></p>


<table class="table" width="100%"> 
	<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>QTY</th>
			<th>Harga Satuan</th>
			<th>Sub-Total</th>
		</tr>
		<tbody>
			<?php foreach($data as $item):
			$grndtotal = 0 ;
			$grndtotal += $item->harga_bayar ?>
				<tr>
					<td><?= $item->kode_barang ?></td>
					<td><?= $item->nama_barang ?></td>
					<td><?= $item->qty ?></td>
					<td><?= "Rp. " .  number_format($item->harga_satuan ,2) ?></td>
					<td><?= "Rp. " .  number_format($item->harga_bayar ,2) ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Grand Total</td>
				<td><?=  "Rp. " .  number_format($total->jumlah  ,2)?></td>
			</tr>
		</tfoot>
	</thead>
</table>

</body></html>