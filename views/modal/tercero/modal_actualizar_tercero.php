<div class="modal fade" id="ModalUpdate" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h4 class="modal-title text-white">Actualizar Tercero</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmTerceroUpdate" onsubmit="return actualizarTercero()" method="post" autocomplete="off">
                    <div class="form-row">
                        <input type="hidden" readonly="" name="idU" id="idU">
                        <div class="col-md-6">
                            <label for="identificacionU" class="text-body col-form-label-sm">Identificacion</label>
                            <select class="form-control form-control-sm" name="identificacionU" id="identificacionU">
                                <option disabled selected value=""></option>
                                <option value="NIT">NIT</option>
                                <option value="CC">Cedula</option>
                                <option value="NUIP">Numero Unico de Identificacion Personal</option>
                                <option value="RC">Registro Civil</option>
                                <option value="PP">Pasaporte</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="TE">Tarjeta Extranjera</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="numeroU" class="text-body col-form-label-sm">Numero</label>
                            <input type="text" class="form-control form-control-sm" name="numeroU" id="numeroU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="Empresa" class="text-body col-form-label-sm">Empresa</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" name="empresaU" id="empresaU">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="Representante" class="text-body col-form-label-sm">Representante</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" name="representanteU"
                                    id="representanteU">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            <label for="tipoNegocioU" class="text-body col-form-label-sm">Tipo Negocio</label>
                            <input type="text" class="form-control form-control-sm" name="tipoNegocioU"
                                id="tipoNegocioU">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="correoU" class="text-body col-form-label-sm">Correo</label>
                            <input type="text" class="form-control form-control-sm" name="correoU" id="correoU">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="WebU" class="text-body col-form-label-sm">Web</label>
                            <input type="" class="form-control form-control-sm" name="webU" id="webU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            <label for="facturaElectronico" class="text-body col-form-label-sm">Factura
                                Electrónico</label>
                            <select name="facturaElectronicoU" class="form-control form-control-sm"
                                id="facturaElectronicoU">
                                <option value="" disabled></option>
                                <option value="Si" selected>Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="direccionU" class="text-body col-form-label-sm">Direccion</label>
                            <input type="text" class="form-control form-control-sm" name="direccionU" id="direccionU">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="telefono1U" class="text-body col-form-label-sm">Telefono 1</label>
                            <input type="text" class="form-control form-control-sm" name="telefono1U" id="telefono1U">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            <label for="telefono2U" class="text-body col-form-label-sm">Telefono 2</label>
                            <input type="text" class="form-control form-control-sm" name="telefono2U" id="telefono2U">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="celular1" class="text-body col-form-label-sm">Celular 1</label>
                            <input type="text" class="form-control form-control-sm" name="celular1U" id="celular1U">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="celular2" class="text-body col-form-label-sm">Celular 2</label>
                            <input type="text" class="form-control form-control-sm" name="celular2U" id="celular2U">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            <label for="departamento" class="text-body col-form-label-sm">Departamento</label>
                            <input type="text" class="form-control form-control-sm" name="departamentoU"
                                id="departamentoU">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="municipio" class="text-body col-form-label-sm">Municipio</label>
                            <input type="text" class="form-control form-control-sm" name="municipioU" id="municipioU">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="cuenta" class="text-body col-form-label-sm">Cuentas</label>
                            <input type="number" class="form-control form-control-sm" name="cuentaU" id="cuentaU">
                        </div>
                        <input type="hidden" class="form-control" name="usuario" readonly value="1">
                    </div>
                    <div class="form-row pt-2">
                        <div class="col-md-4">
                            <button class="btn btn-sm text-white" type="submit">
                                <i class="zmdi zmdi-floppy"></i> Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer" id="erroresEdit">
            </div>
        </div>
    </div>
</div>