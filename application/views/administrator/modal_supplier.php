<form method="post" id="formAddsupp">
 	<div class="form-group">
 		<label>Nama Supplier</label>
 		<input type="hidden" name="id" value="<?= $supplier->id ?>">
 		<input class="form-control" value="<?= $supplier->nama_supplier ?>" type="text" name="nama_supp" id="nama_supp">
 	</div>

 	<div class="form-group">
 		<label>Kode Supplier</label>
 		<input class="form-control" type="text" value="<?= $supplier->kode_supplier ?>" name="kode_supp" id="kode_supp">
 	</div>