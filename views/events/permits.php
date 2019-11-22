<?php 
	$row = $users->edit();
	$permits = $users->updatePermits();
	$n_permits = mysqli_num_rows($permits);
			
	$modules = array(
		"remisions" => 1,
		"employes" => 2,
		"requisitions" => 3,
		"products" => 4,
		"freghts" => 5,
		"users" => 6,
		"costumers" => 7,
		"trasporters" => 8
	);

 ?>
	
	 <div class="col-md-3">
		<div class="box box-success">

		   
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?=URL_IMG?>profile-avatar.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $row['name']?></h3>

              <p class="text-muted text-center">Sistemas</p>

              <ul class="list-group list-group-unbordered">
                <li class=" list-group-item">
                  <b>Email:</b> <a class="pull-right"><?= $row['email']?></a>
                </li>
                <li class="list-group-item">
                  <b>Telefono: </b> <a class="pull-right"><?= $row['phone']?></a>
                </li>
                
              </ul>

              <a href="<?=URL?>users/edit/?id=<?=$row['id']?>" class="btn btn-primary btn-block"><b>Editar</b></a>
            </div>
         
			
		</div>
		
	</div>

	<div class="col-md-9">
	
		<div class="box box-success">
		    <div class="box-header with-border">
		      	<h3 class="box-title text-600">Permisos de usuario</h3>
				<div class="box-tools pull-right">
					<a href="../" class="btn btn-box-tool tool"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				</div>
		    </div>
			<div class="box-body padd10 bgWhite table-responsive">
			
				
				<div class="clear"></div>
				<label for="master">Usuario master</label>
				<input type="checkbox" name="master" id="master" onclick="userMaster(this);">
				
				<div class="containerTable table-responsive">


					<?php if($n_permits == 0): ?>
					<form action="<?=URL?>/users/addPermits/" method="POST">
						<table id="" class="table bgWhite">
							<thead>
								<tr>
									<th scope="col">MODULO</th>
									<th scope="col">STATUS</th>
									<th scope="col">LEER</th>
									<th scope="col">ESCRIBIR</th>
									<th scope="col">EDITAR</th>
									<th scope="col">ELIMINAR</th>
									
								</tr>
							</thead>	
							<tbody>
																
								<?php foreach ($modules as $module ){

										switch ($module) {
											case '1':
												$template = "Remisiones";
												break;
											case '2':
												$template = "Personal";
												break;
											case '3':
												$template = "Requisiciones";
												break;
											case '4':
												$template = "Productos";
												break;
											case '5':
												$template = "Fletes";
												break;
											case '6':
												$template = "Usuarios";
												break;
											case '7':
												$template = "Clientes";
												break;
											case '8':
												$template = "Trasportistas";
												break;
											
											default:
												# code...
												break;
										}
									?>
									<tr>
										<th>
										  	<?=$template;?>
										  	
										  	<input type="hidden" name="template_<?= $module; ?>" value="<?= $module; ?>">
										  	<input type="hidden" name="id_user_<?= $module; ?>" value="<?= $row['id']?>">
								  		</th>
								  		<th>
								  			<select name="status_<?= $module; ?>" id="status_<?= $module; ?>" onchange="status_permits(this);">
								  				<option value="0"></option>
								  				<option value="1">Permitir</option>
								  				<option value="0">Denegar</option>
								  			</select>
								  		</th>
									  	<th>	
									  		<select name="read_<?= $module; ?>" id="read_<?= $module; ?>" required="" class="permits">
									  			<option value="">SELLECCIONA</option>
									  			<option value="1">Permitir</option>
									  			<option value="0" class="denied">Denegar</option>
									  		</select>
												
									 	</th>
										  <th>	
											
												<select name="write_<?= $module; ?>" id="write_<?= $module; ?>" required="" class="permits">
													<option value="">SELLECCIONA</option>
										  			<option value="1">Permitir</option>
										  			<option value="0" class="denied">Denegar</option>
												</select>
										  </th>
										  <th>	
												<select name="edit_<?= $module; ?>" id="edit_<?= $module; ?>" required="" class="permits">
													<option value="">SELLECCIONA</option>
										  			<option value="1">Permitir</option>
										  			<option value="0" class="denied">Denegar</option>
												</select>
										  </th>
										  <th>	
										  	<select name="delete_<?= $module; ?>" id="delete_<?= $module; ?>" required="" class="permits">
													<option value="">SELLECCIONA</option>
										  			<option value="1">Permitir</option>
										  			<option value="0" class="denied">Denegar</option>
												</select>
										  </th>
									</tr>
								<?php 	} ?>
 							
							</tbody>
						</table>
						<input type="submit" value="Guardar" class="btn btn-primary cBlue right">
					</form>



					<?php else: ?>	
						<form action="<?=URL?>/users/updatePermits/" method="POST">
							<h5 class="text-600">Modifcar permisos</h5>
							<table id="" class="table bgWhite">
								<thead>
									<tr>
										<th scope="col">MODULO</th>
										<th scope="col">STATUS</th>
										<th scope="col">LEER</th>
										<th scope="col">ESCRIBIR</th>
										<th scope="col">EDITAR</th>
										<th scope="col">ELIMINAR</th>
										
									</tr>
								</thead>	
								<tbody>
									<?php

									while ($row = mysqli_fetch_array($permits)) {
										switch ($row['template']) {
											case '1':
												$template = "Remisiones";
												break;
											case '2':
												$template = "Personal";
												break;
											case '3':
												$template = "Requisiciones";
												break;
											case '4':
												$template = "Productos";
												break;
											case '5':
												$template = "Fletes";
												break;
											case '6':
												$template = "Usuarios";
												break;
											case '7':
												$template = "Clientes";
												break;
											case '8':
												$template = "Trasportistas";
												break;
											
											default:
												# code...
												break;
										} ?>
										<tr>
											<th>
											  	<?=$template;?>
											  	
											  	<input type="hidden" name="template_<?=$row['template']?>" value="<?=$row['template']?>">
											  	<input type="hidden" name="id_<?=$row['template']?>" value="<?= $row['id']?>">
									  		</th>
									  		<th>
									  			
									  			<select name="status_<?=$row['template']?>" id="status_<?=$row['template']?>" onchange="status_permits(this);">
									  				<option value="">SELLECCIONA</option>
									  				<option value="1" <?= ($row['status'] == 1) ? 'selected' : null ; ?>>Permitir</option>
									  				<option value="0" <?= ($row['status'] == 0) ? 'selected' : null ; ?>  class="denied">Denegar</option>
									  			</select>
									  		</th>
										  	<th>	
										  		<select name="read_<?=$row['template']?>" id="read_<?=$row['template']?>" required="" class="permits">
										  			<option value="">SELLECCIONA</option>
									  				<option value="1" <?= ($row['leer'] == 1) ? 'selected' : null ; ?>>Permitir</option>
									  				<option value="0" <?= ($row['leer'] == 0) ? 'selected' : null ; ?>  class="denied">Denegar</option>
										  		</select>
													
										 	</th>
											  <th>	
												
													<select name="write_<?=$row['template']?>" id="write_<?=$row['template']?>" required="" class="permits">
											  			<option value="">SELLECCIONA</option>
										  				<option value="1" <?= ($row['escribir'] == 1) ? 'selected' : null ; ?>>Permitir</option>
										  				<option value="0" <?= ($row['escribir'] == 1) ? null :  'selected' ; ?>  class="denied">Denegar</option>

													</select>
											  </th>
											  <th>	
													<select name="edit_<?=$row['template']?>" id="edit_<?=$row['template']?>" required="" class="permits">
											  			<option value="">SELLECCIONA</option>
										  				<option value="1" <?= ($row['editar'] == 1) ? 'selected' : null ; ?>>Permitir</option>
										  				<option value="0" <?= ($row['editar'] == 1) ? null :  'selected' ; ?>  class="denied">Denegar</option>
													</select>
											  </th>
											  <th>	
											  	<select name="delete_<?=$row['template']?>" id="delete_<?=$row['template']?>" required="" class="permits">
										  			<option value="">SELLECCIONA</option>
									  				<option value="1" <?= ($row['eliminar'] == 1) ? 'selected' : null ; ?>>Permitir</option>
									  				<option value="0" <?= ($row['eliminar'] == 0) ?  'selected' : null ; ?> class="denied" >Denegar</option>
												</select>
											  </th>
										</tr>
									<?php } ?>					
				
							
	 							
								</tbody>
							</table>
							<input type="submit" value="Guardar" class="btn btn-primary cBlue right">
						</form>
					<?php endif ?>	
				</div>
			</div>
			<div class="box-footer">
				<footer class="main-footer text-center">
					<strong class="">Copyright © 2018-2018 <a href="#">Agricola Las Albardas</a>.</strong> Todos los derechos reservados.
				</footer>
			</div>
		</div>
	</div>
