<div class="modal fade" id="modalEditarPassword" tabindex="-1" data-backdrop="static"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white">Actualizar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmActualizarPassword" onsubmit="return actualizarPassword()" method="post">
                    <input type="hidden" readonly="" id="IDregistroPassword" name="IDregistroPassword">
                    <div class="form-group">
                        <label>Nueva contraseña</label>
                        <input type="password" class="form-control form-control-sm" name="passwordU" required>
                    </div>
                    <button type="submit" class="btn btn-sm text-white btn-modal">
                        <i class='fas fa-save'></i> Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>