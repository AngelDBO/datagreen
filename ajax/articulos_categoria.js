let Categoria = {
    nombre: "",
    descripcion: "",
    estado: "",
    categoria_id: ""
}

let loginForm = document.getElementById("formCategoriaArticulo");

const guardar_categoria = async () => {
    let fordata = new FormData();
    fordata.append("nombre_categoria", Categoria.nombre);
    fordata.append("descripcion_categoria", Categoria.descripcion);
    fordata.append("estado_categoria", Categoria.estado);
    fordata.append("categoria_id", Categoria.categoria_id);
    fordata.append("accion", "registrar");

    await fetch('./../controllers/CategoriaArticuloController.php', {
        method: "POST",
        body: fordata
    })
        .then(data => data.json())
        .then(data => console.log(data))

}

const limpiar_campos = () => {
    Categoria.nombre = ""
    Categoria.descripcion = ""
    Categoria.estado = ""
    Categoria.categoria_id = ""
}

loginForm.addEventListener("submit", (e) => {
    e.preventDefault();

    Categoria.nombre = document.getElementById('nombre_categoria').value
    Categoria.descripcion = document.getElementById('descripcion_categoria').value
    Categoria.estado = document.getElementById('estado_categoria').value
    Categoria.categoria_id = document.getElementById('categoria_id').value

    if (Categoria.nombre == "" || Categoria.estado == "") {
        alert("Ensure you input a value in both fields!");
    } else {
        guardar_categoria();
        limpiar_campos();
        loginForm.reset();
    }
});
