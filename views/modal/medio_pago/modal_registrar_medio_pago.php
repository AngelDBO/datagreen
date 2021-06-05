<div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Registrar medio de pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmRegistrarPago" onsubmit="return registrarMedio()" method="post" autocomplete="off">
                    <input type="hidden" readonly name="IDusuario" value="1">
                    <div class="form-group">
                        <label for="nombreMedio" class="control-label text-body">Nuevo medio de pago</label>
                        <input type="text" class="form-control form-control-sm" name="nombreMedio">
                    </div>
                    <div>
                        <button type="submit" class="btn text-white btn-sm btn-modal">
                            <i class='fas fa-save'></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>