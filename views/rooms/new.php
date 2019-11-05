<div class="col-md-6">
	  <!-- general form elements -->
	<div class="box box-success">
	    <div class="box-header with-border">
	      <h3 class="box-title text-600">Nueva habitación</h3>
				<div class="box-tools pull-right">
        <a href="../" class="btn btn-box-tool tool" style="padding-right: 40px;"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
      </div>
	    </div>
			<div class="box-body  padd10 bgWhite table-responsive">
					<form action="<?=URL?>rooms/create/" method="post"  autocomplete="off">
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
							     <div class="col-lg-6">
											<label for="m2">m2: </label>
										<input type="number"  placeholder="Metros cuadrados" class="form-control" id="m2" name="m2" required="">
									 </div>
                   <div class="col-lg-6">
                          <label for="capacity">Capacidad de personas: </label>
                        <input type="number"  placeholder="Capcidad de personas" class="form-control" id="capacity" name="capacity" required="">
                    </div>
									</div>
									<div class="clear"></div>
									<div class="row">
									     <div class="col-lg-12">
													<label for="price">Precio: </label>
												<input type="number"  placeholder="Precio Normal" class="form-control" id="price" name="price" required="">
											 </div>
									</div>
									<div class="clear"></div>
									<div class="row">
									     <div class="col-lg-12">
													<label for="price_hollidays">Precio TA : </label>
													<input type="number"  placeholder="Precio Temporada Alta" class="form-control" id="price_hollidays" name="price_hollidays" required="">
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
