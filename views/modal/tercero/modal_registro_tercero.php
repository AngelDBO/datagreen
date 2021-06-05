<div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h4 class="modal-title text-white">Registro Terceros</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmTercero" onsubmit="return registrarTercero()" method="post" autocomplete="off">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="identificacion" class="text-body col-form-label-sm">Identificacion</label>
                            <select class="form-control form-control-sm" name="identificacion">
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
                            <label for="numero" class="text-body col-form-label-sm">Numero</label>
                            <input type="text" class="form-control form-control-sm" name="numero">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="empresa" class="text-body col-form-label-sm">Empresa</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" name="empresa"
                                    value="La romana">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="representante" class="text-body col-form-label-sm">Representante</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" name="representante"
                                    value="Angel">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            <label for="tipoNegocio" class="text-body col-form-label-sm">Tipo Negocio</label>
                            <input type="text" class="form-control form-control-sm" name="tipoNegocio" value="Farmacia">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="correo" class="text-body col-form-label-sm">Correo</label>
                            <input type="text" class="form-control form-control-sm" name="correo" value="a@hotmail.com">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="web" class="text-body col-form-label-sm">Web</label>
                            <input type="text" class="form-control form-control-sm" name="web"
                                value="https://www.minv.co/minvs/minv/view/login.php">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            <label for="tipoNegocio" class="text-body col-form-label-sm">Factura Electrónico</label>
                            <select name="facturaElectronico" class="form-control form-control-sm">
                                <option value="" disabled></option>
                                <option value="Si" selected>Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="correo" class="text-body col-form-label-sm">Direccion</label>
                            <input type="text" class="form-control form-control-sm" name="direccion" value="cd 33-34-3">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="telefono1" class="text-body col-form-label-sm">Telefono 1</label>
                            <input type="text" class="form-control form-control-sm" name="telefono1" value="7899090">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            <label for="telefono2" class="text-body col-form-label-sm">Telefono 2</label>
                            <input type="text" class="form-control form-control-sm" name="telefono2" value="7806060">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="celular1" class="text-body col-form-label-sm">Celular 1</label>
                            <input type="text" class="form-control form-control-sm" name="celular1" value="3217899090">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="celular2" class="text-body col-form-label-sm">Celular 2</label>
                            <input type="text" class="form-control form-control-sm" name="celular2" value="3007899090">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            <label for="departamento" class="text-body col-form-label-sm">Departamento</label>
                            <select class="form-control form-control-sm" name="departamento" id="departamento"
                                onchange="listarMunicipio(this);"></select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="municipio" class="text-body col-form-label-sm">Municipio</label>
                            <select class="form-control form-control-sm" name="municipio" id="municipio"></select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="cuenta" class="text-body col-form-label-sm">Cuentas</label>
                            <input type="number" class="form-control form-control-sm" name="cuenta" value="2">
                        </div>
                        <input type="hidden" class="form-control" name="usuario" readonly value="1">
                    </div>
                    <div class="form-row pt-2">
                        <button class="btn ml-1 btn-sm text-white" type="submit">
                            <i class="zmdi zmdi-floppy"></i> Registrar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer" id="errores">
            </div>
        </div>
    </div>
</div>