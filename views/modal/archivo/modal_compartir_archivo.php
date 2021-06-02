<div class="modal fade" id="modalCompartir" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pb-2 pt-2">
                <h5 class="modal-title text-white" id="staticBackdropLabel">Compartir archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCompartir" method="post" onsubmit="return compartir()">
                    <div class="form-group">
                        <label for="usuarioCompartir">Seleccione usuario</label>
                        <div class="input-group">
                            <input type="hidden" id="codigoArchivoCompartido" name="codigoArchivoCompartido">
                            <div class="input-group-addon">
                                <span class="zmdi zmdi-accounts-list-alt"></span>
                            </div>
                            <select id="usuarioCompartir" class="form-control" name="usuarioCompartir">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                    </div>
                    <button type="submit" class="btn btn-modal btn-sm float-right">
                        <i class="fas fa-save"></i> Compartir</button>
                </form>
            </div>
        </div>
    </div>
</div>