<?php 
	$data = $beds->index();
 ?>

 <div class="col-md-12">
	<div class="box box-success">
	    <div class="box-header with-border">
	      	<h3 class="box-title text-600">Camas</h3>
			<div class="box-tools pull-right">
				<a href="../" class="btn btn-box-tool tool"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			</div>
	    </div>
		<div class="box-body padd10 bgWhite table-responsive">
			<div class="row">
				<div class="col-lg-2">
						<a href="new/" class="btn btn-primary sblue">
							Nuevo <span class="icon-add s16"></span>
						</a>	
				</div>
			</div>
			<div class="clear"></div>
			<div class="containerTable table-responsive">
				<table id="tableUsers" class="table bgWhite">
					<thead>
						<tr>
							<th scope="col">NOMBRE</th>
							<th scope="col">ACCIONES</th>
						</tr>
					</thead>	
					<tbody>
						<?php while($row = mysqli_fetch_array($data)){?>
							<tr>
								  <th >	
									  <?= $row['name']; ?>
								  </th>
								  <th >
									  <a href="delete/?id=<?= $row['id'];?>" onclick="erase(this);" class="tool">
										   <i class="btn btn-danger btn-xs s16 btn_padd"><span class="icon-trash"></span></i>
										  <span class="tooltext">Eliminar</span>
										   
									  </a>
									  <a href="edit/?id=<?= $row['id'];?>" onclick=""  class="tool">
										  <i class="btn btn-warning btn-xs s16 btn_padd"><span class="icon-pencil"></span></i>
										   <span class="tooltext">Editar </span>
									  </a>
								  </th>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>