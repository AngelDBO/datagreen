<div class="modal fade" data-backdrop="static" id="modalEditar" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Editar pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmPagoUpdate" onsubmit="return ActualizarPago()" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="nombreTerceroU" name="NombreTerceroU" readonly>
                    <input type="hidden" id="TerceroUpdate" name="idRegistro" readonly>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tercero">Tercero</label>
                            <select class="form-control form-control-sm" name="terceroU" id="terceroU">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mes">Mes de pago</label>
                            <select class="form-control form-control-sm" name="mesU" id="mesU">
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="monto">Monto</label>
                            <input type="text" class="form-control form-control-sm" id="montoU" name="montoU">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="medioPago">Medio de pago</label>
                            <select class="form-control form-control-sm" id="medioPagoU" name="medioPagoU"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fechaPago">Fecha de pago</label>
                            <input type="date" class="form-control form-control-sm" id="fechaPagoU" name="fechaPagoU">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="comprobante">Comprobante</label>
                            <input accept="image/*" type="file" class="form-control form-control-sm" id="comprobante"
                                name="comprobanteU">
                            <input type="hidden" id="comprobanteU" name="comprobanteU" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control form-control-sm" name="descripcionU" rows="3"
                                id="descripcionU"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm text-white btm-modal">
                        <i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
            <div class="modal-footer" id="erroresPago">
            </div>
        </div>
    </div>
</div>