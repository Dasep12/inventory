<div class="page-header">
	<h1>Transaksi / Penjualan  </h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- input data transaksi-->
		<form class="form-horizontal" method="post" id="formCariBarang" role="form">
		<div class="col-lg-6">
			<table class="table">
				<tr>
					<td>No Invoice</td>
					<td>:</td>
					<td><input type="text" name="no_invoice" readonly="" value="<?= "INV-" . date("his") ?>" class="form-control"></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><input type="text" name="tanggal" value="<?= date("Y-m-d") ?>" class="form-control"></td>
				</tr>
				<tr>
					<td>Pelanggan</td>
					<td>:</td>
					<td><input type="text" name="namapelanggan" id="namapelanggan" class="form-control"></td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td>:</td>
					<td><input type="text" name="keterangan" class="form-control"></td>
				</tr>
			</table>
		</div>

		<div class="col-lg-6">
			<table class="table">
				<tr>
					<td>Nama Barang</td>
					<td>:</td>
					<td>
						<input type="text" name="nama_barang"  id="namabrg" class="form-control">
						<input type="text" name="kode_barang"  id="kdbrg" class="form-control">
					</td>
					<td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><b></b> <span class="glyphicon glyphicon-search"></span></button> </td>
				</tr>
				<tr>
					<td>Harga Satuan</td>
					<td>:</td>
					<td><input type="text" name="hrg" id="hrgbrg"  class="form-control"></td>
				</tr>
				<tr>
					<td>Sisa Kartu Stock</td>
					<td>:</td>
					<td><input type="text" readonly="" name="stock" id="stock"  class="form-control"></td>
				</tr>
				<tr>
					<td>QTY</td>
					<td>:</td>
					<td><input type="number" name="qtypesan" id="qtypesan" class="form-control"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button></td>
				</tr>
			</table>
		</div>
		</form>

<script type="text/javascript">
	$(document).ready(function(){
		$("#formCariBarang").on("submit",function(e){
			e.preventDefault();

			if(document.getElementById("namapelanggan").value == ""){
				swal({
					icon : "error",
					dangerMode : [true,"Ok"],
					title : "Pelanggan Kosong"
				})
			}else if(document.getElementById("namabrg").value == ""){
				swal({
					icon : "error",
					dangerMode : [true,"Ok"],
					title : "Barang belum di pilih"
				})
			}else if(document.getElementById("stock").value == 0 ){
				swal({
					icon : "warning",
					dangerMode : [true,"Ok"],
					title : "Jumlah stock kurang atau kosong"
				})
			}else if(document.getElementById("qtypesan").value == ""){
				swal({
					icon : "error",
					dangerMode : [true,"Ok"],
					title : "QTY masih kosong"
				})
			}else if(document.getElementById("qtypesan").value < 0 ){
				swal({
					icon : "error",
					dangerMode : [true,"Ok"],
					title : "QTY tidak sesuai"
				})
			}else if(document.getElementById("qtypesan").value > document.getElementById("stock").value ){
				swal({
					icon : "error",
					dangerMode : [true,"Ok"],
					title : "QTY saldo tidak mencukupi pesanan"
				})
			}else {
				$.ajax({
					url : "<?= base_url("administrator/InputTransaksi/listPesanan/") ?>",
					method : "POST" ,
					data : new FormData(this),
					contentType : false ,
					processData : false ,
					cache : false ,
					success : function(response){
						$("#list_pembelian").load("<?= base_url("administrator/InputTransaksi/list_pembelian") ?>");
						document.getElementById("stock").value =  parseInt(document.getElementById("stock").value ) - parseInt(document.getElementById("qtypesan").value );
					}
				})

			}

		})
	
	$("#list_pembelian").load("<?= base_url("administrator/InputTransaksi/list_pembelian") ?>")

	})
</script>

		<!-- end of input -->





		<!-- List transaksi -->

<div class="col-xs-12  widget-container-col" id="widget-container-col-3">
	<div class="widget widget-color-blue " id="widget-box-3">
		<div class="widget-header widget-header-small">
			<h4 class="widget-title" style="color: #fff">
				<i class="ace-icon fa fa-th"></i>
				List Transaksi
			</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<form action="" id="hitungListitem">
				<table class="table" id="dynamic-table">
					<tr>
						<td>Invoice</td>
						<td>Description / Nama Barang</td>
						<td>Kode Barang</td>
						<td>QTY</td>
						<td>Harga (Rp)</td>
						<td>Opsi</td>
					</tr>
					<tbody id="list_pembelian"></tbody>
					<tfoot>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td colspan="3"  align="left">
							<button type="submit" class="btn btn-primary btn-sm">Hitung</button>
							<a onclick="return confirm('Yakin Hapus')" href="<?= base_url("administrator/InputTransaksi/deleteAllListitem") ?>" id="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
						</td>
					</tfoot>
				</table>
			</form>
			</div>
		</div>
	</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#hitungListitem").on('submit',function(e){
			e.preventDefault();
			$("#daftarItembayar").load("<?= base_url("administrator/InputTransaksi/loadItemBayar") ?>")
			
		})
	})



	function del(id){
		$.ajax({
			url : "<?= base_url("administrator/InputTransaksi/hapusItem") ?>",
			method : "GET",
			data : "id="+ id ,
			success : function(response){
				$("#list_pembelian").load("<?= base_url("administrator/InputTransaksi/list_pembelian") ?>")
			}
		})
	}
