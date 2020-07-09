<!DOCTYPE html><html><head><title>Laporan Pembelian</title>
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
		<td>Id supplier</td>	
		<td>:</td>	
		<td colspan="2"><?= $data2->kode_supplier ?></td>		
	</tr>
</tbody>
</table>

<p>Bill From :<span><?= $data2->supplier ?></span> </p>


<table class="table" width="100%"> 
	<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>QTY</th>
			<th>Nilai</th>
		</tr>
	</thead>
		<tbody>
			<?php foreach($data as $item):  ?>
				<tr>
					<td><?= $item->kode_barang ?></td>
					<td><?= $item->nama_barang ?></td>
					<td><?= $item->barang_masuk ?></td>
					<td><?= "Rp. " .  number_format($item->nilai ,2) ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	<tfoot>
		<tr>
			<td colspan="4"></td>
		</tr>
	</tfoot>
</table>

</body></html>