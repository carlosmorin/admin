<?php 
  $data = $rooms->show();
 ?>
<div class="col-md-12">
  <div class="box box-success" data-widget="box-widget">
    <div class="box-header">
      <h3 class="box-title">Detalle</h3>
    </div>
    <div class="box-body">
      <h4>Titulo: <?= $data['name'] ?> </h4> 
      <span>M2: <?= $data['m2'] ?></span> <br>  
      <span>Capacidad: <?= $data['capacity'] ?></span> <br>
      <span>Precio: $<?= $data['price'] ?></span> <br>
      <span>Precio TA: $<?= $data['price_hollidays'] ?></span>
    </div>
    <div class="box-footer">
        <a href="/admin/rooms/edit/?id=<?= $data['id']; ?>">Editar</a>
    </div>
  </div>
</div>