</script>
		<!-- end of list transaksi -->

<div class="col-xs-12  widget-container-col" id="widget-container-col-3">
	<div class="widget widget-color-blue " id="widget-box-3">
		<div class="widget-header widget-header-small">
			<h4 class="widget-title" style="color: #fff">
				<i class="ace-icon fa fa-th"></i>
				Pembayaran Transaksi
			</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
			<form action="" id="hitungTransaksi" method="post">
				<table class="table">
					<tr>
						<td>No</td>
						<td>Kode Barang</td>
						<td>Nama Barang</td>
						<td>QTY</td>
						<td>Subtotal</td>
					</tr>
					<tbody id="daftarItembayar">
					</tbody>
					<tfoot >
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>Uang Bayar (RP)</td>
						<td><input type="text" id="uang_bayar"  name="uang_bayar"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>Uang Kembali (RP)</td>
						<td><input type="text" id="uang_kembali"  name="uang_kembali"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<button type="submit" class="btn btn-sm btn-primary" > Hitung Transaksi </button>
							<a href="javascript:save()" id="save" style="display: none;" class='btn btn-sm btn-primary'>Save</a>
						</td>
					</tr>
					</tfoot>
				</table>
			</form>
			</div>
		</div>
	</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#hitungTransaksi").on('submit',function(e){
			e.preventDefault();
			
			var grndtotal = document.getElementById("grndtotal").value ;
			var bayar = document.getElementById('uang_bayar').value ;
			var kembali = bayar - grndtotal  ; 
			if(bayar <  grndtotal  ){
				swal({
                icon : "error",
                title : "Perhatian",
                dangerMode : [true,"Iya"],
                text : "uang bayar tidak boleh kurang dari total pembelian"
              })
				return false ;
			}else {
				document.getElementById("uang_kembali").value = kembali ;
				$("#save").show();

			}
		})
	})

  function save(){
    swal({
      title: "Simpan Data",
      text: "Yakin data sudah benar",
      icon: "warning",
      buttons: [true,"Iya"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      	var bayar = document.getElementById("uang_bayar").value ;
		var kembali = document.getElementById("uang_kembali").value ;
          $.ajax({
            url : "<?= base_url('administrator/InputTransaksi/saveTransaksi') ?>",
            method : "POST",
            data : 'uang_bayar='+bayar+'&uang_kembali='+kembali ,
            success : function(response){
              swal({
                icon : "success",
                title : response
              }).then(function(){
              	window.location.href="<?= base_url("administrator/InputTransaksi") ?>"
              })
            }

          })
      }
    });
  }

</script>

		<!-- end of list transaksi -->


<!-- Modal data barang -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cari Barang</h4>
                    </div>
                    <div class="modal-body">
                        <table id="dataTables2" width="100%" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Harga Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1 ; foreach($produk as $item) :  
                              $stock = $this->m_transaksi->hitungStock($item->kode_barang)->row();
                              ?>
                              	<tr class="pilih" data-kdbar="<?= $item->kode_barang ?>" data-nambar="<?= $item->nama_barang ?>" data-hrg="<?= $item->harga_satuan ?>" data-stock="<?= $stock->jumlah ?>">
                              		<td><?= $no++ ?></td>
                              		<td><?= $item->nama_barang ?></td>
                              		<td><?= $item->kode_barang ?></td>
                              		<td><?= $item->harga_satuan ?></td>
                              	</tr>
	                          <?php endforeach ; ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>


        <!-- end of modal tabel produk -->



	</div>
</div>


<script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("kdbrg").value = $(this).attr('data-kdbar');
                document.getElementById("namabrg").value = $(this).attr('data-nambar');
                document.getElementById("hrgbrg").value = $(this).attr('data-hrg');
                document.getElementById("stock").value = $(this).attr('data-stock');
                $('#myModal').modal('hide');
            });

            $(function () {
                $("#dataTables").dataTable();
                $("#dataTables2").dataTable();
            });

        </script>