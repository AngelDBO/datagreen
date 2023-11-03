<div class="modal fade" id="modalNuevo" data-backdrop="static" tabindex="-1" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white">Registrar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmRegistroUsuario" onsubmit="return registrarUsuario()" method="post" autocomplete="off">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Nombre" class="text-body col-form-label-sm">Nombre</label>
                            <input type="text" class="form-control " id="Nombre" name="nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Apellido" class="text-body col-form-label-sm">Apellido</label>
                            <input type="text" class="form-control " id="Apellido" name="apellido" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Usuario" class="text-body col-form-label-sm">Usuario</label>
                            <input type="text" class="form-control " id="Usuario" name="usuario" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="text-body col-form-label-sm">Contraseña</label>
                            <input type="password" class="form-control " id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Correo" class="text-body col-form-label-sm">Correo</label>
                        <input type="email" class="form-control " id="Correo" name="correo" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Rol" class="text-body col-form-label-sm">Rol</label>
                            <select id="Rol" class="form-control " name="rol" required>
                                <option value="" selected>Seleccione</option>
                                <option value="Auxiliar">Auxiliar</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Estado" class="text-body col-form-label-sm">Estado</label>
                            <select id="Estado" class="form-control " name="estado">
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn text-white btn-modal">
                            <i class='uil-cloud-check'></i> Guardar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>