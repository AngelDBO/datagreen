<div class="modal fade" data-backdrop="static" id="modal_categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h4 class="modal-title text-white">Registro Terceros</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <form method="POST" id="formCategoriaArticulo">
                            <input type="text" id="categoria_id">
                            <div class="mb-4">
                                <label class="form-label" for="one-ecom-product-name">Nombre</label>
                                <input type="text" class="form-control" id="nombre_categoria" placeholder="Nombre categoría" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="descripcion_categoria">Descripción</label>
                                <textarea class="form-control" id="descripcion_categoria" rows="4" style="resize: none;"></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-ecom-product-category">Estado</label>
                                <select class="form-control" id="estado_categoria" required>
                                    <option value="A" selected>Activa</option>
                                    <option value="I">Inactivo</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>