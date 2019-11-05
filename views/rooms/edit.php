<?php 
	$row = $rooms->edit();
  $c_beds = $rooms->beds();
  $c_entertainment = $rooms->entertainment();
  $beds = $rooms->get_beds();
  $entertainments = $rooms->get_entertainment();
  $rooms_spaces = $rooms->get_room_spaces();
  $spaces = $rooms->get_spaces();
  $room_extras = $rooms->get_room_extras();
  $extras = $rooms->get_extras();
?>
<div class="col-md-12" style="background: #f9f9f9;">
  <form action="<?=URL?>rooms/edit/" method="post"  id="addEmploye" autocomplete="off" enctype="multipart/form-data">
  	<div class="box box-danger">
  	  <div class="box-header with-border">
  	    <h3 class="box-title">Editar habitación</h3>
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
						<div class="col-lg-6">
								<label for="name">Nombre:  </label>
								<input type="text" class="form-control" id="name" name="name" required="" value="<?= $row['name']?>" >
						</div>
            <div class="col-lg-3">
                <label for="m2">M2: </label>
                <input type="text" class="form-control" id="m2" name="m2" required="" value="<?= $row['m2']?>" >
            </div>
            <div class="col-lg-3">
                <label for="capacity">Capacidad de personas: </label>
                <input type="capacity" class="form-control" id="capacity" name="capacity" required="" value="<?= $row['capacity']?>" >
            </div>
					</div>
          <div class="clear"></div>
          <div class="row">
            <div class="col-lg-6">
                <label for="price">Precio regular: </label>
                <input type="price" class="form-control" id="price" name="price" required="" value="<?= $row['price']?>" >
            </div>
            <div class="col-lg-6">
                <label for="price_hollidays">Precio TA: </label>
                <input type="price_hollidays" class="form-control" id="price_hollidays" name="price_hollidays" required="" value="<?= $row['price_hollidays']?>" >
            </div>
          </div>
				</div>
  		</div>
    </div>

    <!--Camas y extras-->
    <div class="row"> 
      <div class="col-lg-6"> 
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Camas</h3>
            </div>
           <div class="box-body padd12 bgWhite ">
            <div class="col-lg-6">  
            </div>
            <div class="mainContent">
              <div class="row" style="border-bottom: 1px solid #ccc;">
                <div class="col-lg-5">
                  <b>Cama</b>
                </div>
                <div class="col-lg-5">
                  <b>Cantidad</b>
                </div>
                <div class="col-lg-2">
                  <a href="" class="btn btn-success btn-xs" style="margin: 5px 0px;" onclick="add_row_beds(this);">Nuevo +</a>
                </div>
              </div>
              <div id="row_container_beds">
                <?php foreach ($beds as $bed ) { ?>
                  <div class="row" style="margin-top: 10px;  ">
                    <div class="col-lg-5">
                      <select  class="form-control" name="rooms[id][]" id="id_bed">
                        <?php foreach ($c_beds as $c_bed ) { ?>
                          <option value="<?= $c_bed['id']; ?>" <?= ($c_bed['id'] == $bed['id_bed']) ? 'selected' : null ; ?>>
                            <?= $c_bed['name']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-lg-5">
                      <input type="number" class="form-control" id="quantity" name="rooms[quantity][]" required="" value="<?= $bed['quantity']; ?>" >
                    </div>
                    <div class="col-lg-2">

                      <a href="" class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="delete_row(this)">Eliminar</a>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Extras-->
      <div class="col-lg-6">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Extras</h3>
          </div>
           <div class="box-body padd12 bgWhite ">
            <div class="mainContent">
              <div class="row" style="border-bottom: 1px solid #ccc;">
                <div class="col-lg-10">
                </div>
                <div class="col-lg-2">
                  <a href="" class="btn btn-success btn-xs" style="margin: 5px 0px;" onclick="add_row_extras(this);">Nuevo +</a>
                </div>
              </div>
              <div id="extras_container">
                <?php foreach ($room_extras as $re ) { ?>
                  <div class="row" style="margin-top: 10px;  ">
                    <div class="col-lg-10">
                      <select  class="form-control" name="extras[id][]">
                        <?php foreach ($extras as $extra ) { ?>
                          <option value="<?= $extra['id']; ?>"  <?= ($re['id_extra'] == $extra['id']) ? 'selected' : null ; ?> >
                            <?= $extra['name']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <a href="" class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="delete_row(this)">Eliminar</a>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Entretenimiento y espacios-->
    <div class="row">
      <div class="col-lg-6">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Entretenimiento</h3>
          </div>
           <div class="box-body padd12 bgWhite ">
            <div class="mainContent">
              <div class="row" style="border-bottom: 1px solid #ccc;">
                <div class="col-lg-10">
                </div>
                <div class="col-lg-2">
                  <a href="" class="btn btn-success btn-xs" style="margin: 5px 0px;" onclick="add_row_entertainment(this);">Nuevo +</a>
                </div>
              </div>
              <div id="container_entertainments">
                <?php foreach ($entertainments as $entertainment ) { ?>
                  <div class="row" style="margin-top: 10px;  ">
                    <div class="col-lg-10">
                      <select  class="form-control" name="entertainments[id][]">
                        <?php foreach ($c_entertainment as $ent ) { ?>
                          <option value="<?= $ent['id']; ?>"  <?= ($ent['id'] == $entertainment['id_entertainment']) ? 'selected' : null ; ?> >
                            <?= $ent['name']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <a href="" class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="delete_row(this)">Eliminar</a>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Espacios</h3>
          </div>
           <div class="box-body padd12 bgWhite ">
            <div class="mainContent">
              <div class="row" style="border-bottom: 1px solid #ccc;">
                <div class="col-lg-10">
                </div>
                <div class="col-lg-2">
                  <a href="" class="btn btn-success btn-xs" style="margin: 5px 0px;" onclick="add_row_spaces(this);">Nuevo +</a>
                </div>
              </div>
              <div id="container_spaces">
                <?php foreach ($rooms_spaces as $rs ) { ?>
                  <div class="row" style="margin-top: 10px;  ">
                    <div class="col-lg-10">
                      <select  class="form-control" name="spaces[id][]">
                        <?php foreach ($spaces as $space ) { ?>
                          <option value="<?= $space['id']; ?>" <?= ($space['id'] == $rs['id_space']) ? 'selected' : null ; ?> >
                            <?= $space['name']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <a href="" class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="delete_row(this)">Eliminar</a>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Imagenes-->
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Imagenes</h3>
          </div>
           <div class="box-body padd12 bgWhite ">
            <div class="mainContent">
              <div class="row" style="border-bottom: 1px solid #ccc;">
                <div class="col-lg-10">
                  <input type="file" name="images[]" id="" required="" accept="image/*" multiple="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10">
      </div>
      <div class="col-lg-2">
        <button type="submit" class="btn btn-success  pull-right">Guardar</button>
      </div>
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
  </form>

</div>
          

<script>
  function delete_row(obj) {
    event.preventDefault();
    $(obj).parent("div").parent("div.row").remove();
  }

  function add_row_beds(obj) {
    event.preventDefault();
    var row = '<div class="clear"></div>';
    row += '<div class="row ">';
    row += '<div class="col-lg-5">';
    row += '<select  class="form-control" name="rooms[id][]" id="id_bed">';
    row += '<option value="">Selecciona</option>';
    <?php foreach ($c_beds as $bed) { ?>
    row += '<option value="<?= $bed['id']; ?>"><?= $bed['name']; ?></option>';
    <?php } ?>
    row += '</select></div>';
    row += '<div class="col-lg-5">';
    row += '<input type="number" class="form-control"name="rooms[quantity][]" required="" value="" ></div>';
    row += '<div class="col-lg-2">';
    row += '<a href="" class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="delete_row(this)">Eliminar</a></div></div>';
    $("#row_container_beds").append(row);
  }

  function add_row_extras(obj){
    event.preventDefault();
    var row = '<div class="row" style="margin-top: 10px; ">';
    row += '<div class="col-lg-10">';
    row += ' <select  class="form-control" name="extras[id][]">';
    row += ' <option value="" >Selecciona</option>';
    <?php foreach ($extras as $extra ) { ?>
    row += ' <option value="<?= $extra['id']; ?>" ><?= $extra['name']; ?></option>';
    <?php } ?>
    row += '</select></div>';
    row += '<div class="col-lg-2">';
    row += '<a href="" class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="delete_row(this)">Eliminar</a>';
    row += '</div></div>';
    $("#extras_container").append(row);
  } 

  function add_row_entertainment(obj) {
    event.preventDefault();
    var row = '<div class="row" style="margin-top: 10px; ">';
    row += '<div class="col-lg-10">';
    row += '<select  class="form-control" name="entertainments[id][]">';
    row += '<option value="">Selecciona</option>';
    <?php foreach ($c_entertainment as $ent ) { ?>
    row += '<option value="<?= $ent['id']; ?>"><?= $ent['name']; ?></option>';
    <?php } ?>
    row += '</select></div>';
    row += '<div class="col-lg-2">';
    row += '<a href="" class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="delete_row(this)">Eliminar</a>';
    row += '</div></div>';
    $("#container_entertainments").append(row);
  }

  function add_row_spaces(obj) {
    event.preventDefault();
    var row = '<div class="row" style="margin-top: 10px; ">';
    row += '<div class="col-lg-10">';
    row += '<select  class="form-control" name="spaces[id][]">';
    row += '<option value="">Selecciona</option>';
    <?php foreach ($spaces as $space ) { ?>
    row += '<option value="<?= $space['id']; ?>"><?= $space['name']; ?></option>';
    <?php } ?>
    row += '</select></div>';
    row += '<div class="col-lg-2">';
    row += '<a href="" class="btn btn-danger btn-xs" style="margin-top: 5px;" onclick="delete_row(this)">Eliminar</a>';
    row += '</div></div>';
    $("#container_spaces").append(row);
  }
</script>