<?php
session_start();

if(isset($_SESSION['session_datapagos'])){
    require_once '../models/ModelArchivo.php';
    $objArchivo = new Archivo();
    $id_usuario = $_SESSION['session_datapagos']['id'];
    $nombreUsuario = $_SESSION['session_datapagos']['nombre'];
    
    switch ($_REQUEST['opcion']) {
        case 'listarArchivos':
            $data = $objArchivo->listarArchivos($id_usuario);
            if ($data) {
                foreach ($data as $value) {
                    $list[] = [
                        "categoria" => $value['categoria'],
                        "nombre" => $value['nombre'],
                        "tipo" => '.' . $value['tipo'],
                        "url" => "<button type='button' class='btn  text-white btn-ver btn-sm' data-toggle='modal' data-target='#modalVizualizar' 
                                    onclick=cargarArchivo({$value['id']})><i class='uil uil-eye'></i>
                                </button>",
                        "fechaRegistro" => $value['fechaRegistro'],
                        "OP" => "<td>
                                    <a href='{$value['url']}' class='btn btn-sm text-white btn-download' download>
                                    <i class='uil uil-file-download'></i>
                                    <a/>
                                    <button type='button' class='btn btn-sm text-white btn-share ml-1' data-toggle='modal' data-target='#modalCompartir' 
                                        onclick=compartirArchivo({$value['id']})><i class='uil uil-file-share-alt'></i>
                                    </button>
                                    <button type='button' class='btn btn-sm text-white btn-delete' data-toggle='modal' data-target='#modalCompartir' 
                                        onclick=eliminarArchivo({$value['id']})><i class='uil uil-trash-alt'></i>
                                    </button>
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
                
        case 'registrarArchivo':
            $id = $id_usuario;
            $categoriaArchivo = $_POST['categoriaArchivo'];
            $nombre = $_POST['nombreArchivo'];
            $formatos_permitidos = ['pdf', 'jpg', 'png', 'docx', 'txt', 'pptx', 'xlsx', 'xls'];
            if ($_FILES['archivo']['size'] > 0 && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
                $archivo = $_FILES['archivo']['name'];
                $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                if (in_array($extension, $formatos_permitidos)) {
                    $nombreArchivo = uniqid() . '.' . $extension;
                    $carpetaUsuario = '../uploads/' . $nombreUsuario;
                    if (!file_exists($carpetaUsuario)) {
                        mkdir($carpetaUsuario, 0777, true);
                    }
                    $archivoTemporal = $_FILES['archivo']['tmp_name'];
                    $rutaFinal = $carpetaUsuario . "/" . $nombreArchivo;
                    $datos = [
                        'codigoCategoria' => $categoriaArchivo,
                        'nombre' => $nombre,
                        'tipo' => $extension,
                        'url' => $rutaFinal,
                        'idUsuario' => $id_usuario,
                    ];
                    print_r($datos);
                    
                    if (move_uploaded_file($archivoTemporal, $rutaFinal)) {
                        echo $objArchivo->registrarArchivo($datos);
                    }
                }
            }
        break;
                    
        case 'listarCategoriaArchivo':
            $data = $objArchivo->listarCategoriaArchivo();
            echo json_encode($data);
        break;

        case 'visualizarArchivo':
            $data = $objArchivo->visualizarArchivo($_POST['id']);
            if ($data['tipo'] == 'pdf') {
                echo "<iframe src='{$data['url']}' width='100%' height='500px'></iframe>";
            } else if ($data['tipo'] == 'jpg') {
                echo "<img src='{$data['url']}' alt='{$data['nombre']}' width='auto' height='600'>";
            } else if ($data['tipo'] == 'png') {
                echo "<img src='{$data['url']}' alt='{$data['nombre']}' width='auto' height='600'>";
            } else {
                echo "<div class='alert alert-primary' role='alert'>El formato actual no esta soportado para visualizar!</div>";
            }
        break;
    
        case 'listarUsuarios':
            $data = $objArchivo->listarUsuarios($id_usuario);
            echo json_encode($data);
        break;
        
        case 'compartir':
            $idArchivo = $_POST['codigoArchivoCompartido'];
            $codigoUsuarioCompartido = $_POST['usuarioCompartir'];
            $codigoUsuario = $id_usuario;
            $datos = [
                'id_archivo' => $idArchivo,
                'id_usuario' => $codigoUsuario,
                'id_compartido' => $codigoUsuarioCompartido
            ];
            echo $objArchivo->compartir($datos);
        break;
            
        case 'archivosCompatidos':
            $data = $objArchivo->archivosCompartidos($id_usuario);
            if ($data) {
                foreach ($data as $value) {
                    $list[] = [
                        "propietario" => $value['usuario'],
                        "nombre" => $value['nombre'],
                        "acciones" => "<button type='button' class='btn  text-white btn-ver btn-sm' onclick=verArchivoCompartido({$value['id']}) data-toggle='modal' data-target='#verArchivoCompartido'>
                                            <i class='fas fa-eye'></i>
                                        </button>
                                        <button type='button' class='btn  text-white btn-download btn-sm' onclick=descargarArchivoCompartido({$value['id']})>
                                            <i class='fas fa-download'></i>
                                        </button>
                                        <button type='button' class='btn  text-white btn-comment btn-sm'>
                                            <i class='far fa-comments'></i>
                                        </button>",
                        "fechaCompartido" => $value['fechaRegistro']
                    ];
                }
            }
            echo json_encode($list);
        break;
                
        case 'verArchivoCompartido';
        $data = $objArchivo->verArchivoCompartido($_POST['id']);
        if ($data['tipo'] == 'pdf') {
            echo "<iframe src='{$data['url']}' width='100%' height='500px'></iframe>";
        } else if ($data['tipo'] == 'jpg') {
            echo "<img src='{$data['url']}' class='img-fluid'>";
        } else if ($data['tipo'] == 'png') {
            echo "<img src='{$data['url']}' class='img-fluid'>";
        } else {
            echo "<div class='alert alert-primary' role='alert'>El formato actual no esta soportado para visualizar!</div>";
        }
        break;
                                        
        default:
            header("HTTP/1.1 203 Bad Request");
        break;
    }
}else{
    header("HTTP/1.1 203 Bad Request");
}