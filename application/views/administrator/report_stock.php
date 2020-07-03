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
  		<center><h4>Report Lajur Stock Kode Barang <?= $this->session->userdata("kodebar")   ?></h4></center>
  	<table>
			  <tr>
			  	<td width="40%">User</td>
			  	<td >:</td>
			  	<td width="50%">Dasep Depiyawan</td>
			  </tr>
		  	<tr>
		  		<td>Tanggal </td>
		  		<td>:</td>
		  		<td><?=  $this->session->userdata("start") . ' s/d ' . $this->session->userdata("end") ?></td>
		  	</tr>

		  	<tr>
		  		<td>Tanggal Penarikan </td>
		  		<td>:</td>
		  		<td><?=  date('Y-m-d ' . ' h:i:s') ?></td>
		  	</tr>
  	</table>
  	</div>

  	<table id="example" border="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Kode Barang</th>
				<th>Tanggal</th>
				<th>No Transaksi</th>
				<th>From/To</th>
				<th>Type Transaksi</th>
				<th>QTY Masuk</th>
				<th>QTY Keluar</th>
				<th>Saldo</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody id="show_data">

		</tbody>
		<tfoot>
			<td colspan="8"></td>
			<td>Saldo Akhir</td>
			<td class="text-danger" style="color : red"><?= $saldo_akhir->jumlah ?></td>
			<td class="text-danger" style="color : red"><?= number_format($nilaiSaldo) ?></td>
		</tfoot>
	</table>
</div>
	</div>
		</div>
  <script type="text/javascript" src="<?= base_url("assets/report/js/jquery.dataTables.min.js") ?>"></script>

<!-- export data table -->
  <script src="<?= base_url('assets/') ?>report/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets/') ?>report/js/buttons.flash.min.js"></script>
  <script src="<?= base_url('assets/') ?>report/js/jszip.min.js"></script>
  <script src="<?= base_url('assets/') ?>report/js/pdfmake.min.js"></script>
  <script src="<?= base_url('assets/') ?>report/js/vfs_fonts.js"></script>
  <script src="<?= base_url('assets/') ?>report/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets/') ?>report/js/buttons.print.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#example").DataTable({
			"pageLength" : 50 ,
			"ajax" : {
				url : "<?= base_url("administrator/Laporan/sendReport") ?>",
				type : "GET" 
			},
			dom: 'Bfrtip',
	                buttons: [
	                    'excel',
	                ]

		});
	})
</script>
  </body>
</html>