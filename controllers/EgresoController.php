<?php
session_start();
$id_usuario = $_SESSION['session_datapagos']['id'];
require_once '../models/ModelEgreso.php';
require_once '../config/helpers/validate.php';
require_once '../config/helpers/files/obtenerExtension.php';
$objEgreso = new Egreso();

switch ($_REQUEST['opcion']) {
    case 'listarEgresos':
        $data = $objEgreso->listarEgresos();
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "tercero" => strtoupper($value['empresa']),
                    "monto" => "$".$value['monto'],
                    "categoria" => $value['categoria'],
                    "nombre" => $value['nombre'],
                    "descripcion" => strtoupper($value['descripcion']),
                    "fechaRegistro" => $value['fechaRegistro'],
                    "acciones" => (!empty($value["anexo"])? 
                        "<td>
                            <button type='button' class='btn text-white btn-printer btn-sm'><i class='uil uil-print'></i></button>
                            <button type='button' class='btn text-white btn-ver btn-sm' data-toggle='modal' data-target='#modalAnexoEgreso' onclick=cargarAnexo({$value['id']})><i class='uil uil-image'></i></button>
                            <button type='button' class='btn text-white btn-edit btn-sm' data-toggle='modal' data-target='#editarEgreso' onclick=editarEgreso({$value['id']})><i class='uil uil-edit'></i></button>
                            <button type='button' class='btn text-white btn-delete btn-sm' onclick=eliminarEgreso({$value['id']})><i class='uil uil-trash-alt'></i></button>
                        </td>"
                        :
                        "<td>
                            <button type='button' class='btn text-white btn-printer btn-sm'><i class='uil uil-print'></i></button>
                            <button type='button' class='btn text-white btn-upload btn-sm' data-toggle='modal' data-target='#modalAgregarAnexo' onclick='cargarIdAnexo({$value['id']})'><i class='uil uil-image-plus'></i></button>
                            <button type='button' class='btn text-white btn-edit btn-sm' data-toggle='modal' data-target='#editarEgreso' onclick=editarEgreso({$value['id']})><i class='uil uil-edit'></i></button>
                            <button type='button' class='btn text-white btn-delete btn-sm' onclick=eliminarEgreso({$value['id']})><i class='uil uil-trash-alt'></i></button>
                        </td>"
                    )
                ];
            }
        }

        $results = [
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list
        ];
        echo json_encode($results);
        break;

    case 'listarTercero':
        $data = $objEgreso->cargarTercero();
        echo json_encode($data);
        break;

    case 'listarMedioPago':
        $data = $objEgreso->cargarMedioPago();
        echo json_encode($data);
        break;
    
    case 'listarCategoria':
        $data = $objEgreso->cargarCategoria();
        echo json_encode($data);
        break;
    break;

    case 'registroEgreso':
        $errores = [];
        $terceroID = isset($_POST['terceroEgreso']) ? $_POST['terceroEgreso'] : null;
        $nombreTercero = $_POST['nombreTercero'];
        $monto = isset($_POST['monto']) ? $_POST['monto'] : null;
        $medioPago = isset($_POST['medioPagoEgreso']) ? $_POST['medioPagoEgreso'] : null;
        $categoria = isset($_POST['categoria_egreso']) ? $_POST['categoria_egreso'] : null;
        $descripcion = isset($_POST['descripcionEgreso']) ? rip_tags($_POST['descripcionEgreso']) : null;
        $formatos_permitidos = ['pdf', 'jpg', 'png', 'jpeg', 'PNG'];
        $response = '';
        
        if (!validarEntero($terceroID) && !is_numeric($terceroID)) {
            $errores[] = 'El campo <strong>Tercero</strong> es incorrecto.';
        }
        if (!validarEntero($monto) && !is_numeric($monto)) {
            $errores[] = 'El campo <strong>Monto</strong> es incorrecto.';
        }
        if (!validarEntero($medioPago) && !is_numeric($medioPago)) {
            $errores[] = 'El campo <strong>Medio de pago</strong> es incorrecto.';
        }
        if (!validarEntero($categoria) && !is_numeric($categoria)) {
            $errores[] = 'El campo <strong>Categoria</strong> es incorrecto.';
        }
        if (!validaRequerido($descripcion)) {
            $errores[] = 'Campo <strong>Descripcion</strong> obligatorio';
        }

        if (count($errores) > 0) {
            foreach ($errores as $value) {
                echo "<div class='alert alert-danger alert-dismissible fade show pt-2 pb-2' role='alert'>
                        <strong>Error:</strong> {$value}.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            }
        }

        if($_FILES['anexoEgreso']['size'] > 0 && $_FILES['anexoEgreso']['error'] == UPLOAD_ERR_OK){
            $extension = obtenerExtensionArchivo($_FILES['anexoEgreso']['name']);
            if (in_array($extension, $formatos_permitidos)) {
                $nombreArchivo = nombreArchivo($extension);
                $carpetaTercero = '../archivos/egresos/' . str_replace(' ', '_', $nombreTercero);
                if (!file_exists($carpetaTercero)) {
                    mkdir($carpetaTercero, 0777, true);
                }
                $archivoTemporal = $_FILES['anexoEgreso']['tmp_name'];
                $rutaFinal = $carpetaTercero . "/" . $nombreArchivo;
                
                $datos = [
                    'monto' => $monto,
                    'descripcion' => $descripcion,
                    'terceroiId' => $terceroID,
                    'usuarioId' => $id_usuario,
                    'categoriaId' => $categoria,
                    'medioPagoId' => $medioPago,
                    'anexo' => $rutaFinal
                ];
                if (move_uploaded_file($archivoTemporal, $rutaFinal)){
                    if ($objEgreso->registrarEgreso($datos)){
                        $response = "Egreso registrado con exito";
                    }
                }
            }else{
                $response = "Formato no admitido";
                echo $extension;
            }
        }else{      
            $datos2 = [
                'monto' => $monto,
                'descripcion' => $descripcion,
                'terceroiId' => $terceroID,
                'usuarioId' => $id_usuario,
                'categoriaId' => $categoria,
                'medioPagoId' => $medioPago
            ];
            if ($objEgreso->registrarEgreso($datos2)) {
                $response = "Egreso registrado con exito";
            }
        }
        echo $response;
        break;

    case 'editarEgreso':
        $data = $objEgreso->editarPago($_POST['id']);
        echo json_encode($data);
        break;

    case 'actualizarEgreso':
        $errores = [];
        $registroID = isset($_POST['egresoUpdateID']) ? $_POST['egresoUpdateID'] : null;
        $terceroID = isset($_POST['terceroEgresoEdit']) ? $_POST['terceroEgresoEdit'] : null;
        $monto = isset($_POST['montoU']) ? $_POST['montoU'] : null;
        $medioPago = isset($_POST['medioPagoEgresoU']) ? $_POST['medioPagoEgresoU'] : null;
        $descripcion = isset($_POST['descripcionIngresoU']) ? rip_tags($_POST['descripcionIngresoU']) : null;

        if (!validarEntero($terceroID) && !is_numeric($terceroID)) {
            $errores[] = 'El campo <strong>Tercero</strong> es incorrecto.';
        }
        if (!validarEntero($monto) && !is_numeric($monto)) {
            $errores[] = 'El campo <strong>Monto</strong> es incorrecto.';
        }
        if (!validarEntero($medioPago) && !is_numeric($medioPago)) {
            $errores[] = 'El campo <strong>Medio de pago</strong> es incorrecto.';
        }
        if (!validaRequerido($descripcion)) {
            $errores[] = 'Campo <strong>Descripcion</strong> obligatorio';
        }

        if (count($errores) > 0) {
            foreach ($errores as $value) {
                echo
                "<div class='alert alert-danger alert-dismissible fade show ' width:100% role='alert'>
                    <strong>Error:</strong> {$value}
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
            }
        } else {
            $datos = [
                'monto' => intval($monto),
                'descripcion' => $descripcion,
                'terceroID' => $terceroID,
                'medioPagoID' => $medioPago,
                'registroID' => $registroID
            ];
            if ($objEgreso->actualizarEgreso($datos)) {
                $response = "Egreso actualizado con exito";
            }
        }
        echo $response;
    break;

    case 'cargarAnexo':
       $data = $objEgreso->cargarAnexo($_POST['id']);
       echo json_encode($data);
    break;

    case 'cambiarAnexo':
        $idRegistro = $_POST['codigoAnexo'];
        $dataAnexo = $objEgreso->cargarAnexo($idRegistro);
        $ruta = explode('/', $dataAnexo['anexo']);
        $dir = array_pop($ruta);
        unset($dir); 
        $rutaNueva = implode('/', $ruta);
        $formatos_permitidos = ['pdf', 'jpg', 'png', 'jpeg'];
        if($_FILES['anexoNuevo']['size'] > 0 && $_FILES['anexoNuevo']['error'] == UPLOAD_ERR_OK){
            $extension = pathinfo($_FILES['anexoNuevo']['name'], PATHINFO_EXTENSION);
            if(in_array($extension, $formatos_permitidos)){
                $nombreArchivo = uniqid() . '.' . $extension;
                $path = $rutaNueva."/".$nombreArchivo;
                if(unlink($dataAnexo['anexo'])){
                    if (move_uploaded_file($_FILES['anexoNuevo']['tmp_name'], $path)){
                        $datos = [
                            'idRegistro' => $idRegistro,
                            'anexo' => $path
                        ];
                        if ($objEgreso->actualizarAnexo($datos)){
                            $response = "Anexo modificado con exito";
                        }
                    }
                }
            }else {
                $response = "Formato invalido";
            }
        }
        echo $response;
    break;

    case 'actualizarAnexo':
        $idRegistro = $_POST['codigoAnexoEgreso'];
        $dataAnexo = $objEgreso->cargarAnexo($idRegistro);
        $ruta = explode(' ', $dataAnexo['empresa']);
        $rutaNueva = implode('_', $ruta);
        $formatos_permitidos = ['pdf', 'jpg', 'png', 'jpeg', 'PNG'];
        if($_FILES['anexo']['size'] > 0 && $_FILES['anexo']['error'] == UPLOAD_ERR_OK){
            $extension = pathinfo($_FILES['anexo']['name'], PATHINFO_EXTENSION);
            if(in_array($extension, $formatos_permitidos)){
                $nombreArchivo = uniqid() . '.' . $extension;
                $path = $rutaNueva."/".$nombreArchivo;
                $carpetaTercero = '../archivos/egresos/' . $rutaNueva;

                if (!file_exists($carpetaTercero)) {
                    mkdir($carpetaTercero, 0777, true);   
                }
                $dir = $carpetaTercero.'/'. $nombreArchivo;

                if (move_uploaded_file($_FILES['anexo']['tmp_name'], $dir)){
                    $datos = [
                        'idRegistro' => $idRegistro,
                        'anexo' => $dir
                    ];
                    if ($objEgreso->actualizarAnexo($datos)){
                        $response = "Anexo modificado con exito";
                    }
                }
            }else {
                $response = "Formato invalido";
            }
        }
        echo $response;
    break;

    case 'eliminarAnexo':
        $dataAnexo = $objEgreso->cargarAnexo($_POST['idAnexo']);
        $rutaArchivo = $dataAnexo['anexo'];
        if(unlink($rutaArchivo)){
            $datos = [
                'id' => $dataAnexo['id'],
                'anexo' => NULL
            ];
            if($objEgreso->eliminarAnexo($datos)){
                echo "Anexo eliminado con exito";
            }
        }else{
            echo "Error al eliminar el archivo de anexo";
        }
    break;

    case 'eliminarEgreso':
        $data = $objEgreso->cargarAnexo($_POST['id']);
        if(!empty($data['anexo'])){
            if(unlink($data['anexo'])){
                echo $data = $objEgreso->eliminarEgreso($_POST['id']);
                echo "anexo y egreso eliminado con exito";
            }
        }else{
            echo $data = $objEgreso->eliminarEgreso($_POST['id']);
            echo "egreso eliminado con exito";
        }
    break;

    default:
        return http_response_code(404);
    break;
}