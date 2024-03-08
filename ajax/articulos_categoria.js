let Categoria = {
    nombre: "",
    descripcion: "",
    estado: "",
    categoria_id: "",
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

const limpiar_campos = () => {
    Categoria.nombre = "";
    Categoria.descripcion = "";
    Categoria.estado = "";
    Categoria.categoria_id = "";
};

const listar_categorias = async () => {
    let fordata = new FormData();
    fordata.append("accion", "listar_categorias");

    await fetch("./../controllers/CategoriaArticuloController.php", {
        method: "POST",
        body: fordata,
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
                                <td>${element.estado}</td>
                                <td>${element.creacion}</td>
                                <td>
                                    <button type="button" class="btn btn-light">${element.id}</button>
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
            alert("Ensure you input a value in both fields!");
        } else {
            guardar_categoria();

            loginForm.reset();
        }
    });


});
