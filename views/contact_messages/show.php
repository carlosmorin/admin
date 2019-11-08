<?php 
	$row = $contact_messages->show();
?>
<div class="col-md-6">
	<div class="box box-success">
	  <div class="box-header with-border">
	    <h3 class="box-title">Mensaje de contacto</h3>
			<div class="box-tools pull-right">
				<a href="../" class="btn btn-box-tool tool" style="padding-right: 40px;"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
			</div>
  	</div>
		<div class="box-body padd12 bgWhite table-responsive">
				<input type="hidden" name="id" value="<?= $row['id']?>">
				<div class="form-group has-error <?= (isset($_GET['msg'])) ? null : 'hidden'; ?>">
						<label class="control-label" for="inputError"><i class="fas fa-exclamation-circle"></i>
						<?= $_GET['msg']?></label>
				</div>
				<div class="mainContent">
					<div class="row">
						<div class="col-lg-12">
							<label for="name">Nombre:  </label>
							<span class="text-light"><?= $row['name'] ?></span>
						</div>
            <div class="col-lg-12">
              <label for="name">Correo:  </label>
              <span class="text-light"><?= $row['mail'] ?></span>
            </div>
            <div class="col-lg-12">
              <label for="name">ASUNTO:  </label>
              <span class="text-light"><?= $row['subject'] ?></span>
            </div>
            <div class="col-lg-12">
              <label for="name">MENSAJE:  </label>
              <span class="text-light"><?= $row['body'] ?></span>
            </div>
            <div class="col-lg-12">
              <label for="name">FECHA:  </label>
              <span class="text-light"><?= $row['created_at'] ?></span>
            </div>

					</div>
        </div>
        <hr>
        
		</div>
	</div>
</div>
