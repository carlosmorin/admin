<?php  ?>
<style>
	.highcharts-credits{
		display:none;
	}		
	#graph_costumers{
		margin-left:-100px;
	}
	@media screen and (max-width: 768px) {
		#graph_costumers{
			margin-left:-10px;
		}
	}
</style>
<?php 

	$cone = new PDO('mysql:host=localhost; dbname=albardas; ', 'root', '');

	$sql = "SELECT *, (SELECT SUM(embark) FROM costumers WHERE embark>0) as suma_embarques FROM costumers WHERE embark>0";
	$result = $cone->prepare($sql);
	$result->execute();

	$clientes = '';
	$embarques = '';
	while ($f = $result->fetch(PDO::FETCH_OBJ)) {
		$clientes = $clientes . '\''. $f->name . '\',';
		$embarques = $embarques . $f->embark . ',';
	}
	$clientes = substr($clientes, 0 , -1);
	$embarques = substr($embarques, 0 , -1);

	$sql2 = "SELECT SUM(embark) as suma_embarques, 
					(SELECT SUM(total) FROM freights WHERE total >0 ) as monto_total
					  FROM costumers WHERE embark>0";
	$result2 = $cone->prepare($sql2);
	$result2->execute();
	$t = $result2->fetch(PDO::FETCH_OBJ);

	$sql3 = "SELECT * FROM costumers";
	$result3 = $cone->prepare($sql3);
	$result3->execute();
	$num_clientes = $result3->rowCount();

	$sql4 = "SELECT * FROM products";
	$result4 = $cone->prepare($sql4);
	$result4->execute();
	$num_productos = $result4->rowCount();
	// var_dump($clientes);
?>
<div class="col-md-12">
	<h3 class="box-title text-600">DASHBOARD</h3>
	<div class="row">
		<div class="col-lg-3 col-xs-6">
		
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?= $t->suma_embarques; ?></h3>

					<p>Embarques</p>
				</div>
				<div class="icon">
					<span class="icon-truck"></span>
				</div>					
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>$<?=number_format($t->monto_total,0,',',',') ?></h3>

					<p>Egresos de Fletes</p>
				</div>
				<div class="icon">
					<span class="icon-banknote"></span>		
				</div>					
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?=$num_clientes?></h3>

					<p>Clientes</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>					
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3><?=$num_productos?></h3>
					<p>Productos</p>
				</div>
				<div class="icon">
				<span  class="icon-price-tag"></span>
				</div>					
			</div>
		</div>
		<!-- ./col -->

	</div>
	<div class="box box-success">
	    <div class="box-header with-border">
	      <h3 class="box-title text-600">EMBARQUES POR CLIENTE</h3>
	      <div class="box-tools pull-right">
	      	                
	            <a href="../" class="btn btn-box-tool tool"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	            </button>

	       </div>
	    </div>
		<div class="box-body padd10 bgWhite table-responsive">
			<div id="graph_costumers" style="min-width: 100%; height: auto;" >
			</div>
		
		</div>
	
	</div>
</div>





				
				
		

  

  <script src="<?= URL ?>/VIEWS/resources/JS/high-charts/highcharts.js"></script>
	<script src="<?= URL ?>/VIEWS/resources/JS/high-charts/highcharts-3d.js"></script>  
	<script src="<?= URL ?>/VIEWS/resources/JS/high-charts/exporting.js"></script>
	<script type="text/javascript">
		Highcharts.setOptions({
			colors: ['#FF9800','#50B432', '#E22622', '#777777','#058DC7', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
		});
		Highcharts.chart('graph_costumers', {
		chart: {
			type: 'bar',
			options3d: {
				enabled: true,
				alpha: 5,
				beta: 25,
				depth: 80,
				viewDistance: 85
			}
		},
		title: {
			text: 'Estadisticas'
		},
		subtitle: {
			// text: 'Source: WorldClimate.com'
		},
		xAxis: {
      categories: [<?= $clientes ?>  ],
			labels: {
				skew3d: true,
				style: {
					fontSize: '16px'
				}
			},
			crosshair: true
		},
		yAxis: {
			allowDecimals: false,
			min: 0,
			title: {
				text: ''
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
			footerFormat: '</table>',
			useHTML: true
		},
		plotOptions: {
			column: {
				depth: 25,
				pointPadding: 0.2,
				borderWidth: 0,
				dataLabels: {
					enabled: true
				}
			}
		},
		series: [{
			name: ['Cantidad'],
			data: [<?= $embarques ?>]
		}]
		});
	</script>



