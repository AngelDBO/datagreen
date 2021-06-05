<div class="modal fade" data-backdrop="static" id="registroEgreso" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Registrar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCategoria" onsubmit="return registrarCategoriaArchivo()" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="categoria" class="text-body">Nombre categoria</label>
                        <input type="text" class="form-control" name="nombreCategoria" required id="categoria">
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="text-body">Descripción</label>
                        <textarea class="form-control" rows="3" name="descripcion" id="descripcion"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm  text-white">
                            <i class='fas fa-save'></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
            <div id="errsCategoria"></div>
        </div>
    </div>
</div>