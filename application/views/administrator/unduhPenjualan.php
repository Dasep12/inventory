<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/report/css/jquery.dataTables.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap.min.css") ?>">
	<script type="text/javascript" src="<?= base_url("assets/report/js/jquery-3.2.1.min.js") ?>"></script>
	<script type="text/javascript" src="<?= base_url("assets/report/js/jquery.js") ?>"></script>
    <title>Report</title>
  </head>
  <body>

  	<div class="container">
  		<div class="row">
  			<div class="card">
  	
  	<div class="form-group">
  		<center><h4>Data <?php if($label == "masuk"){ echo "Pembelian" ; }else { echo "Penjualan"; }  ?> Kode Barang <?= $kodebar   ?></h4></center>
  	<table>
			  <tr>
			  	<td width="40%">User</td>
			  	<td >:</td>
			  	<td width="50%"><?= $this->session->userdata("nama") ?></td>
			  </tr>
		  	<tr>
		  		<td>Tanggal </td>
		  		<td>:</td>
		  		<td><?=  $start . ' s/d ' . $end ?></td>
		  	</tr>

		  	<tr>
		  		<td>Tanggal Penarikan </td>
		  		<td>:</td>
		  		<td><?=  date('d-m-Y ' . ' h:i:s') ?></td>
		  	</tr>
  	</table>
  	<hr>
<table class="table">
	<thead>
		<tr>
			<th>Nama Barang</th>
			<th>Kode Barang</th>
			<th>Tanggal</th>
			<th><?php 
				if($label == "masuk"){ 
					echo "QTY IN" ; }
				else { 
					echo "QTY OUT";
				}  ?>
			</th>
			<th><?php 
				if($label == "masuk"){ 
					echo "Supplier" ; }
				else { 
					echo "Costumer";
				} ?>
			</th>
			<th>No Transaksi</th>
			<th>Nilai</th>
		</tr>
	</thead>
		<tbody>
			<?php foreach($list as $item) :  ?>
				<tr>
					<td><?= $item->nama_barang ?></td>
					<td><?= $item->kode_barang ?></td>
					<td><?= $item->tanggal ?></td>
					<td><?php if($label == "masuk") { echo $item->barang_masuk; }else { echo $item->barang_keluar; }  ?></td>
					<td><?= $item->supplier ?></td>
					<td><?= $item->no_transaksi ?></td>
					<td><?= number_format($item->nilai,2) ?></td>
				</tr>
		<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="text-danger">Nilai Rupiah</td>
				<td class="text-danger"><?= number_format($total->jumlah , 2) ?></td>
			</tr>
		</tfoot>
</table>

</div>
</div>
</div>
</div>
</body>
</html>