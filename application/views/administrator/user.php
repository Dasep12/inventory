<div class="page-header">
	<h1>List User </h1>
</div><!-- /.page-header -->



<div class="row">
	<div class="col-xs-12">
	<div class="form-group">
		<button data-toggle="modal" data-target="#tambah-data" class="btn btn-primary btn-sm mb-2">Tambah User <i class="fa fa-user-plus"></i> </button>
	</div>
		 <table id="paginationData" width="100%" class="mt-2 table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="show_data">
            	<?php $no = 1 ; foreach($user as $item) : ?>
            		<tr>
            			<td><?= $no++ ?></td>
            			<td><?= $item->nama ?></td>
            			<td><?= $item->nik ?></td>
            			<td>
            				<a class="btn btn-danger btn-xs text-danger" href="javascript:del(<?= $item->nik ?>)"> <i class="fa fa-trash"></i></a>
            				<a href="javascript:;" data-id="<?= $item->nik ?>" data-toggle="modal" data-target="#edit-data" class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i> </a>
            			</td>
            		</tr>
            	<?php endforeach ?>
            </tbody>
        </table> 
	</div>
</div>


<!-- modal tambah data -->

 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <button aria-hidden="true" data-dismiss="modal" class="close small" type="button">×</button>
             	<span><h5>Tambah User</h5></span>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
             	<img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <div class="modal-body">
             	<form method="post" id="formAdduser">
             	<div class="form-group">
             		<label>Nama User</label>
             		<input class="form-control" type="text" name="nama" id="nama">
             	</div>

             	<div class="form-group">
             		<label>NIK</label>
             		<input class="form-control" type="text" name="nik" id="nik">
             	</div>

             	<div class="form-group">
             		<label>Password</label>
             		<input class="form-control" type="password" name="password" id="password">
             	</div>

             	<div class="form-group">
             		<label>Level User</label>
             		<select class="form-control" name="role_id">
             			<option value="1">Administrator</option>
             			<option value="2">User</option>
             		</select>
             	</div>


             </div>

         <div class="modal-footer">
         	<button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
         </div>
             </div>
         </div>
     </form>
     </div>
 </div>

<!-- end of modal tambah data -->

<!-- modal edit data supplier -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
             	<img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <form  method="post" id="formUpdateuser">
             <div class="modal-body" id="update_user">

             </div>

             <div class="modal-footer">
         	<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
         </div>
             </div>
         </div>
     </form>
     </div>
 </div>

<!-- end of modal edit data supplier -->


<script type="text/javascript">

	$(document).ready(function(){
		//tambah data user akun pengguna
		$("#formAdduser").on("submit",function(e){
			e.preventDefault();
			if(document.getElementById('nama').value == ""){
				swal({
					icon : "error",
					title : "nama kosong",
					dangerMode : [true,"OK"]
				})
			}else if(document.getElementById('nik').value == ""){
				swal({
					icon : "error",
					title : "nik kosong",
					dangerMode : [true,"OK"]
				})
			}else if(document.getElementById('password').value == ""){
				swal({
					icon : "error",
					title : "password kosong",
					dangerMode : [true,"OK"]
				})
			}else {
				$.ajax({
					url : "<?= base_url("administrator/User/input") ?>",
					method : "POST",
					data : new FormData(this),
					cache : false ,
					contentType : false ,
					processData : false ,
					beforeSend : function(){
						$("#loading").show();
					},
					complete : function(){
						$("#loading").hide();
					},
					success : function(response){
						swal({
							icon : "success",
							title :"Berhasil"
						}).then(function(){
							window.location.href="<?= base_url("administrator/User") ?>"
						})
					}
				})
			}
		})

		//update data user akun pengguna
		$("#formUpdateuser").on("submit",function(e){
			e.preventDefault();
			if(document.getElementById('nama2').value == ""){
				swal({
					icon : "error",
					title : "nama kosong",
					dangerMode : [true,"OK"]
				})
			}else if(document.getElementById('nik2').value == ""){
				swal({
					icon : "error",
					title : "nik kosong",
					dangerMode : [true,"OK"]
				})
			}else {
				$.ajax({
					url : "<?= base_url("administrator/User/update") ?>",
					method : "POST",
					data : new FormData(this),
					cache : false ,
					contentType : false ,
					processData : false ,
					beforeSend : function(){
						$("#loading").show();
					},
					complete : function(){
						$("#loading").hide();
					},
					success : function(response){
						swal({
							icon : "success",
							title :"Berhasil"
						}).then(function(){
							window.location.href="<?= base_url("administrator/User") ?>"
						})
					}
				})
			}
		})


		//load data form data supplier  kedalam modal
		$("#edit-data").on("show.bs.modal",function(event){
			var div = $(event.relatedTarget);
			var modal = $(this);
			var id = div.data('id');
				//kirim data ke controller supplier
				$.ajax({
					url : "<?= base_url("administrator/User/form_update") ?>",
					data : "id="+id ,
					method : "POST",
					success : function(response){
						$("#update_user").html(response);
					}
				})
		}) 
	})

		//hapus data supplier lewat ajax
	function del(id){
		swal({
          title: "Yakin Hapus Data?",
          text: "data yang di hapus tidak bisa di kembalikan",
          icon: "warning",
          buttons: [true,"Tetap Hapus"],
          dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
              url : "<?= base_url('administrator/User/delete') ?>",
              method : "GET",
              data : "id="+ id ,
              success : function(response){
                swal({
                  icon : "success",
                  title : response,
                }).then(function(){
                  window.location.href="<?= base_url('administrator/User') ?>"
                })
              }
            })
        }
      });
	}
</script>