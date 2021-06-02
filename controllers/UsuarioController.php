<?php

session_start();
require_once '../models/ModelUsuario.php';
require_once '../config/helpers/validatePassword.php';

$objUsuario = new Usuario();
switch ($_REQUEST['opcion']) {
    case 'registrarUsuario':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $correo = $_POST['correo'];
        $rol = $_POST['rol'];
        $estado = $_POST['estado'];

        $datos = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'usuario' => $usuario,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'correo' => $correo,
            'rol' => $rol,
            'estado' => $estado
        ];
        if ($objUsuario->registrarUsuario($datos)) {
            echo 1;
        }

        break;

    case 'iniciarSesion';
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $datos = [
            'usuario' => $usuario,
            'password' => $password
        ];
        $result = $objUsuario->iniciarSesion($datos);
        if ($result) {
            foreach ($result as $campos => $valor) {
                $_SESSION["session_datapagos"][$campos] = $valor;
            }
            echo $respose = 1;
        } else {
            echo $respose = 0;
        }
        break;

    case 'listarUsuarios':
        $data = $objUsuario->listarUsuarios();
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "nombre" => $value['nombre'],
                    "apellido" => $value['apellido'],
                    "usuario" => $value['usuario'],
                    "correo" => $value['email'],
                    "rol" => $value['rol'],
                    "estado" => ($value['estado'] == 'Activo' ? "<h4><span class='badge badge-pill badge-activo'>Activo</span></h4>" : "<h4><span class='badge badge-inactivo badge-pill'>Inactivo</span></h4>"),
                    "fechaRegistro" => $value['fechaRegistro'],
                    "acciones" => "<td>
                                       <button type='button' class='btn text-white btn-sm btn-edit' data-toggle='modal' data-target='#modalEditar' onclick=editarUsuario({$value['id']})><i class='fas fa-edit'></i></button>
                                       <button type='button' class='btn text-white btn-sm btn-ver' data-toggle='modal' data-target='#modalEditarPassword' onclick=editarPassword({$value['id']})><i class='fas fa-key'></i></button>
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

    case 'editarUsuario':
        $data = $objUsuario->editarUsuario($_POST['id']);
        echo json_encode($data);
        break;

    case 'actualizarUsuario':
        $IDregistro = $_POST['IDregistro'];
        $nombre = $_POST['nombreU'];
        $apellido = $_POST['apellidoU'];
        $usuario = $_POST['usuarioU'];
        $correo = $_POST['correoU'];
        $rol = $_POST['rolU'];
        $estado = $_POST['estadoU'];

        $datos = [
            'IDregistro' => $IDregistro,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'usuario' => $usuario,
            'correo' => $correo,
            'rol' => $rol,
            'estado' => $estado
        ];
        if ($objUsuario->actualizarUsuario($datos)) {
            $respose = 1;
        } else {
            $respose = 0;
        }
        echo $respose;
        break;

    case 'actualizarPassword':
        $password = $_POST['passwordU'];
        $idRegistro = $_POST['IDregistroPassword'];
        $error_encontrado = "";
        if (validar_clave($password, $error_encontrado)) {
            $datos = [
                'idRegistro' => $idRegistro,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            if ($objUsuario->actualizarPassword($datos)) {
                echo '1';
            }
        } else {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Error:</strong> {$error_encontrado}.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
        }
        break;

    case 'cerrarSesion':
        session_destroy();
        header("location:../");
        break;
}