<?php

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
                    "OP" => "<td>
                                <button type='button' class='btn text-white  btn-ver btn-sm' data-toggle='modal' data-target='#modalImagen' onclick=cargarArchivo({$value['id']}) data-toggle='tooltip' data-placement='top' title='Ver comprobante'><i class='fas fa-images'></i></button>
                                <a href='{$value['comprobante']}' class='btn text-white btn-download btn-sm' download data-toggle='tooltip' data-placement='top' title='Descargar comprobante'><i class='fas fa-cloud-download-alt'></i><a/>
                                <button type='button' class='btn text-white btn-edit btn-sm ml-1' data-toggle='modal' data-target='#modalEditar' onclick=editarPago({$value['id']}) data-toggle='tooltip' data-placement='top' title='Editar comprobante'><i class='fas fa-edit'></i></button>
                            </td>"
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
                //$nombreArchivo = basename($_FILES['comprobante']['name']);
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
        $comprobante = $_POST['comprobanteU'];
        $descripcion = $_POST['descripcionU'];
        $formatos_permitidos = ['jpg', 'png', 'pdf'];
        if ($_FILES['comprobanteU']['size'] > 0 && $_FILES['comprobanteU']['error'] === UPLOAD_ERR_OK) {
            $archivoActual = $_POST['comprobanteU'];
            if (file_exists($archivoActual)) {
                if (unlink($archivoActual)) {
                    $archivo = $_FILES['comprobanteU']['name'];
                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                    if (in_array($extension, $formatos_permitidos)) {
                        $nombreArchivo = basename($_FILES['comprobanteU']['name']);
                        $carpetaTercero = '../archivos/' . str_replace(' ', '_', $nombreTercero);
                        if (!file_exists($carpetaTercero)) {
                            mkdir($carpetaTercero, 0777, true);
                        }
                        $archivoTemporal = $_FILES['comprobanteU']['tmp_name'];
                        $rutaFinal = $carpetaTercero . "/" . $nombreArchivo;
                        $datos = [
                            'mesPago' => $mes,
                            'monto' => $monto,
                            'comprobante' => $rutaFinal,
                            'idRegistro' => $id,
                            'tercero' => $idTercero,
                            'idUsuario' => '1',
                            'fechaPago' => $fechaPago,
                            'medioPago' => $medioPago,
                            'descripcion' => $descripcion
                        ];

                        if (move_uploaded_file($archivoTemporal, $rutaFinal)) {
                            echo $objPago->actualizarPagoComprobante($datos);
                        }
                    }
                }
            } else {
                echo "el archivo no existe";
            }
        } else {
            $datos1 = [
                'idRegistro' => $id,
                'mesPago' => $mes,
                'monto' => $monto,
                'tercero' => $idTercero,
                'idUsuario' => '1',
                'fechaPago' => $fechaPago,
                'medioPago' => $medioPago,
                'descripcion' => $descripcion
            ];

            echo $objPago->actualizarPago($datos1);
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
