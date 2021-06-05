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
                <form id="frmIngreso" onsubmit="return registrarEgreso()" method="post" autocomplete="off">
                    <input type="hidden" name="IDusuario" value="1">
                    <div class="form-group">
                        <label for="tercero" class="text-body col-form-label-sm">Tercero</label>
                        <select class="form-control form-control-sm" name="terceroEgreso" id="terceroEgreso" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="text-body col-form-label-sm">Monto</label>
                        <input type="text" name="monto" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="medioPago" class="text-body col-form-label-sm">Medio de pago</label>
                        <select class="form-control form-control-sm" name="medioPagoEgreso" id="medioPagoEgreso"
                            required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcionIngreso" class="text-body col-form-label-sm">Descripción del
                            ingreso</label>
                        <textarea class="form-control form-control-sm" rows="3" name="descripcionIngreso"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm  text-white">
                            <i class='fas fa-save'></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
            <div id="erroresEgreso"></div>
        </div>
    </div>
</div>