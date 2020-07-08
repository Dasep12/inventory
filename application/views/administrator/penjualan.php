<div class="page-header">
	<h1>History Penjualan</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">

		 <table id="list_jual" width="100%" class="mt-2 table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total </th>
                    <th>Lihat</th>
                </tr>
            </thead>
            <tbody id="show_data">
            </tbody>
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
 
         </div>
             </div>
         </div>
     </div>
 </div>

<!-- end of modal lihat transaksi -->



<script>
	$(document).ready(function(){

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

		$("#list_jual").dataTable({
			"pageLength" : 5 ,
			"ajax" : {
				url : "<?= base_url("administrator/Penjualan/getData") ?>",
				type : "get" 
			}
		}); 
	})


</script>


