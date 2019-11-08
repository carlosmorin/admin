<div class="col-md-6">
	  <!-- general form elements -->
	<div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title text-600">Nuevo usuario</h3>
			<div class="box-tools pull-right">
        <a href="../" class="btn btn-box-tool tool" style="padding-right: 40px;"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
      </div>
	  </div>
		<div class="box-body  padd10 bgWhite table-responsive">
			<form action="<?=URL?>extras/create/" method="post" autocomplete="off">
				<div class="form-group has-error <?= (isset($_GET['msg'])) ? null : 'hidden'?>">
					<label class="control-label" for="inputError"><i class="fas fa-exclamation-circle"></i>
					<?= $_GET['msg']?></label>
				</div>
				<div class="mainContent mW600">
					<div class="row">
				   <div class="col-lg-12">
							<label for="name">Nombre:  </label>
							<input type="text"  placeholder="Nombre" class="form-control" id="name" name="name" required="" >
						</div>
					</div>
				</div>
				<hr>
        <div class="col-lg-10">
        </div>
        <div class="col-lg-2">
          <button type="submit" class="btn btn-success  pull-right">Guardar</button>
        </div>
			</form>
		</div>
	</div>
</div>
