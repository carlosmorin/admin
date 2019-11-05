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
					<form action="<?=URL?>users/new/" method="post" autocomplete="off">
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
									<div class="clear"></div>
									<div class="row">
									     <div class="col-lg-12">
													<label for="rfc">Apellidos: </label>
												<input type="text"  placeholder="Apellidos" class="form-control" id="last_name" name="last_name" required="">
											 </div>
									</div>
									<div class="clear"></div>
									<div class="row">
									     <div class="col-lg-12">
													<label for="mail">Correo: </label>
												<input type="mail"  placeholder="Correo" class="form-control" id="mail" name="mail" required="">
											 </div>
									</div>
									<div class="clear"></div>
									<div class="row">
									     <div class="col-lg-12">
													<label for="password">Contraseña : </label>
													<input type="password"  placeholder="Contraseña" class="form-control" id="password" name="password" required="">
											 </div>
									</div>
									<div class="clear"></div>
									<div class="row">
							      <div class="col-lg-12">
											<label for="r_pass">Confirma contraseña: </label>
											<input type="password" placeholder="Confirmar contraseña"  class="form-control" id="r_pass" name="r_pass" required="" onkeyup="">
											<label class=" s12 text-normal cRed hidden incorrect">Las contraseñas no coinciden</label>
											<label class=" s12 text-normal cGreen hidden correct">Las contraseñas son correctas</label>
								
											<input type="text" class="hidden" name="validate" id="validate" required="" value="1">
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
