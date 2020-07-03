<div class="page-header">
	<h1>Tambah Barang Baru </h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
        <div class="load" style="position: absolute;margin: 70px 400px;z-index: 99">
     	<img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
     </div>
		<!-- input data transaksi-->
		<form class="form-horizontal" method="post" id="formTambahBarang" role="form">
		<div class="col-lg-6">
			<table class="table">
				<tr>
					<td>Nama Barang</td>
					<td>:</td>
					<td>
						<input type="text" name="nama_barang"  id="nama_barang" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Kode Barang</td>
					<td>:</td>
					<td><input type="text" name="kode_barang"  id="kode_barang" class="form-control"></td>
				</tr>
				<tr>
					<td>Harga Satuan</td>
					<td>:</td>
					<td><input type="text" name="harga_satuan" id="harga_satuan"  class="form-control"></td>
				</tr>
				<tr>
					
					<td>Deskripsi Barang</td>
					<td>:</td>
					<td>
						<textarea name="deskripsi" rows="4" cols="50"></textarea>
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
					<td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><b></b> <span class="glyphicon glyphicon-search"></span></button> </td>
				</tr>
				<tr>
					<td>Kode Supplier</td>
					<td>:</td>
					<td><input type="text" name="kode_supplier" readonly="" id="kode_supp" class="form-control"></td>

				</tr>
				<tr>
					<td>Satuan Barang</td>
					<td>:</td>
					<td><input type="text" name="satuan" id="satuan" class="form-control"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah ke Master Barang</button></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
</div>

<!-- Modal data supplier -->
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
                                    <th>Nama Supplier</th>
                                    <th>Kode Supplier</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1 ; foreach($supplier as $item) : ?>
                              	<tr class="pilih" data-kdsupp="<?= $item->kode_supplier ?>" data-namsupp="<?= $item->nama_supplier ?>" >
                              		<td><?= $no++ ?></td>
                              		<td><?= $item->nama_supplier ?></td>
                              		<td><?= $item->kode_supplier ?></td>
                              	</tr>
	                          <?php endforeach ; ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        <!-- end of modal tabel supplier -->

 <script>
 	$(document).ready(function(){

 		//masukan data dari modal ke form kode supplier && nama supplier
 		$(".pilih").on("click",function(e){
 				document.getElementById('kode_supp').value = $(this).attr("data-kdsupp");
 				document.getElementById('nama_supp').value = $(this).attr("data-namsupp");
 				$("#myModal").modal('hide');
 		})

 		//input data barang baru 
 		$("#formTambahBarang").on("submit",function(e){
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
 				}else {
 					$.ajax({
 						url : "<?= base_url("administrator/Barangbaru/input") ?>",
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
 							swal({
 								icon :  "success",
 								title : "Sukses",
 								text : response 
 							})

 						}
 					})
 				}
 		})
 	})
 </script>