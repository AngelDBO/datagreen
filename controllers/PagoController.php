<?php
session_start();
$id_usuario = $_SESSION['session_datapagos']['id'];
date_default_timezone_set('America/Bogota');
require_once '../config/helpers/extension.php';
require_once '../models/ModelPagos.php';
$objPago = new Pago();

switch ($_REQUEST['opcion']) {

    case 'listarPagos':
        $data = $objPago->listarPagos();
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "empresa" => $value['empresa'],
                    "mesPago" => $value['mesPago'],
                    "monto" => $value['monto'],
                    "fechaPago" => $value['fechaPago'],
                    "nombre" => $value['nombre'],
                    "fechaRegistro" => $value['fechaRegistro'],
                    "OP" => (!empty($value["comprobante"])? 
                            "<td>
                                <button type='button' class='btn text-white  btn-share btn-sm' data-toggle='modal' data-target='#modalImagen' onclick=cargarArchivo({$value['id']})>
                                    <i class='fas fa-print'></i>
                                </button>
                                <button type='button' class='btn text-white  btn-ver btn-sm' data-toggle='modal' data-target='#modalImagen' onclick=cargarArchivo({$value['id']})>
                                    <i class='fas fa-eye'></i>
                                </button>
                                <a href='{$value['comprobante']}' class='btn text-white btn-download btn-sm' download>
                                    <i class='fas fa-cloud-download-alt'></i>
                                <a/>
                                <button type='button' class='btn text-white btn-edit btn-sm ml-1' data-toggle='modal' data-target='#modalEditar' onclick='editarPago({$value['id']});'>
                                    <i class='fas fa-edit'></i>
                                </button>
                            </td>":
                            "<td> 
                                <button type='button' class='btn text-white btn-edit btn-sm' data-toggle='modal' data-target='#modalEditar' onclick='editarPago({$value['id']});'>
                                    <i class='fas fa-edit'></i>
                                </button>
                            </td>")
                ];
            }
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list);
        echo json_encode($results);
        break;

    case 'registrarPago':
        $id = $_POST['tercero'];
        $nombreTercero = $_POST['NombreTercero'];
        $mes = $_POST['mes'];
        $monto = $_POST['monto'];
        $medioPago = $_POST['medioPago'];
        $fechaPago = $_POST['fechaPago'];
        $descripcion = $_POST['descripcion'];
        $formatos_permitidos = ['pdf', 'jpg', 'png', 'docx', 'txt', 'pptx', 'xlsx'];
        if ($_FILES['comprobante']['size'] > 0 && $_FILES['comprobante']['error'] === UPLOAD_ERR_OK) {
            $archivo = $_FILES['comprobante']['name'];
            $extension = pathinfo($archivo, PATHINFO_EXTENSION);
            if (in_array($extension, $formatos_permitidos)) {
                $nombreArchivo = uniqid() . '.' . $extension;
                $carpetaTercero = '../archivos/' . str_replace(' ', '_', $nombreTercero);
                if (!file_exists($carpetaTercero)) {
                    mkdir($carpetaTercero, 0777, true);
                }
                $archivoTemporal = $_FILES['comprobante']['tmp_name'];
                $rutaFinal = $carpetaTercero . "/" . $nombreArchivo;
                $datos = [
                    'mesPago' => $mes,
                    'monto' => $monto,
                    'comprobante' => $rutaFinal,
                    'tercero' => $id,
                    'idUsuario' => '1',
                    'fechaPago' => $fechaPago,
                    'medioPago' => $medioPago,
                    'descripcion' => $descripcion
                ];
                if (move_uploaded_file($archivoTemporal, $rutaFinal)) {
                    echo $objPago->registrarPago($datos);
                }
            }
        }else{
            $datos = [
                'mesPago' => $mes,
                'monto' => $monto,
                'tercero' => $id,
                'idUsuario' => '1',
                'fechaPago' => $fechaPago,
                'medioPago' => $medioPago,
                'descripcion' => $descripcion
            ];
            echo $objPago->registrarPago($datos);
        }

        break;

    case 'cargarTercero':
        $datos = $objPago->cargarTercero();

        if ($datos) {
            foreach ($datos as $value) {
                $lista[] = [
                    '0' => $value['id'],
                    '1' => $value['empresa']
                ];
            }
            echo json_encode($lista);
        }
        break;

    case 'cargarMedioPago':
        $datos = $objPago->cargarMedioPago();
        if ($datos) {
            foreach ($datos as $value) {
                $lista[] = [
                    '0' => $value['id'],
                    '1' => $value['nombre']
                ];
            }
            echo json_encode($lista);
        }
        break;

    case 'editarPago':
        $data = $objPago->editarPago($_POST['id']);
        echo json_encode($data);
        break;

    case 'actualizarPago':
        $id = $_POST['idRegistro'];
        $nombreTercero = $_POST['NombreTerceroU'];
        $idTercero = $_POST['terceroU'];
        $mes = $_POST['mesU'];
        $monto = $_POST['montoU'];
        $medioPago = $_POST['medioPagoU'];
        $fechaPago = $_POST['fechaPagoU'];
        $comprobanteOld = $_POST['comprobanteOld'];
        $descripcion = $_POST['descripcionU'];
        $formatos_permitidos = ['jpg', 'png', 'pdf', 'jpeg'];
        if ($_FILES['comprobanteNew']['size'] > 0 && $_FILES['comprobanteNew']['error'] === UPLOAD_ERR_OK && !empty($comprobanteOld)) {
            if (file_exists($comprobanteOld)) {
                if (unlink($comprobanteOld)) {
                    $archivo = $_FILES['comprobanteNew']['name'];
                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                    if (in_array($extension, $formatos_permitidos)) {
                        $nombreArchivo = uniqid() . '.' . $extension;
                        $carpetaTercero = '../archivos/' . str_replace(' ', '_', $nombreTercero);
                        if (!file_exists($carpetaTercero)) {
                            mkdir($carpetaTercero, 0777, true);
                        }
                        $archivoTemporal = $_FILES['comprobanteNew']['tmp_name'];
                        $rutaFinal = $carpetaTercero . "/" . $nombreArchivo;
                        $datos = [
                            'idRegistro' => $id,
                            'mesPago' => $mes,
                            'monto' => $monto,
                            'comprobante' => $rutaFinal,
                            'tercero' => $idTercero,
                            'idUsuario' => $id_usuario,
                            'fechaPago' => $fechaPago,
                            'medioPago' => $medioPago,
                            'descripcion' => $descripcion
                        ];

                        if (move_uploaded_file($archivoTemporal, $rutaFinal)) {
                            echo $objPago->actualizarPago($datos);
                        }
                    }
                }
            }  
        }else if($_FILES['comprobanteNew']['size'] > 0 && $_FILES['comprobanteNew']['error'] === UPLOAD_ERR_OK && empty($comprobanteOld)){
                    $archivo = $_FILES['comprobanteNew']['name'];
                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                    if (in_array($extension, $formatos_permitidos)) {
                        $nombreArchivo = uniqid() . '.' . $extension;
                        $carpetaTercero = '../archivos/' . str_replace(' ', '_', $nombreTercero);
                        if (!file_exists($carpetaTercero)) {
                            mkdir($carpetaTercero, 0777, true);
                        }
                        $archivoTemporal = $_FILES['comprobanteNew']['tmp_name'];
                        $rutaFinal = $carpetaTercero . "/" . $nombreArchivo;
                        $datos = [
                            'idRegistro' => $id,
                            'mesPago' => $mes,
                            'monto' => $monto,
                            'comprobante' => $rutaFinal,
                            'tercero' => $idTercero,
                            'idUsuario' => $id_usuario,
                            'fechaPago' => $fechaPago,
                            'medioPago' => $medioPago,
                            'descripcion' => $descripcion
                        ];

                        if (move_uploaded_file($archivoTemporal, $rutaFinal)) {
                            echo $objPago->actualizarPago($datos);
                        }
                    }
        }else if($_FILES['comprobanteNew']['error'] === UPLOAD_ERR_NO_FILE && !empty($comprobanteOld)){
            if (file_exists($comprobanteOld)) {
                if (unlink($comprobanteOld)) {
                    $datos = [
                        'idRegistro' => $id,
                        'mesPago' => $mes,
                        'monto' => $monto,
                        'comprobante' => NULL,
                        'tercero' => $idTercero,
                        'idUsuario' => $id_usuario,
                        'fechaPago' => $fechaPago,
                        'medioPago' => $medioPago,
                        'descripcion' => $descripcion
                    ];
                    echo $objPago->actualizarPago($datos);
                }
            }
        }else if($_FILES['comprobanteNew']['error'] === UPLOAD_ERR_NO_FILE && empty($comprobanteOld)){
                $datos = [
                    'idRegistro' => $id,
                    'mesPago' => $mes,
                    'monto' => $monto,
                    'comprobante' => NULL,
                    'tercero' => $idTercero,
                    'idUsuario' => $id_usuario,
                    'fechaPago' => $fechaPago,
                    'medioPago' => $medioPago,
                    'descripcion' => $descripcion
                ];
                echo $objPago->actualizarPago($datos);
        }  
    break;

    case 'obtenerArchivo':
        $data = $objPago->obtenerImagen($_POST['id']);
        echo json_encode($data);
        break;

    case 'pagosRealizados':
        $data = $objPago->pagosRealizados();
        echo json_encode($data);
        break;
}