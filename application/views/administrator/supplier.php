<div class="page-header">
	<h1>Daftar Supplier </h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
	<div class="form-group">
		<button data-toggle="modal" data-target="#tambah-data" class="btn btn-primary btn-sm mb-2"><i class="fa fa-plus"></i> Tambah Supplier </button>
	</div>
		 <table id="paginationData" width="100%" class="mt-2 table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Kode Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="show_data"></tbody>
        </table> 

		</div>
	</div>
</div>

<!-- modal tambah data -->

 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
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
             <form  method="post" id="formUpdateSupp">
             <div class="modal-body" id="update_supp">

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


<script>
	$(document).ready(function(){

	//load data form data supplier  kedalam modal
		$("#edit-data").on("show.bs.modal",function(event){
			var div = $(event.relatedTarget);
			var modal = $(this);
			var id = div.data('id');
				//kirim data ke controller supplier
				$.ajax({
					url : "<?= base_url("administrator/Supplier/loadForm") ?>",
					data : "id="+id ,
					method : "POST",
					success : function(response){
						$("#update_supp").html(response);
					}
				})
		}) 


	//update data supplier
		$("#formUpdateSupp").on("submit",function(e){
			e.preventDefault();
				if($("#nama_supp").val() == "" ){
					swal({
						icon : "error",
						title : "Nama Supplier kosong",
						dangerMode : [true,"Ok"]
					})
				}else if($("#kode_supp").val() == "" ){
					swal({
						icon : "error",
						title : "Kode Supplier kosong",
						dangerMode : [true,"Ok"]
					})
				}else {
					$.ajax({
						url : "<?= base_url("administrator/Supplier/update") ?>",
						method : "POST",
						data : new FormData(this),
						processData : false ,
						contentType : false ,
						cache : false ,
						beforeSend : function(){
							$("#loading").show();
						},
						complete : function(){
							$("#loading").hide();
						},
						success : function(msg){
							if(msg == "Data Update"){
								swal({
									icon : "success",
									title : msg,
								}).then(function(){
									window.location.href="<?= base_url("administrator/Supplier") ?>"
								})
							}else {
								swal({
									icon : "error",
									title : msg,
									dangerMode : [true,"Ok"]
								})
							}
							
						}
					})
				}
		})

		//load data ke dalam tabel lewat json 
		var i ; 
		var j = 1  ;
		var html ;
		$.ajax({	
			url : "<?= base_url("administrator/Supplier/sendData") ?>",
			type : 'ajax',
			dataType : 'json', 
			async : false ,
			success : function(response){
				for(i=0 ; i < response.length ; i++){
					html += '<tr>'+
							'<td>'+ j + '</td>'+
							'<td>'+ response[i].nama_supplier + '</td>'+
							'<td>'+ response[i].kode_supplier + '</td>'+
							'<td>'+
							'<a href="javascript:;" data-id="'+ response[i].id +'" data-toggle="modal" data-target="#edit-data" class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i> </a>'+
							'<a style="margin-left:8px;" class="text-danger btn btn-danger btn-xs  ml-2" href="javascript:del('+ response[i].id +')"><i class="fa fa-trash"></i> </a></td>'+
							'</tr>';
					j++ ;
				}
				$("#show_data").html(html);
			}
		})
	})



		//tambah data supplier baru
		$("#formAddsupp").on('submit',function(e){
			e.preventDefault();
				if($("#nama_supplier").val() == "" ){
					swal({
						icon : "error",
						title : "Nama Supplier kosong",
						dangerMode : [true,"Ok"]
					})
				}else if($("#kode_supplier").val() == "" ){
					swal({
						icon : "error",
						title : "Kode Supplier kosong",
						dangerMode : [true,"Ok"]
					})
				}else {
					$.ajax({
						url : "<?= base_url("administrator/Supplier/input") ?>",
						method : "POST",
						data : new FormData(this),
						processData : false ,
						contentType : false ,
						cache : false ,
						beforeSend : function(){
							$("#loading").show();
						},
						complete : function(){
							$("#loading").hide();
						},
						success : function(msg){
							if(msg == "Sukses"){
								swal({
									icon : "success",
									title : msg,
								}).then(function(){
									window.location.href="<?= base_url("administrator/Supplier") ?>"
								})
							}else {
								swal({
									icon : "error",
									title : msg,
									dangerMode : [true,"Ok"]
								})
							}
						}
					})
				}
		})


	//hapus data supplier lewat ajax
	function del(id){
		swal({
          title: "Yakin Hapus Supplier?",
          text: "data yang di hapus tidak bisa di kembalikan",
          icon: "warning",
          buttons: [true,"Tetap Hapus"],
          dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
              url : "<?= base_url('administrator/Supplier/delete') ?>",
              method : "GET",
              data : "id="+ id ,
              success : function(response){
                swal({
                  icon : "success",
                  title : response,
                }).then(function(){
                  window.location.href="<?= base_url('administrator/Supplier') ?>"
                })
              }
            })
        }
      });
	}



</script>