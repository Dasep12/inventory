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
			<option><?= $barang->nama_supplier ?></option>
			<?php foreach($supplier as $supp) : ?>
			<option id="<?= $supp->id ?>"><?= $supp->nama_supplier ?></option>
				
			<?php endforeach ?>
		</select>
		<label>Kode Supplier</label>
		<input type="text" name="kode_supplier" readonly="" value="<?= $barang->kode_supplier ?>"   id="kode_supp" class="form-control">

</div>
</div>
<script type="text/javascript">
	$(document).on("click",'#1',function(e){
		alert("tes")
	})
</script>