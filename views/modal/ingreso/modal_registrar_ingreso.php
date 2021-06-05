<div class="modal fade" data-backdrop="static" id="registroIngreso" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-right rounded-left">
            <div class="modal-header pt-2 pb-2" style="background: #492ab3">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Registrar ingreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmIngreso" onsubmit="return registrarIngreso()" method="post" autocomplete="off">
                    <input type="hidden" name="IDusuario" value="1">
                    <div class="form-group">
                        <label for="tercero" class="text-body col-form-label-sm">Tercero</label>
                        <select class="form-control form-control-sm" name="terceroIngreso" id="terceroIngreso" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="text-body col-form-label-sm">Monto</label>
                        <input type="text" name="monto" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="medioPago" class="text-body col-form-label-sm">Medio de pago</label>
                        <select class="form-control form-control-sm" name="medioPagoIngreso" id="medioPagoIngreso"
                            required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcionIngreso" class="text-body col-form-label-sm">Descripción del
                            ingreso</label>
                        <textarea class="form-control form-control-sm" rows="3" name="descripcionIngreso"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm  text-white" style="background: #492ab3">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
            <div id="erroresIngreso"></div>
        </div>
    </div>
</div>