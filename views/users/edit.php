<?php 
	$row = $users->edit();
?>
<div class="col-md-6">
	<div class="box box-success">
	  <div class="box-header with-border">
	    <h3 class="box-title">Editar usuario</h3>
			<div class="box-tools pull-right">
				<a href="../" class="btn btn-box-tool tool" style="padding-right: 40px;"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
			</div>
  	</div>
		<div class="box-body padd12 bgWhite table-responsive">
	    	<form action="<?=URL?>users/edit/" method="post"  id="addEmploye" autocomplete="off">
				<input type="hidden" name="id" value="<?= $row['id']?>">
				<div class="form-group has-error <?= (isset($_GET['msg'])) ? null : 'hidden'; ?>">
						<label class="control-label" for="inputError"><i class="fas fa-exclamation-circle"></i>
						<?= $_GET['msg']?></label>
				</div>
				<div class="mainContent">
					<div class="row">
						<div class="col-lg-12">
								<label for="name">Nombre:  </label>
								<input type="text" class="form-control" id="name" name="name" required="" value="<?= $row['name']?>" >
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="col-lg-12">
								<label for="last_name">Apellidos: </label>
								<input type="text" class="form-control" id="last_name" name="last_name" required="" value="<?= $row['last_name']?>" >
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="col-lg-12">
								<label for="mail">Correo: </label>
								<input type="mail" class="form-control" id="mail" name="mail" required="" value="<?= $row['mail']?>" >
						</div>
					</div>
				</div>
        <hr>
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
          <button type="submit" class="btn btn-success  pull-right">Guardar</button>
        </div>
			</form>
		</div>
	</div>
</div>
