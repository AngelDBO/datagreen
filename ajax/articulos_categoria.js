let Categoria = {
    nombre: "",
    descripcion: "",
    estado: "",
    categoria_id: "",
};

const limpiar_campos = () => {
    Categoria.nombre = "";
    Categoria.descripcion = "";
    Categoria.estado = "";
    Categoria.categoria_id = "";
};

const guardar_categoria = async () => {
    let fordata = new FormData();
    fordata.append("nombre_categoria", Categoria.nombre);
    fordata.append("descripcion_categoria", Categoria.descripcion);
    fordata.append("estado_categoria", Categoria.estado);
    fordata.append("categoria_id", Categoria.categoria_id);
    fordata.append("accion", "registrar");

    await fetch("./../controllers/CategoriaArticuloController.php", {
        method: "POST",
        body: fordata,
    })
        .then((data) => data.json())
        .then((data) => {
            if (data.result) {
                listar_categorias();

                Swal.fire({
                    showCancelButton: false,
                    allowOutsideClick: false,
                    icon: 'success',
                    text: data.message
                });
            }
        });
};

const editar = async (id) => {
    let fordata = new FormData();
    fordata.append("categoria_id", id);
    fordata.append("accion", "editar");

    await fetch("./../controllers/CategoriaArticuloController.php", {
        method: "POST",
        body: fordata,
    })
        .then((data) => data.json())
        .then((data) => {
            document.getElementById("categoria_id").value = data.id;
            document.getElementById("nombre_categoria").value = data.nombre;
            document.getElementById("descripcion_categoria").value = data.descripcion;
            document.getElementById("estado_categoria").value = data.estado;

            $("#modal_categoria").modal("show");
        });
};

const listar_categorias = async () => {
    let formdata = new FormData();
    formdata.append("accion", "listar_categorias");

    await fetch("./../controllers/CategoriaArticuloController.php", {
        method: "POST",
        body: formdata,
    })
        .then((data) => data.json())
        .then((data) => {
            let rows = "";
            $("#tablaCategorias tbody").empty();

            if (data.length > 0) {
                data.forEach(element => {
                    rows += `<tr>
                                <td>${element.nombre}</td>
                                <td>${element.descripcion}</td>
                                <td>${element.estado == "A" 
                                    ? "<span class='badge badge-success'>Activa</span>"
                                    : "<span class='badge badge-warning'>Inactiva</span>"}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning btn-sm" onclick="editar(${element.id})">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-info btn-sm">
                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>`;
                });
                $("#tablaCategorias tbody").append(rows);
            }
        });
}

document.addEventListener("DOMContentLoaded", () => {

    listar_categorias();

    let loginForm = document.getElementById("formCategoriaArticulo");

    loginForm.addEventListener("submit", (e) => {
        e.preventDefault();

        Categoria.nombre = document.getElementById("nombre_categoria").value;
        Categoria.descripcion = document.getElementById("descripcion_categoria").value;
        Categoria.estado = document.getElementById("estado_categoria").value;
        Categoria.categoria_id = document.getElementById("categoria_id").value;

        if (Categoria.nombre == "" || Categoria.estado == "") {
            alert("Hay campos obligatorios sin diligenciar");
        } else {
            guardar_categoria();
            limpiar_campos();
            loginForm.reset();

            $("#modal_categoria").modal("hide");
        }
    });
});
