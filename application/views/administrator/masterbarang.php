<div class="page-header">
	<h1>Master Data Barang </h1>
</div><!-- /.page-header -->



<div class="row">
	<div class="col-xs-12">
		 <table id="paginationData" width="100%" class="mt-2 table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Harga Satuan</th>
                    <th>Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="show_data">
            	
            </tbody>
        </table> 
	
<!-- modal edit data master barang -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             	<h4>Update Data Barang</h4>
             </div>
             <div class="load" style="position: absolute;margin: 60px 350px;z-index: 99">
             	<img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <form  method="post" id="formUpdateBarang">
             <div class="modal-body" id="update_barang">

             </div>

             <div class="modal-footer">
         	<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Perbarui Data</button>
         </div>
             </div>
         </div>
     </form>
     </div>
 </div>
</div>
<!-- end of modal edit master barang -->


<script>
	$(document).ready(function(){

		//load data master barang ke tabel via ajax
		var i ;
		var j = 1 ;
		var html ; 
		$.ajax({
			url : "<?= base_url("administrator/Masterbarang/sendData") ?>",
			type : 'ajax',
			dataType : 'json',
			async : false ,
			success : function(data){
				for(i = 0 ; i < data.length ; i++){
					html += '<tr>'+
							'<td>'+ j + '</td>' +
							'<td>'+ data[i].nama_barang + '</td>'+
							'<td>'+ data[i].kode_barang + '</td>'+
							'<td>'+ data[i].harga_satuan + '</td>'+
							'<td>'+ data[i].nama_supplier + '</td>'+
							'<td>'+
							'<a href="javascript:;" data-id="'+ data[i].id +'" data-toggle="modal" data-target="#edit-data" class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i> </a>'+
							'<a style="margin:2px;" class="btn btn-xs btn-danger ml-2" href="javascript:del('+ data[i].id +')"><i class="fa fa-trash"></i></a>'+
							'</td>'+
							'</tr>';
					j++ ;
				}
				$("#show_data").html(html);
			}
		})

		//tampilkan data barang ke dalam modal 
		$("#edit-data").on("show.bs.modal",function(e){
			var div = $(e.relatedTarget);
			var modal = $(this);
			var id = div.data("id");

				$.ajax({
					url : "<?= base_url("administrator/Masterbarang/loadModal") ?>",
					data : "id="+id ,
					method : "GET",
					success : function(response){
						$("#update_barang").html(response);
					}
				})
		})


		//kirim data update barang ke controller dan update 
		$("#formUpdateBarang").on("submit",function(e){
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
 				}else if(document.getElementById("satuan").value == ""){
 					swal({
 						icon : "error",
 						dangerMode : [true],
 						title : "Satuan Barang Kosong"
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
 				}else {
 					$.ajax({
 						url : "<?= base_url("administrator/Masterbarang/update") ?>",
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
 								title :  response ,
 							}).then(function(){
 								window.location.href="<?= base_url("administrator/Masterbarang") ?>"
 							})
 						}
 					})
 				}
		})

	})

		//hapus data dari master barang
		function del(id){
			swal({
		          title: "Yakin Hapus Barang?",
		          text: "data yang di hapus tidak bisa di kembalikan",
		          icon: "warning",
		          buttons: [true,"Tetap Hapus"],
		          dangerMode: true,
		      }).then((willDelete) => {
		        if (willDelete) {
		            $.ajax({
		              url : "<?= base_url('administrator/Masterbarang/delete') ?>",
		              method : "GET",
		              data : "id="+ id ,
		              success : function(response){
		                swal({
		                  icon : "success",
		                  title : response,
		                }).then(function(){
		                	window.location.href="<?= base_url("administrator/Masterbarang") ?>"
		                })
		              }
		            })
		        }
		      });
		}
</script>
