<?php
session_start();
$id_usuario = $_SESSION['session_datapagos']['id'];
require_once '../models/ModelEgreso.php';
require_once '../config/helpers/validate.php';
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
                    "acciones" => "<td>
                                        <button type='button' class='btn text-white btn-printer btn-sm'><i class='fas fa-print'></i></button>
                                        <button type='button' class='btn text-white btn-edit btn-sm' data-toggle='modal' data-target='#editarEgreso' onclick=editarEgreso({$value['id']})><i class='fas fa-edit'></i></button>
                                        <button type='button' class='btn text-white btn-delete btn-sm' onclick=eliminarEgreso({$value['id']})><i class='fas fa-trash-alt'></i></button>
                                   </td>"
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
        $monto = isset($_POST['monto']) ? $_POST['monto'] : null;
        $medioPago = isset($_POST['medioPagoEgreso']) ? $_POST['medioPagoEgreso'] : null;
        $categoria = isset($_POST['categoria_egreso']) ? $_POST['categoria_egreso'] : null;
        $descripcion = isset($_POST['descripcionIngreso']) ? rip_tags($_POST['descripcionIngreso']) : null;

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
                echo "<div class='alert alert-danger alert-dismissible fade show ' width:40% role='alert'>
                        <strong>Error:</strong> {$value}.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            }
        } else {
            $datos = [
                'monto' => $monto,
                'descripcion' => $descripcion,
                'terceroiId' => $terceroID,
                'usuarioId' => $id_usuario,
                'medioPagoId' => $medioPago,
                'categoriaId' => $categoria
            ];
            if ($objEgreso->registrarEgreso($datos)) {
                echo "1";
            }
        }
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
                echo "1";
            }
        }
        break;
    case 'eliminarEgreso':
        echo $objEgreso->eliminarEgreso($_POST['id']);
        break;
}
