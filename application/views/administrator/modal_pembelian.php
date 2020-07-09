<table >
	<tr>
		<td >Nama Supplier</td>
		<td >:</td>
		<td width="20%" ><?= $listbeli2->supplier ?></td>
	</tr>
	<tr>
		<td>No Pembelian</td>
		<td>:</td>
		<td><?= $listbeli2->no_transaksi ?></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><?= $listbeli2->tanggal ?></td>
	</tr>
</table>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>QTY</th>
			<th>Nilai </th>
		</tr>
    	</thead>
 		<tbody>
			<?php foreach($listbeli as $item): ?>
				<tr>
					<td><?= $item->kode_barang ?></td>
					<td><?= $item->nama_barang ?></td>
					<td><?= $item->barang_masuk ?></td>
					<td><?= "Rp. " .  number_format($item->nilai ,2) ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>

</table>
<a target="_blank" href="<?= base_url("administrator/Report/reportBeli/". $listbeli2->no_transaksi) ?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</a>


		