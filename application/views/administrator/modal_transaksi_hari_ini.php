<table >
	<tr>
		<td >Nama Pelanggan</td>
		<td >:</td>
		<td width="20%" ><?= $list2->nama_pelanggan ?></td>
	</tr>
	<tr>
		<td>No Pesanan</td>
		<td>:</td>
		<td><?= $list2->no_transaksi ?></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><?= $list2->tanggal ?></td>
	</tr>
</table>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>QTY</th>
			<th>Harga Satuan</th>
			<th>Sub-Total</th>
		</tr>
		<tbody>
			<?php foreach($list as $item):
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
<a target="_blank" href="<?= base_url("administrator/Report/viewReport/". $list2->no_transaksi) ?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</a>