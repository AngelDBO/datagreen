<div class="modal fade" id="ModalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white" id="staticBackdropLabel">Actualizar estado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEstado" onsubmit="return updateEstado()" method="post">
                    <input type="hidden" name="idEstado" id="idEstado" required>
                    <div class="form-group">
                        <label for="actualizarEstado">Seleccione:</label>
                        <select class="form-control form-control-sm" name="actualizarEstado" id="actualizarEstado"
                            required>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm text-white">
                            <i class="zmdi zmdi-floppy"></i> Actualizar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="erroresEstado">
            </div>
        </div>
    </div>
</div>