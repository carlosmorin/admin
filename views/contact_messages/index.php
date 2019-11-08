<?php 
  $data = $contact_messages->index();
 ?>
 <div class="col-md-12">
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title text-600">Mensajes de contacto</h3>
      <div class="box-tools pull-right">
        <a href="../" class="btn btn-box-tool tool"><i class="fas fa-arrow-left"></i><span class="tooltext">Volver</span></a>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body padd10 bgWhite table-responsive">
      <div class="clear"></div>
      <div class="containerTable table-responsive">
        <table id="tableUsers" class="table bgWhite">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">MAIL</th>
              <th scope="col">ASUNTO</th>
            </tr>
          </thead>  
          <tbody>
            <?php while($row = mysqli_fetch_array($data)){?>
              <tr>
                <th > 
                  <a href="show/?id=<?= $row['id']; ?>"><?= $row['id']; ?></a>
                </th>
                <th > 
                  <?= $row['mail']; ?>
                </th>
                <th > 
                  <?= $row['subject']; ?>
                </th>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>