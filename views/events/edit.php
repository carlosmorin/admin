<?php 
	$row = $events->edit();
?>
<div class="col-md-6">
	<div class="box box-success">
	  <div class="box-header with-border">
	    <h3 class="box-title">Editar evento</h3>
			<div class="box-tools pull-right">
				<a href="../" class="btn btn-box-tool tool" style="padding-right: 40px;"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
			</div>
  	</div>
		<div class="box-body padd12 bgWhite table-responsive">
	    	<form action="<?=URL?>events/edit/" method="post"  id="addEmploye" autocomplete="off">
				<input type="hidden" name="id" value="<?= $row['id']?>">
				<div class="form-group has-error <?= (isset($_GET['msg'])) ? null : 'hidden'; ?>">
						<label class="control-label" for="inputError"><i class="fas fa-exclamation-circle"></i>
						<?= $_GET['msg']?></label>
				</div>
				<div class="mainContent">
					<div class="row">
						<div class="col-lg-12">
								<label for="name">Titulo:  </label>
								<input type="text" class="form-control" id="title" name="title" required="" value="<?= $row['title']?>" >
						</div>
					</div>
          <div class="clear"></div>
          <div class="row">
            <div class="col-lg-12">
                <label for="name">Fecha:  </label>
                <input type="date" class="form-control" id="date" name="date" required="" value="<?= $row['date']?>" >
            </div>
          </div>
          <div class="clear"></div>
          <div class="row">
            <div class="col-lg-12">
              <label for="short_description">Descripción:  </label>
              <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10" style="height: 100px; min-height: 80px; max-height: auto;"><?= $row['short_description']?></textarea>
            </div>
          </div>  
					
				</div>
        <hr>
        <div class="col-lg-10"></div>
        <div class="col-lg-2">
          <button type="submit" class="btn btn-success  pull-right">Guardar</button>
        </div>
			</form>
		</div>
	</div>
</div>
