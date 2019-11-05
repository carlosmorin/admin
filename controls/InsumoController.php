<?php 

require '../config/conn.php';

date_default_timezone_set('America/Monterrey');
$fecha = date('Y-m-d');
$data = array();
switch ($_GET['op']) {
    case 'index':
        $sql = "SELECT s.id as id_insumo,s.nombre as insumo, s.precio,s.divisa,s.descripcion,s.ingredientes,s.factor,
        s.marca,s.dh,s.fecha, c.name as grupo, c.id as id_grupo, ms.nombre as unidad_compra, msu.nombre as medida_uso 
        FROM `supplies` as s INNER JOIN categories as c ON s.grupo_id=c.id INNER JOIN measurements_system as ms 
        ON s.unidad_id = ms.id INNER JOIN measurements_system as msu ON s.uso_id=msu.id";
        $rspta = $con->prepare($sql);
        $rspta->execute();
        while ($reg = $rspta->fetch(PDO::FETCH_OBJ)) {
            $ingredientes = json_decode($reg->ingredientes,true);
            $activos ='';
            foreach ($ingredientes as $ingrediente) {
                $activos .= '<label class="label label-success">'.$ingrediente.'</label> ';
            }
            $data[]=array(
                "0"=>"n-".$reg->id_insumo,
                "1"=>$reg->insumo,
                "2"=>$reg->grupo,
                "3"=>$activos,
                "4"=>$reg->precio,
                "5"=>$reg->unidad_compra,
                "6"=>$reg->medida_uso,
                "7"=>$reg->marca,
                "8"=> $reg->dh, 
                "9"=>'<buton type="button" class="btn btn-xs btn-warning" onclick="abrirModal('.$reg->id_insumo.')"><i class="fas fa-edit"></i></buton>
                    <buton type="button" class="btn btn-xs btn-danger" onclick="delInsumo('.$reg->id_insumo.')"><i class="fas fa-trash"></i></buton>
                '
            );
        }
        $results = array(
            "sEcho"=>1, 
            "iTotalRecords"=>count($data), 
            "iTotalDisplayRecords"=>count($data), 
            "aaData"=>$data
        );
        echo json_encode($results);    
    break;
    case 'clave':
        $sql = "SELECT MAX(id) as id FROM supplies";
        $result = $con->prepare($sql);
        $result->execute();
        $filas = $result->rowCount();
        if ($filas>0) {
            $clv = $result->fetch(PDO::FETCH_OBJ);
            $id = $clv->id;
            $clave = $id+1;
            $response = [
                'exito' => true,
                'clave' => 'n-'.$clave
            ];
        }else{
            $response = [
                'exito' => true,
                'clave' => 'n-1'
            ];
        }
        echo json_encode($response);
    break;
    case 'new':
        // var_dump($_POST['ingrediente']);
        // die();
        $insumo=$_POST['insumo'];
        $medidad_id=$_POST['medida_id'];
        $precio = $_POST['precio'];
        $divisa = $_POST['divisa'];
        $grupo = $_POST['grupo_id'];
        $descripcion = $_POST['descripcion'];
        $ingrediente = json_encode($_POST['ingrediente']);
        $proveedor_id = $_POST['proveedor_id'];
        $factor = $_POST['factor'];
        $medidad_uso = $_POST['medida_uso'];
        $marca = $_POST['marca'];
        $dh = $_POST['dh'];
        $sql = "INSERT INTO `supplies`(`grupo_id`, `unidad_id`, `nombre`, `precio`, `divisa`, 
                `descripcion`, `ingredientes`, `factor`, `uso_id`, `marca`, `dh`, `fecha`) VALUES 
            ('$grupo','$medidad_id','$insumo','$precio','$divisa','$descripcion','$ingrediente','$factor',
            '$medidad_uso','$marca','$dh','$fecha')";
        $result = $con->prepare($sql);
        $result->execute();
        if ($result) {
            $response = [
                'exito' => true,
                'msg' => 'Insumo agregado con exito.'
            ];
        }else{
            $response = [
                'exito' => true,
                'msg' => 'No se logro añadir el insumo intenta de nuevo.'
            ];
        }
        echo json_encode($response);
    break;

    case 'edit':
        $id = $_GET['id'];
        $sql = "SELECT s.id as id_insumo,s.nombre as insumo, s.precio,s.divisa,s.descripcion,s.ingredientes,s.factor,
            s.marca,s.dh,s.fecha, c.name as grupo, c.id as id_grupo, ms.id as id_unidad_compra, ms.nombre as unidad_compra, msu.id as id_medida_uso, msu.nombre as medida_uso 
            FROM `supplies` as s INNER JOIN categories as c ON s.grupo_id=c.id INNER JOIN measurements_system as ms 
            ON s.unidad_id = ms.id INNER JOIN measurements_system as msu ON s.uso_id=msu.id WHERE s.id = '$id' ";
        $result = $con->prepare($sql);
        $result->execute();
        if ($result) {
            $datos = $result->fetch(PDO::FETCH_OBJ);
            $activos = '';
            $ingredientes = json_decode($datos->ingredientes,true);
            $num_activos = count($ingredientes);
            foreach ($ingredientes as $ingrediente) {
                $activos .= '\''.$ingrediente.'\',';
            }
            $activos = substr($activos,0,-1);
            $response=[
                'exito' => true,
                'insumo' => $datos->insumo,
                'unidad_compra' => $datos->id_unidad_compra,
                'precio' => $datos->precio,
                'divisa' => $datos->divisa,
                'descripcion' => $datos->descripcion,
                'unidad_compra' => $datos->id_unidad_compra,
                'num_activos' => $num_activos,
                'ingredientes' => $activos,
                'factor' => $datos->factor,
                'marca' => $datos->marca,
                'dh' => $datos->dh,
                'medida_uso' => $datos->id_medida_uso,
            ];
        }else{
            $response=[
                'exito' => false,
                'msg' => 'Intenta de nuevo',
            ];
        }
        echo json_encode($response);
    break;

    case 'update':
        $id = $_POST['id'];
        $insumo=$_POST['insumo'];
        $medidad_id=$_POST['medida_id'];
        $precio = $_POST['precio'];
        $divisa = $_POST['divisa'];
        $grupo = $_POST['grupo_id'];
        $descripcion = $_POST['descripcion'];
        $ingrediente = json_encode($_POST['ingrediente']);
        $proveedor_id = $_POST['proveedor_id'];
        $factor = $_POST['factor'];
        $medidad_uso = $_POST['medida_uso'];
        $marca = $_POST['marca'];
        $dh = $_POST['dh'];
        $sql = "UPDATE `supplies` SET `grupo_id`='$grupo',`unidad_id`='$medidad_id',`nombre`='$insumo',
            `precio`='$precio',`divisa`='$divisa',`descripcion`='$descripcion',`ingredientes`='$ingrediente',
            `factor`='$factor',`uso_id`='$medidad_uso',`marca`='$marca',`dh`='$dh' WHERE id = '$id' ";
        $result = $con->prepare($sql);
        $result->execute();
        if ($result) {
            $response = [
                'exito' => true,
                'msg' => 'Insumo actualizado con exito.'
            ];
        }else{
            $response = [
                'exito' => true,
                'msg' => 'No se logro actualizar el insumo intenta de nuevo.'
            ];
        }
        echo json_encode($response);
    break;

    case 'delete':
        $id =$_POST['id'];
        $sql = "DELETE FROM supplies WHERE id = '$id' ";
        $result = $con->prepare($sql);
        $result->execute(); 
        if ($result) {
            $response = [
                'exito' => true,
                'msg' => 'Insumo eliminado con exito.'
            ];
        }else{
            $response = [
                'exito' => true,
                'msg' => 'No se logro eliminar el insumo intenta de nuevo.'
            ];
        }
        echo json_encode($response);
    break;

    case 'sl_measurements':
        $sql = "SELECT * FROM measurements_system";
        $result = $con->prepare($sql);
        $result->execute();
        while ($f = $result->fetch(PDO::FETCH_OBJ)) {
            echo "<option value='".$f->id."'>".$f->nombre."</option>";
        }
    break;

    case 'sl_categorias':
        $sql = "SELECT * FROM categories";
        $result = $con->prepare($sql);
        $result->execute();
        while ($f = $result->fetch(PDO::FETCH_OBJ)) {
            echo "<option value='".$f->id."'>".$f->name."</option>";
        }
    break;

    case 'sl_ingredientes':
        $sql = "SELECT * FROM ingredients";
        $result = $con->prepare($sql);
        $result->execute();
        while ($f = $result->fetch(PDO::FETCH_OBJ)) {
            echo "<option data-content=\"<span class='badge badge-danger'>".$f->nombre."</span>\">".$f->nombre."</option>";
        }
    break;  
}
?>