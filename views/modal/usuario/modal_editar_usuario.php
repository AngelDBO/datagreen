<div class="modal fade" id="modalEditar" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white">Registrar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmActualizarUsuario" onsubmit="return actualizarUsuario()" method="post" autocomplete="off">
                    <input type="hidden" id="IDregistro" name="IDregistro" readonly="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Nombre" class="text-body col-form-label-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm" id="nombreU" name="nombreU">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Apellido" class="text-body col-form-label-sm">Apellido</label>
                            <input type="text" class="form-control form-control-sm" id="apellidoU" name="apellidoU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Usuario" class="text-body col-form-label-sm">Usuario</label>
                            <input type="text" class="form-control form-control-sm" id="usuarioU" name="usuarioU">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Correo" class="text-body col-form-label-sm">Correo</label>
                            <input type="email" class="form-control form-control-sm" name="correoU" id="correoU">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Rol" class="text-body col-form-label-sm">Rol</label>
                            <select class="form-control form-control-sm" name="rolU" id="rolU">
                                <option value="Auxiliar" selected>Auxiliar</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Estado" class="text-body col-form-label-sm">Estado</label>
                            <select class="form-control form-control-sm" name="estadoU" id="estadoU">
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm text-white btn-modal">
                        <i class='fas fa-save'></i> Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>