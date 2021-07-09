<?php

require_once '../models/ModelAgenda.php';
$objAgenda = new Agenda();
switch ($_REQUEST['opcion']) {
    case 'registrarAgenda':
        $datos = [
            'actividad' => $_POST['actividad'],
            'periodo' => $_POST['periodo'],
            'fecha' => $_POST['fecha'],
            'color' => $_POST['color'],
            'usuarioID' => '1'
        ];
        if ($objAgenda->registrarAgenda($datos)) {
            echo '1';
        }
        break;

    case 'listarAgenda';
        $data = $objAgenda->listarAgenda();

        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "caja" => "<button class='{$value['color']} text-white' onclick='finalizarAgenda({$value['id']})'><i class='uil uil-map-pin'></i></button>",
                    "actividad" => $value['actividad'],
                    "periodo" => $value['periodo'],
                    "fecha" => $value['fecha'],
                    "estado" => "<span class='h3 badge badge-success'>{$value['estado']}</span>",
                    "editar" => "<button class='btn btn-sm text-white' style='background: #492ab3' onclick='editarAgenda({$value['id']})' data-toggle='modal' data-target='#modalEditar'><i class='uil uil-edit'></i></button"
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

    case 'finalizarAgenda':

        if ($objAgenda->finalizarAgenda($_POST['id'])) {
            echo "1";
        }
        break;

    case 'editarAgenda':
        $data = $objAgenda->editarAgenda($_POST['id']);
        echo json_encode($data);
        break;

    case 'actualizarAgenda':

        $datos = [
            'IDregistro' => $_POST['IDregistro'],
            'fecha' => $_POST['fechaU'],
            'actividad' => $_POST['actividadU'],
            'periodo' => $_POST['periodoU'],
            'color' => $_POST['colorU']
        ];

        if ($objAgenda->actualizarAgenda($datos)) {
            echo '1';
        }
        break;
}
