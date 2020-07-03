<div class="page-header">
	<h1>Tambah Stock Barang</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
        <div class="load" style="position: absolute;margin: 70px 400px;z-index: 99">
     	<img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
     </div>

     <div class="form-inline  mb-2">
     	<h4>Cari Barang</h4>
     	<a href="#">
     		<img  data-toggle="modal" data-target="#myModal" height="40" width="100" class="img img-thumbnail" src="<?= base_url("assets/images/icon_inv.png") ?>" >
     	</a>
     </div>
     <hr>

		<!-- input data transaksi-->
		<form class="form-horizontal" method="post" id="formTambahStockBarang" role="form">
		<div class="col-lg-6">
			<table class="table">
				<tr>
					<td>Nama Barang</td>
					<td>:</td>
					<td>
						<input type="text" readonly="" name="nama_barang"  id="nama_barang" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Kode Barang</td>
					<td>:</td>
					<td><input type="text" readonly="" name="kode_barang"  id="kode_barang" class="form-control"></td>
				</tr>
				<tr>
					<td>Harga Satuan</td>
					<td>:</td>
					<td><input type="text" readonly="" name="harga_satuan" id="harga_satuan"  class="form-control"></td>
				</tr>
				<tr>
					
					<td>Deskripsi Barang</td>
					<td>:</td>
					<td>
						<textarea name="deskripsi" id="deskripsi" readonly="" rows="4" cols="50"></textarea>
					</td>
				</tr>
				
			</table>
		</div>

		<div class="col-lg-6">
			<table class="table">
				<tr>
					<td>Nama Supplier</td>
					<td>:</td>
					<td><input type="text" name="nama_supplier" readonly="" id="nama_supp" class="form-control"></td>
				</tr>
				<tr>
					<td>Kode Supplier</td>
					<td>:</td>
					<td><input type="text" name="kode_supplier" readonly="" id="kode_supp" class="form-control"></td>

				</tr>
				<tr>
					<td>Satuan Barang</td>
					<td>:</td>
					<td><input type="text" readonly="" name="satuan" id="satuan" class="form-control"></td>
				</tr>
				<tr>
					<td>Masukan Jumlah Stock</td>
					<td>:</td>
					<td><input type="number"  name="barang_masuk" id="barang_masuk" class="form-control"></td>
				</tr>
				<tr>
					<td>Nilai Rupiah</td>
					<td>:</td>
					<td><input type="text"  name="nilai" id="nilai" class="form-control"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Stock Barang</button></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
</div>


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
                              <?php $no = 1 ; foreach($produk as $item) : ?>
                              	<tr class="pilih"
                              		data-nambar="<?= $item->nama_barang ?>"
                              		data-kdbar="<?= $item->kode_barang ?>"
                              		data-hrg="<?= $item->harga_satuan ?>"
                              		data-desc="<?= $item->deskripsi ?>"
                              		data-nama_supp="<?= $item->nama_supplier ?>"
                              		data-kode_supp="<?= $item->kode_supplier ?>"
                              		data-satuan="<?= $item->satuan ?>"
                              	>
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


<script>
	//input data dari modal ke dalam form 
	$(document).on("click",'.pilih',function(e){
		document.getElementById('nama_barang').value	= $(this).attr("data-nambar");
		document.getElementById('kode_barang').value 	= $(this).attr("data-kdbar");
		document.getElementById('harga_satuan').value 	= $(this).attr("data-hrg");
		document.getElementById('deskripsi').value	 	= $(this).attr("data-desc");
		document.getElementById('nama_supp').value 		= $(this).attr("data-nama_supp");
		document.getElementById('kode_supp').value 	    = $(this).attr("data-kode_supp");
		document.getElementById('satuan').value 		= $(this).attr("data-satuan");
		$("#myModal").modal("hide");
	})


	//kirim data update stock ke controller
	$(document).ready(function(){
		$("#formTambahStockBarang").on("submit",function(e){
			e.preventDefault();
				if(document.getElementById("nama_barang").value == ""){
 					swal({
 						icon : "error",
 						dangerMode : [true],
 						title : "Nama Barang Kosong"
 					});
 				}else if(document.getElementById("kode_barang").value == ""){
 					swal({
 						icon : "error",
 						dangerMode : [true],
 						title : "Kode Barang Kosong"
 					});
 				}else if(document.getElementById("harga_satuan").value == ""){
 					swal({
 						icon : "error",
 						dangerMode : [true],
 						title : "Harga Satuan Barang Kosong"
 					});
 				}else if(document.getElementById("nama_supp").value == ""){
 					swal({
 						icon : "error",
 						dangerMode : [true],
 						title : "Nama Supplier Kosong"
 					});
 				}else if(document.getElementById("kode_supp").value == ""){
 					swal({
 						icon : "error",
 						dangerMode : [true],
 						title : "Kode Supplier Kosong"
 					});
 				}else if(document.getElementById("satuan").value == ""){
 					swal({
 						icon : "error",
 						dangerMode : [true],
 						title : "Satuan Barang Kosong"
 					});
 				}else if(document.getElementById("nilai").value == ""){
 					swal({
 						icon : "error",
 						dangerMode : [true],
 						title : "Total Rupiah Barang Kosong"
 					});
 				}else if(document.getElementById("barang_masuk").value == ""){
 					swal({
 						icon : "error",
 						dangerMode : [true],
 						title : "Jumlah Stock Kosong"
 					});
 				}else {
 					$.ajax({
 						url : "<?= base_url("administrator/Tambahstock/input") ?>",
 						method : "POST" ,
 						data : new  FormData(this),
 						cache : false ,
 						processData : false ,
 						contentType : false ,
 						beforeSend : function(){
 							$("#loading").show();
 						},
 						complete : function(){
 							$("#loading").hide();
 						},
 						success : function(response){
 							if(response == "Sukses"){
	 							swal({
	 								icon :  "success",
	 								title : response, 
	 							}).then(function(){
	 								window.location.href="<?= base_url("administrator/Tambahstock") ?>"
	 							})
 							}else {
 								swal({
	 								icon :  "error",
	 								title : response, 
	 							})
 							}

 						}
 					})
 				}
		})
	})	
</script>