<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<div class="row">
<div class="col-lg-6">

		<label>Nama Barang</label>
		<input type="hidden" name="id" value="<?= $barang->id ?>">
		<input type="text" name="nama_barang" value="<?= $barang->nama_barang ?>" id="nama_barang" class="form-control">
	
		<label>Kode Barang</label>
		<input type="text" name="kode_barang" value="<?= $barang->kode_barang ?>" id="kode_barang" class="form-control">

		<label>Harga Satuan</label>
		<input type="text" name="harga_satuan" value="<?= $barang->harga_satuan?>" id="harga_satuan"  class="form-control">
	
		<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="4" cols="50"><?= $barang->deskripsi ?></textarea>
		</div>

</div>


<div class="col-lg-6">

		<label>Satuan Barang</label>
		<input type="text" name="satuan" value="<?= $barang->satuan ?>" id="satuan" class="form-control">

		<label>Nama Supplier</label>
		<select name="nama_supplier" id="nama_supp" class="form-control">
			<option id="<?= $barang->kode_supplier ?>"><?= $barang->nama_supplier ?></option>
			<?php foreach($supplier as $supp) : ?>
			<option  id="<?= $supp->kode_supplier ?>"><?= $supp->nama_supplier ?></option>

			<script type="text/javascript">
				$(document).ready(function(){
					$("#<?= $supp->kode_supplier ?>").on("click",function(){
						data = $(this).val();
						$.ajax({
							url : "<?= base_url("administrator/Masterbarang/updateSupp") ?>",
							method : "GET",
							data : "id="+ data ,
							success : function(e){
								$("#kode_supp").attr("value",e);
							}
						})
					})

				})
			</script>
			<?php endforeach ?>
		</select>
		<label>Kode Supplier</label>
		<input type="text" name="kode_supplier" readonly="" value="<?= $barang->kode_supplier ?>"   id="kode_supp" class="form-control">
	</div>
</div>


<!-- modal tambah data -->

 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="suppl" class="modal fade">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <button aria-hidden="true" data-dismiss="modal" class="close small" type="button">×</button>
             	<span><h5>Tambah Supplier</h5></span>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
             	<img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <div class="modal-body">
             	<form method="post" id="formAddsupp">
             	<div class="form-group">
             		<label>Nama Supplier</label>
             		<input class="form-control" type="text" name="nama_supplier" id="nama_supplier">
             	</div>

             	<div class="form-group">
             		<label>Kode Supplier</label>
             		<input class="form-control" type="text" name="kode_supplier" id="kode_supplier">
             	</div>
             </div>

         <div class="modal-footer">
         	<button class="btn btn-primary btn-sm">Simpan</button>
         </div>
             </div>
         </div>
     </form>
     </div>
 </div>

<!-- end of modal tambah data -->