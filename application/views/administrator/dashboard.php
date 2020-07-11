<div class="page-header">
	<h1>Selamat Datang </h1>
</div><!-- /.page-header -->

<div class="row">
		<figure class="highcharts-figure">
            <div id="container"></div>
        </figure>	
	</div>
</div>

<script type="text/javascript">
  Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Penjualan  Periode <?= date('Y') ?>'
    },
    subtitle: {
        text: 'Sistem Inventory '
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Barang Terjual'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Jumlah barang terjual : <b>{point.y:f}  </b>'
    },
    series: [{
        name: 'Total item terjual',
        data: [
            ['Januari', <?= $januari->barang_keluar == null ? 0 : $januari->barang_keluar ?>  ],
            ['Februari', <?= $februari->barang_keluar == null ? 0 : $februari->barang_keluar ?>  ],
            ['Maret', <?= $maret->barang_keluar == null ? 0 : $maret->barang_keluar ?>  ],
            ['April', <?= $april->barang_keluar == null ? 0 : $april->barang_keluar ?>  ],
            ['Mei', <?= $mei->barang_keluar == null ? 0 : $mei->barang_keluar ?>  ],
            ['Juni', <?= $juni->barang_keluar == null ? 0 : $juni->barang_keluar ?>  ],
            ['Juli', <?= $juli->barang_keluar == null ? 0 : $juli->barang_keluar ?> ],
            ['Agustus', <?= $agustus->barang_keluar == null ? 0 : $agustus->barang_keluar ?>  ],
            ['September', <?= $september->barang_keluar == null ? 0 : $september->barang_keluar ?>  ],
            ['Oktober', <?= $oktober->barang_keluar == null ? 0 : $oktober->barang_keluar ?>  ],
            ['November', <?= $november->barang_keluar == null ? 0 : $november->barang_keluar ?>  ],
            ['Desember', <?= $desember->barang_keluar == null ? 0 : $desember->barang_keluar ?>  ],
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>

