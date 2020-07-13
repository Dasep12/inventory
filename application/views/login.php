
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - App Inventory</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?= base_url() ?>/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?= base_url() ?>/assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?= base_url() ?>/assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?= base_url() ?>/assets/css/ace-rtl.min.css" />
		<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout blur-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-book green"></i>
									<span class="red">App</span>
									<span class="white" id="id-text2">Inventory</span>
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>
											<div id="Loading" style="display: none;position: absolute;z-index: 9;height: 50px ;width: 60px;margin: 10px 100px;" >
												<img  class="img-thumbnail" src="<?= base_url('assets/images/loading.gif') ?>">
											</div>
											<form id="formlogin" method="post" name="form">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input autocomplete="off" type="text" id="nik" name="nik" class="form-control" placeholder="NIK" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="password" name="pass" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>
													<div class="space-4"></div>

													<div id="info" style="display: none;" class="alert alert-danger">
														<center><label id="info2" ></label></center>
													</div>
												</fieldset>
											</form>	

											<script type="text/javascript">
												$(document).ready(function(){
													$("#formlogin").on("submit",function(e){
														e.preventDefault();
														if(document.getElementById('nik').value == ""){
															$("#info").show(250);
															$("#info2").html("<b><i class='fa fa-info-circle'></i> nik belum diisi</b>");
														}else if(document.getElementById('password').value == ""){
															$("#info").show();
															$("#info2").html("<b><i class='fa fa-info-circle'></i> password belum diisi </b>");
														}else {
															$.ajax({
																url : "<?= base_url('Login/cekLogin') ?>",
																method : "POST",
																data : new FormData(this),
																processData : false ,
																cache : false ,
																contentType : false ,
																beforeSend : function(){
																	$("#Loading").show();
																},
																complete: function(){
																	$("#Loading").hide();
																},
																success : function(e){
																	if(e == "0"){
																		$("#info").show();
																		$("#info2").html("<b><i class='fa fa-info-circle'></i>  akun tidak terdaftar</b>");
																	}else if(e == "1"){
																		window.location.href="<?= base_url('administrator/Dashboard') ?>"
																	}else if(e == "2"){
																		window.location.href="<?= base_url('user/Dashboard') ?>"
																	}
																}
															})
														}
													})
												})
											</script>
	
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

	
							</div><!-- /.position-relative -->

						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
