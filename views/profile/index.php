<?php 
	$row = $profile->index();
?>
<div class="col-md-6">
	  <!-- general form elements -->
	 
	<div class="box box-success">
	    <div class="box-header with-border">
	      <h3 class="box-title">Informacion del perfil</h3>
	      <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <a href="" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-home"></i></a>
            
        </div>
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <?php 
	    	print_r($permits);
	     ?>
	   
	    <form action="<?=URL?>profile/update/" method="post"  id="" onsubmit="updateProfile(this)" autocomplete="off" class="box-body">
	    	<input type="hidden" name="id" value="<?= $row['id']?>">
	      	<div class="box-body">
		        <div class="form-group">
		          <label for="name">Nombre: </label>
		          <input type="text" class="form-control" id="name" name="name" value="<?= $row['name']?>">
		        </div>
		        <div class="form-group">
		          <label for="last_name">Apellidos: </label>
		          <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $row['last_name']?>">
		        </div>
		        <div class="form-group">
		          <label for="phone">Telefono: </label>
		          <input type="number" class="form-control" id="phone" name="phone" value="<?= $row['phone']?>">
		        </div>
		        <div class="form-group">
		          <label for="email">Correo electronico: </label>
		          <input type="email" class="form-control" id="email" name="email" value="<?= $row['email']?>">
		        </div>
	      </div>
	      <!-- /.box-body -->

	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary">Actualizar informacion</button>
	      </div>
	    </form>
	</div>
</div>
          <!-- /.box -->

							

							

