
<div class="page-header">
	<h1>Setting </h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">


     <hr>

		<!-- input data transaksi-->
		<form class="form-horizontal" method="post" id="formSetting" role="form">
		<div class="col-lg-6">
			<table class="table">
				<tr>
					<td>Username</td>
					<td>:</td>
					<td>
						<input type="hidden" name="id" value="<?= $user->nik ?>">
						<input type="text"  name="username"  id="username" value="<?= $user->nama ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>NIK</td>
					<td>:</td>
					<td><input type="text" readonly="" name="nik"  id="nik" value="<?= $user->nik ?>" class="form-control"></td>
				</tr>
				<tr>
					<td>Level</td>
					<td>:</td>
					<td><input type="text" readonly="" name="role_id" readonly=""  id="role_id" value="<?= $user->role_id == 1 ? "Administrator " : "user" ?>" class="form-control"></td>
				</tr>
				<tr>
					<td>New Password</td>
					<td>:</td>
					<td><input type="password" value="<?= $user->pass ?>" name="pass" id="pass"  class="form-control"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Update</button></td>
				</tr>				
			</table>
		</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".load").fadeOut(100);
		$("#formSetting").on("submit",function(e){
			e.preventDefault();
			if(document.getElementById('username').value == ""){
				swal({
					icon : "error",
					title : "Gagal",
					dangerMode : [true,"Ok"]
				})
			}else {
				$.ajax({
					url : "<?= base_url("administrator/Setting/update") ?>",
					method : "POST",
					data : new  FormData(this),
					cache : false ,
					contentType : false ,
					processData : false ,
					beforeSend : function(){
						$(".load").fadeOut(100);
					},
					complete : function(){
						$("#reloading").addClass("reloading");
						$(".reloading").fadeOut(100);
					},
					success : function(e){
						swal({
							icon : "success",
							title : "Berhasil",
						}).then(function(){
							window.location.href="<?= base_url("administrator/Setting") ?>"
						})
					}

				})
			}
		})
	})
</script>

