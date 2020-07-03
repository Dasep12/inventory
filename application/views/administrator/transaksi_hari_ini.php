<div class="page-header">
	<h1>Transaksi Hari ini</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">

		 <table id="paginationData" width="100%" class="mt-2 table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total </th>
                    <th>Lihat</th>
                </tr>
            </thead>
            <tbody id="show_data"></tbody>
        </table> 
		</div>
	</div>
</div>

<!-- modal lihat transaksi -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_transaksi" class="modal fade">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             	<h6>No Transaksi <b id="no_inv"></b></h6>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
             	<img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <div class="modal-body" id="output_list">

             </div>

             <div class="modal-footer">
         	<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</a>
         </div>
             </div>
         </div>
     </div>
 </div>

<!-- end of modal lihat transaksi -->



<script>
	$(document).ready(function(){


		//tampilkan list invoice per hari ini ke dalam tabel
		var i ;
		var j = 1  ;
		var table ;
		$.ajax({
			url : "<?= base_url("administrator/Transaksi/sendData") ?>",
			type : 'ajax',
			dataType : 'json',
			async : false ,
			success : function(data){
				for(i=0; i < data.length ; i++){
					var total = parseInt(data[i].pembayaran - data[i].kembali);
					table += '<tr>'+
							'<td>'+ j + '</td>' +
							'<td>'+ data[i].no_transaksi + '</td>' +
							'<td>'+ data[i].tanggal + '</td>' +
							'<td>'+ total + '</td>' +
							'<td><a href="javascript:;" data-id="'+ data[i].no_transaksi +'" data-toggle="modal" data-target="#lihat_transaksi" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-book"></i> </a>  </a></td>' +
							'</tr>' ;
					j++ ;
				}
				$("#show_data").html(table)
			}
		})


		//tampilkan list transaksi ke dalam modal
		$("#lihat_transaksi").on('show.bs.modal',function(e){
				var div = $(e.relatedTarget);
				var modal = $(this);
				var id = div.data("id");
					$.ajax({
						url : "<?= base_url("administrator/Transaksi/listPesanan") ?>" ,
						data :"id="+ id ,
						method : "GET",
						success : function(response){
							document.getElementById('no_inv').innerHTML = id ;
							$("#output_list").html(response);
						}

					})
		}) 
	})


</script>


