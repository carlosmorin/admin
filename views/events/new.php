<div class="col-md-6">
	  <!-- general form elements -->
	<div class="box box-success">
	    <div class="box-header with-border">
	      <h3 class="box-title text-600">Nueva cama</h3>
				<div class="box-tools pull-right">
        <a href="../" class="btn btn-box-tool tool" style="padding-right: 40px;"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
      </div>
	    </div>
			<div class="box-body  padd10 bgWhite table-responsive">
					<form action="<?=URL?>events/create/" method="post" autocomplete="off">
						<div class="form-group has-error <?= (isset($_GET['msg'])) ? null : 'hidden'?>">
								<label class="control-label" for="inputError"><i class="fas fa-exclamation-circle"></i>
								<?= $_GET['msg']?></label>
						</div>
						<div class="mainContent mW600">
							<div class="row">
                <div class="col-lg-12">
                  <label for="name">Titulo:  </label>
                  <input type="text"  placeholder="titulo" class="form-control" id="title" name="title" required="" >
                </div>
              </div>
              <div class="clear"></div>
              <div class="row">
                <div class="col-lg-12">
                  <label for="name">Fecha:  </label>
                  <input type="date" placeholder="Fecha" class="form-control" id="date" name="date" required="" >
                </div>
              </div>
              <div class="clear"></div>
              <div class="row">
                <div class="col-lg-12">
                  <label for="short_description">Descripción:  </label>
                  <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10" style="height: 100px; min-height: 80px; max-height: auto;"></textarea>
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
