<div class="page-header">
	<h1>Unduh Data Penjualan</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
        <div class="load" style="position: absolute;margin: 70px 400px;z-index: 99">
     	<img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
     </div>


     <div class="form-group col-lg-2">
     	<label class="label label-primary">Select Type Report</label>
     	 <div class="btn-group">
		<button data-toggle="dropdown" class="btn btn-primary btn-white dropdown-toggle col-lg-12" style="width: 120%">
			Jenis Penarikan
			<i class="ace-icon fa fa-angle-down icon-on-right"></i>
		</button>

		<ul class="dropdown-menu" id="item">
			<li value="1"><a href="#">Per Kode Barang</a></li>
			<li value="2" ><a href="#">All Barang</a></li>
		</ul>
	</div><!-- /.btn-group -->
     </div>

<div id="form-report" >
     <div class="form-group">
     	<button type="button" disabled="" id="btn-d"  data-toggle="modal" data-target="#myModal" href="#">
     		Cari Barang <i class="fa fa-search-plus"></i>
     	</button>
     </div>

     <hr>


		<!-- input data transaksi-->
		<form onsubmit="return validasi()" class="form-horizontal" action="<?= base_url("administrator/Unduh/downloadPenjualan") ?>" method="post" id="" role="form">
		<div class="col-lg-6">
			<table class="table">
				<tr>
					<td>Nama Barang</td>
					<td>:</td>
					<td  colspan="2">
						<input type="hidden" id="id" name="id" value="">
						<input type="text" readonly="" name="nama_barang"  id="nama_barang" class="form-control">
					</td>
					<td></td>
				</tr>
				<tr>
					<td>Kode Barang</td>
					<td>:</td>
					<td  colspan="2"><input type="text" readonly="" name="kode_barang"  id="kode_barang" class="form-control"></td>
					<td></td>
				</tr>

				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td>
							<div class="input-daterange input-group">
								<input autocomplete="off" placeholder="dari"  type="text" class="input-sm form-control" id="start" name="start" />
							</div>
					</td>
					<td>
						
							<div class="input-daterange input-group">
								<input autocomplete="off" type="text"  placeholder="sampai" class="input-sm form-control" id="end" name="end" />
							</div>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<button type="submit" class="btn btn-sm btn-info">Download Report</button>
						<button type="reset" class="btn btn-sm btn-info">Reset</button>
					</td>
					<td></td>
				</tr>
			</table>
				<div id="info">
			
		</div>
		</div>
		</form>

	</div>
</div>

</div>

<!-- Modal data barang -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="myModalLabel">Cari Barang</h5>
                    </div>
                    <div class="modal-body">
                        <table id="dataTables2" width="100%" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Harga Satuan</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1 ; foreach($produk as $item) :  
                              $stock = $this->m_transaksi->hitungStock($item->kode_barang)->row();
                              ?>
                              	<tr >
                              		<td><?= $no++ ?></td>
                              		<td><?= $item->nama_barang ?></td>
                              		<td><?= $item->kode_barang ?></td>
                              		<td><?= $item->harga_satuan ?></td>
                              		<td class="pilih" data-kdbar="<?= $item->kode_barang ?>" data-nambar="<?= $item->nama_barang ?>"><button type="button" class="btn btn-xs btn-info">Select</button> </td>
                              	</tr>
	                          <?php endforeach ; ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        <!-- end of modal tabel barang -->

<script type="text/javascript">
	$(document).on("click",".pilih",function(e){
		document.getElementById('nama_barang').value = $(this).attr("data-nambar");
		document.getElementById('kode_barang').value = $(this).attr("data-kdbar");

		$("#myModal").modal("hide");
	})


	//load form unduh report berdasarkan tanggal atau load semua item
     	$(document).ready(function(){
     		$("li").on("click",function(e){
     			var id = $(this).val();
     			if(id == 1){
     				$("#btn-d").attr("disabled",false);
     				$("#btn-d").attr("class","btn btn-danger btn-sm");
     				$("#nama_barang").attr("value","");
     				$("#kode_barang").attr("value","");
     				$("#id").attr("value","1");
     			}else {
     				$("#btn-d").attr("class","");
     				document.getElementById("nama_barang").value = "All Item" ;
     				document.getElementById("kode_barang").value = "All Item" ;
     				$("#id").attr("value","2");
     				$("#btn-d").attr("disabled",true);
     			}
     		})
     	})

		function validasi(){
		if(document.getElementById("kode_barang").value == ""){
			$("#info").html('<div class="alert alert-danger">Data belum lengkap</div>');
			return false ;
		}
		if(document.getElementById("nama_barang").value == ""){
			$("#info").html('<div class="alert alert-danger">Data belum lengkap</div>');
			return false ;
		}

		if(document.getElementById("start").value == ""){
			$("#info").html('<div class="alert alert-danger">Data belum lengkap</div>');
			return false ;
		}

		if(document.getElementById("end").value == ""){
			$("#info").html('<div class="alert alert-danger">Data belum lengkap</div>');
			return false ;
		}
	}
</script>