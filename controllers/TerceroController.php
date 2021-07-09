<?php

require_once '../models/ModelTercero.php';
require_once '../config/helpers/validate.php';
$objTercero = new Tercero();

switch ($_REQUEST['opcion']) {
    case 'listarTerceros':
        $data = $objTercero->GetAll();
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "empresa" => $value['empresa'],
                    "representante" => $value['representante'],
                    "telefono1" => $value['telefono1'],
                    "celular1" => $value['celular1'],
                    "estado" => ($value['estado'] == 'Activo' ? "<h4><span class='badge badge-pill badge-activo'>Activo</span></h4>" : "<h4><span class='badge badge-inactivo badge-pill'>Inactivo</span></h4>"),
                    "fechaRegistro" => $value['fechaRegistro'],
                    "OP" => "<td>
                                <div class='btn-group' role='group'>
                                    <button type='button' class='btn text-white btn-ver btn-sm' data-toggle='modal' data-target='#ModalSee' onclick=detalleTercero({$value['id']})><i class='fas fa-eye'></i></button>
                                    <button type='button' class='btn ml-1 text-white btn-sm btn-estado' data-toggle='modal' data-target='#ModalDelete' onclick=editarEstado({$value['id']})><i class='fas fa-exchange-alt'></i></i></button>
                                    <button type='button' class='btn ml-1 text-white btn-sm btn-edit' data-toggle='modal' data-target='#ModalUpdate' onclick=editarTercero({$value['id']})><i class='fas fa-edit'></i></button>
                                </div>
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

    case 'registrar':
        $errores = [];
        $identificacion = isset($_POST['identificacion']) ? rip_tags($_POST['identificacion']) : null;
        $numero = isset($_POST['numero']) ? $_POST['numero'] : null;
        $empresa = isset($_POST['empresa']) ? rip_tags($_POST['empresa']) : null;
        $representante = isset($_POST['representante']) ? rip_tags($_POST['representante']) : null;
        $tipoNegocio = isset($_POST['tipoNegocio']) ? rip_tags($_POST['tipoNegocio']) : null;
        $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
        $web = isset($_POST['web']) ? $_POST['web'] : null;
        $facturaElectronico = isset($_POST['facturaElectronico']) ? rip_tags($_POST['facturaElectronico']) : null;
        $direccion = isset($_POST['direccion']) ? rip_tags($_POST['direccion']) : null;
        $telefono1 = isset($_POST['telefono1']) ? $_POST['telefono1'] : null;
        $telefono2 = isset($_POST['telefono2']) ? $_POST['telefono2'] : null;
        $celular1 = isset($_POST['celular1']) ? $_POST['celular1'] : null;
        $celular2 = isset($_POST['celular2']) ? $_POST['celular2'] : null;
        $departamento = isset($_POST['departamento']) ? rip_tags($_POST['departamento']) : null;
        $municipio = isset($_POST['municipio']) ? rip_tags($_POST['municipio']) : null;
        $cuenta = isset($_POST['cuenta']) ? $_POST['cuenta'] : null;
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;

        if (!validaRequerido($identificacion)) {
            $errores[] = 'El campo <strong>identificación</strong> es incorrecto.';
        }
        if (!validarEntero($numero) && !is_numeric($numero)) {
            $errores[] = 'El campo <strong>Número</strong> es incorrecto.';
        }
        if (!validaRequerido($empresa)) {
            $errores[] = 'El campo <strong>Empresa</strong>  es incorrecto.';
        }
        if (!validaRequerido($representante)) {
            $errores[] = 'El campo <strong>Representante</strong>  es incorrecto.';
        }
        if (!validaRequerido($tipoNegocio)) {
            $errores[] = 'El campo <strong>Tipo negocio</strong>  es incorrecto.';
        }
        if (!validaEmail($correo)) {
            $errores[] = 'El campo <strong>Correo</strong>  es incorrecto.';
        }
        if (!validateURL($web)) {
            $errores[] = 'Ingrese una dirección <strong>WEB</strong> correcta.';
        }
        if (!validaRequerido($facturaElectronico)) {
            $errores[] = 'El campo <strong>Factura electronico</strong> es incorrecto.';
        }
        if (!validaRequerido($direccion)) {
            $errores[] = 'El campo <strong>Dirección</strong> es incorrecto.';
        }
        if (!validarEntero($telefono1) && !is_numeric($telefono1)) {
            $errores[] = 'El campo <strong>Telefono 1</strong> es incorrecto.';
        }
        if (!validarEntero($telefono2) && !is_numeric($telefono2)) {
            $errores[] = 'El campo <strong>Telefono 2</strong> es incorrecto.';
        }
        if (!validarEntero($celular1) && !is_numeric($celular1)) {
            $errores[] = 'El campo <strong>Celular 1</strong> es incorrecto.';
        }
        if (!validarEntero($celular2) && !is_numeric($celular2)) {
            $errores[] = 'El campo <strong>Celular 2</strong> es incorrecto.';
        }
        if (!validaRequerido($departamento)) {
            $errores[] = 'El campo <strong>Departamento</strong> es incorrecto.';
        }
        if (!validaRequerido($municipio)) {
            $errores[] = 'El campo <strong>Municipio</strong> es incorrecto.';
        }
        if (!validarEntero($cuenta) && !is_numeric($cuenta)) {
            $errores[] = 'El campo <strong>Cuenta</strong> es incorrecto.';
        }
        if (!validarEntero($usuario) && !is_numeric($usuario)) {
            $errores[] = 'Error de <strong>usuario</strong>.';
        }

        if (count($errores) > 0) {
            foreach ($errores as $value) {
                echo "<div class='alert alert-warning alert-dismissible fade show pb-2 pt-2' width:40% role='alert'>
            <strong>Error:</strong> {$value}.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
            }
        } else {
            $datos = [
                'identificacion' => $identificacion,
                'numero' => $numero,
                'empresa' => $empresa,
                'representante' => $representante,
                'tipoNegocio' => $tipoNegocio,
                'correo' => $correo,
                'web' => $web,
                'facturaEletronico' => $facturaElectronico,
                'direccion' => $direccion,
                'telefono1' => $telefono1,
                'telefono2' => $telefono2,
                'celular1' => $celular1,
                'celular2' => $celular2,
                'departamento' => $departamento,
                'municipio' => $municipio,
                'cuenta' => $cuenta,
                'usuario' => $usuario
            ];
            $objTercero->save($datos);
            echo 1;
        }
        break;

    case 'detalleTercero':
        $data = $objTercero->DetalleTercero($_POST['id']);
        echo json_encode($data);
        break;

    case 'editarTercero':
        $data = $objTercero->DetalleTercero($_POST['id']);
        echo json_encode($data);
        break;

    case 'actualizarTercero':
        $errores = [];
        $id = isset($_POST['idU']) ? $_POST['idU'] : null;
        $identificacion = isset($_POST['identificacionU']) ? rip_tags($_POST['identificacionU']) : null;
        $numero = isset($_POST['numeroU']) ? $_POST['numeroU'] : null;
        $empresa = isset($_POST['empresaU']) ? rip_tags($_POST['empresaU']) : null;
        $representante = isset($_POST['representanteU']) ? rip_tags($_POST['representanteU']) : null;
        $tipoNegocio = isset($_POST['tipoNegocioU']) ? rip_tags($_POST['tipoNegocioU']) : null;
        $correo = isset($_POST['correoU']) ? $_POST['correoU'] : null;
        $web = isset($_POST['webU']) ? $_POST['webU'] : null;
        $facturaElectronico = isset($_POST['facturaElectronicoU']) ? rip_tags($_POST['facturaElectronicoU']) : null;
        $direccion = isset($_POST['direccionU']) ? rip_tags($_POST['direccionU']) : null;
        $telefono1 = isset($_POST['telefono1U']) ? $_POST['telefono1U'] : null;
        $telefono2 = isset($_POST['telefono2U']) ? $_POST['telefono2U'] : null;
        $celular1 = isset($_POST['celular1U']) ? $_POST['celular1U'] : null;
        $celular2 = isset($_POST['celular2U']) ? $_POST['celular2U'] : null;
        $departamento = isset($_POST['departamentoU']) ? rip_tags($_POST['departamentoU']) : null;
        $municipio = isset($_POST['municipioU']) ? rip_tags($_POST['municipioU']) : null;
        $cuenta = isset($_POST['cuentaU']) ? $_POST['cuentaU'] : null;

        if (!validaRequerido($id)) {
            $errores[] = 'El campo <strong>ID</strong> es incorrecto.';
        }
        if (!validaRequerido($identificacion)) {
            $errores[] = 'El campo <strong>identificación</strong> es incorrecto.';
        }
        if (!validarEntero($numero) && !is_numeric($numero)) {
            $errores[] = 'El campo <strong>Número</strong> es incorrecto.';
        }
        if (!validaRequerido($empresa)) {
            $errores[] = 'El campo <strong>Empresa</strong>  es incorrecto.';
        }
        if (!validaRequerido($representante)) {
            $errores[] = 'El campo <strong>Representante</strong>  es incorrecto.';
        }
        if (!validaRequerido($tipoNegocio)) {
            $errores[] = 'El campo <strong>Tipo negocio</strong>  es incorrecto.';
        }
        if (!validaEmail($correo)) {
            $errores[] = 'El campo <strong>Correo</strong>  es incorrecto.';
        }
        if (!validateURL($web)) {
            $errores[] = 'Ingrese una dirección <strong>WEB</strong> correcta.';
        }
        if (!validaRequerido($facturaElectronico)) {
            $errores[] = 'El campo <strong>Factura electronico</strong> es incorrecto.';
        }
        if (!validaRequerido($direccion)) {
            $errores[] = 'El campo <strong>Dirección</strong> es incorrecto.';
        }
        if (!validarEntero($telefono1) && !is_numeric($telefono1)) {
            $errores[] = 'El campo <strong>Telefono 1</strong> es incorrecto.';
        }
        if (!validarEntero($telefono2) && !is_numeric($telefono2)) {
            $errores[] = 'El campo <strong>Telefono 2</strong> es incorrecto.';
        }
        if (!validarEntero($celular1) && !is_numeric($celular1)) {
            $errores[] = 'El campo <strong>Celular 1</strong> es incorrecto.';
        }
        if (!validarEntero($celular2) && !is_numeric($celular2)) {
            $errores[] = 'El campo <strong>Celular 2</strong> es incorrecto.';
        }
        if (!validaRequerido($departamento)) {
            $errores[] = 'El campo <strong>Departamento</strong> es incorrecto.';
        }
        if (!validaRequerido($municipio)) {
            $errores[] = 'El campo <strong>Municipio</strong> es incorrecto.';
        }
        if (!validarEntero($cuenta) && !is_numeric($cuenta)) {
            $errores[] = 'El campo <strong>Cuenta</strong> es incorrecto.';
        }


        if (count($errores) > 0) {
            foreach ($errores as $value) {
                echo "<div class='alert alert-danger alert-dismissible fade show ' width:40% role='alert'>
            <strong>Error:</strong> {$value}
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
            }
        } else {
            $datos = [
                'id' => $id,
                'identificacion' => $identificacion,
                'numero' => $numero,
                'empresa' => $empresa,
                'representante' => $representante,
                'tipoNegocio' => $tipoNegocio,
                'correo' => $correo,
                'web' => $web,
                'facturaEletronico' => $facturaElectronico,
                'direccion' => $direccion,
                'telefono1' => $telefono1,
                'telefono2' => $telefono2,
                'celular1' => $celular1,
                'celular2' => $celular2,
                'departamento' => $departamento,
                'municipio' => $municipio,
                'cuenta' => $cuenta
            ];
            echo $objTercero->actualizar($datos);
        }

        break;

    case 'updateEstado':
        $errores = [];
        $id = isset($_POST['idEstado']) ? $_POST['idEstado'] : null;
        $estado = isset($_POST['actualizarEstado']) ? rip_tags($_POST['actualizarEstado']) : null;
        if (!validaRequerido($estado)) {
            $errores[] = 'El campo <strong>Estado</strong> es incorrecto.';
        }
        if (!validarEntero($id) && !is_numeric($id)) {
            $errores[] = 'Error de usuario.';
        }

        if (count($errores) > 0) {
            foreach ($errores as $value) {
                echo "<div class='alert alert-danger alert-dismissible fade show ' width:40% role='alert'>
            <strong>Error:</strong> {$value}
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
            }
        } else {
            $datos = [
                'id' => $id,
                'estado' => $estado
            ];

            return $objTercero->actualizarEstado($datos);
        }

        break;

    case 'listarDepartamentos':
        $data = $objTercero->listarDepartamentos();
        echo json_encode($data);
        break;
    
    case 'listarMunicipios':
        $data = $objTercero->listarMunicipios($_POST['id']);
        echo json_encode($data);
        break;

    case 'tablaTerceros':
        $data = $objTercero->tablaTerceros();
        if ($data) {
            foreach ($data as $value) {
                $list[] = array(
                    "empresa" => $value['empresa'],
                    "web" => "<a class='btn btn-sm btn-ver text-white' href='{$value['web']}' target='_blank'><i class='uil uil-globe'></i></a>",
                    "representante" => $value['representante'],
                    "correo" => $value['correo'],
                    "estado" => ($value['estado'] == 'Activo' ? "<h4><span class='badge badge-pill badge-activo'>Activo</span></h4>" : "<h4><span class='badge badge-inactivo badge-pill'>Inactivo</span></h4>"),
                );
            }
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list);
        echo json_encode($results);
        break;
}