
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Penjualan Sparepart</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		

		<!-- text fonts -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?= base_url() ?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/ace-rtl.min.css" />

		<!-- choosen option -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/chosen.min.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?= base_url() ?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?= base_url() ?>assets/js/ace-extra.min.js"></script>
		<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
		<script src="<?= base_url() ?>assets/js/jsweetalert.js"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?= base_url() ?>assets/js/html5shiv.min.js"></script>
		<script src="<?= base_url() ?>assets/js/respond.min.js"></script>
		<![endif]-->


		<!-- datepicker -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-colorpicker.min.css" />

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?= base_url() ?>index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Ace Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="<?= base_url() ?>#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?= base_url() ?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?= base_url() ?>#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="<?= base_url() ?>profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?= base_url() ?>#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li <?php if($url == "Dashboard") { echo "class='active'"; } ?>>
						<a href="<?= base_url('administrator/Dashboard') ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li <?php if($url == "Supplier") { echo "class='active open'"; } ?>>
						<a href="<?= base_url() ?>#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">
								Data user
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?= base_url() ?>typography.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Pelanggan
								</a>

								<b class="arrow"></b>
							</li>
							<li <?php if($url == "Supplier") { echo "class='active'"; } ?>>
								<a href="<?= base_url('administrator/Supplier') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Supplier
								</a>

								<b class="arrow"></b>
							</li>

						</li>
					</ul>

					<li 
						<?php if($url == "Barangbaru") { 
							echo 'class="active open"'; 
						} elseif($url == "Masterbarang"){
						 	echo 'class="active open"';
						 }elseif($url == "Tambahstock"){
						 	echo 'class="active open"';
						 }
						 	 ?> >
						<a href="<?= base_url() ?>#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">Master Data </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if($url == "Masterbarang") { echo 'class="active"'; } ?> >
								<a href="<?= base_url('administrator/Masterbarang') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Master Barang
								</a>

								<b class="arrow"></b>
							</li>

							<li  <?php if($url == "Tambahstock") { echo 'class="active"'; } ?>>
								<a href="<?= base_url("administrator/Tambahstock") ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Stock Barang
								</a>

								<b class="arrow"></b>
							</li>

							<li <?php if($url == "Barangbaru") { echo 'class="active"'; } ?> >
								<a href="<?= base_url('administrator/Barangbaru') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Barang Baru
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					

					<li <?php if($url == "InputTransaksi") { echo "class='active '"; } ?>>
						<a href="<?= base_url('administrator/InputTransaksi') ?>">
							<i class="menu-icon fa fa-dollar"></i>
							<span class="menu-text">Input Transaksi </span>
						</a>

						<b class="arrow"></b>
					</li>
<!-- 
					<li class="">
						<a href="<?= base_url() ?>calendar.html">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Pencarian Barang
								<span class="badge badge-transparent tooltip-error" title="2 Important Events">
								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>
 -->
					<li <?php if($url2 == "Hariini") { echo "class='active '"; } ?>>
						<a href="<?= base_url("administrator/Transaksi/Hariini") ?>">
							<i class="menu-icon fa fa-money"></i>
							<span class="menu-text">Transaksi Hari ini </span>
						</a>

						<b class="arrow"></b>
					</li>


					<li <?php if($url == "Laporan" || $url == "Penjualan") { echo "class='active open'"; } ?>>
						<a href="<?= base_url() ?>#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>

							<span class="menu-text">
								Laporan
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if($url == "Penjualan") { echo "class='active '"; } ?>>
								<a href="<?= base_url('administrator/Penjualan') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Penjualan
								</a>

								<b class="arrow"></b>
							</li>

							<li <?php if($url2 == "stock") { echo "class='active '"; } ?> >
								<a href="<?= base_url("administrator/Laporan/stock") ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Listing Lajur  Stock
								</a>

								<b class="arrow"></b>
							</li>
							<li <?php if($url2 == "stockAkhir") { echo "class='active '"; } ?> >
								<a href="<?= base_url("administrator/Laporan/stockAkhir") ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Stock Akhir
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li >
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?= base_url('administrator/Dashboard') ?>">Dashboard</a>
							</li>

							<li>
								<a href="#">
								<?php if($url == "Barangbaru"){ 
									echo "Master Data";
								}else if($url == "Masterbarang"){
									echo "Master Data";
								}else if($url == "Supplier"){
									echo "Data User";
								}else if($url == "Tambahstock"){
									echo "Master Data";
								}else if($url == "Transaksi"){
									echo "Transaksi";
								}else if($url == "Laporan"){
									echo "Laporan";
								}else if($url == "Penjualan"){
									echo "Laporan";
								} ?>
								</a>
							</li>
							<li class="active">
								<?php if($url == "Barangbaru"){ 
									echo "Tambah Barang Baru";
								}else if($url == "Masterbarang"){
									echo "Master Barang";
								}else if($url == "Supplier"){
									echo "Supplier";
								}else if($url == "Tambahstock"){
									echo "Tambah Stock Barang";
								}else if($url2 == "Hariini"){
									echo "Hari ini";
								}else if($url2 == "stock"){
									echo "Listing Lajur Stock";
								}else if($url2 == "stockAkhir"){
									echo "Report Stock Akhir";
								}else if($url == "Penjualan"){
									echo "Penjualan";
								} ?>
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<?= $contents ?>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder small">
							Aplikasi Penjualan Sparepart &copy; Dasep Depiyawan</span>
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
						<!-- 	<a href="<?= base_url() ?>#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="<?= base_url() ?>#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="<?= base_url() ?>#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a> -->
						</span>
					</div>
				</div>
			</div>

			<a href="<?= base_url() ?>#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?= base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?= base_url() ?>assets/js/ace-elements.min.js"></script>
		<script src="<?= base_url() ?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		
		<!-- dataTables -->
		<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url() ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>

		<!-- datepicker -->
		<script src="<?= base_url() ?>/assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/chosen.jquery.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/spinbox.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/bootstrap-timepicker.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/moment.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/daterangepicker.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/jquery.knob.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/autosize.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/jquery.inputlimiter.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/bootstrap-tag.min.js"></script>



		<script type="text/javascript">
			$(function () {
                $("#dataTables").dataTable();
                $("#dataTables2").dataTable();
                $("#paginationData").dataTable();
            });



			jQuery(function($) {

				//or change it into a date range picker
				$('.input-daterange').datepicker({
					autoclose:true ,
					format : "yyyy-mm-dd"
				});

				$('.input-daterange2').datepicker({
					autoclose:true ,
					format : "yyyy-mm-dd"
				});
				
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				$('.input-daterange').datepicker({autoclose:true});
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>
	
	</body>
</html>
