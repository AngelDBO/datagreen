<div class="modal fade" data-backdrop="static" id="registroEgreso" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-right rounded-left">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Registrar egreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEgreso" onsubmit="return registrarEgreso()" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="nombreTercero" id="nombreTercero">
                    <div class="form-group">
                        <label for="tercero" class="text-body col-form-label-sm">Tercero</label>
                        <select class="form-control form-control-sm" name="terceroEgreso" id="terceroEgreso" onchange="obtenerNombreTercero()" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoria_egreso" class="text-body col-form-label-sm">Categoria</label>
                        <select class="form-control form-control-sm" name="categoria_egreso" id="categoria_egreso" required>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="monto" class="text-body col-form-label-sm">Monto</label>
                            <input type="text" name="monto" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="medioPago" class="text-body col-form-label-sm">Medio de pago</label>
                            <select class="form-control form-control-sm" name="medioPagoEgreso" id="medioPagoEgreso"
                                required>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="descripcionEgreso" class="text-body col-form-label-sm">Descripción del
                                egreso</label>
                            <textarea class="form-control form-control-sm" rows="3"
                                name="descripcionEgreso"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="medioPago" class="text-body col-form-label-sm">Anexo</label>
                            <input type="file" class="form-control form-control-sm" name="anexoEgreso" captureh>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm  text-white">
                            <i class="uil uil-save"></i> Guardar
                        </button>
                    </div>
                    <div class="form-group mt-2">
                        <div id="erroresEgreso"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>