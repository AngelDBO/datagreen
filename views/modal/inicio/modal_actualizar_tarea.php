<div class="modal fade" id="modalEditar" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white">Crear tarea</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEditarAgenda" onsubmit="return actualizarActividad()" method="post">
                    <input type="hidden" name="IDregistro" id="IDregistro" readonly>
                    <input type="hidden" name="IDusuario" id="IDusuario" readonly>
                    <div class="form-group row">
                        <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                        <div class="col-sm-10">
                            <input type="text" name="fechaU" id="fechaU" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actividad" class="col-sm-2 col-form-label">Actividad</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control form-control-sm" name="actividadU" id="actividadU"
                                required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="periodo" class="col-sm-2 col-form-label">Periodo</label>
                        <div class="col-sm-10">
                            <select required name="periodoU" id="periodoU" class="form-control form-control-sm">
                                <option selected disabled value="">Seleccione</option>
                                <option value="1T">Primer trimestre</option>
                                <option value="2T">Segundo trimestre</option>
                                <option value="3T">Tercer trimestre</option>
                                <option value="4T">Cuarto trimestre</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="color" class="col-sm-2 col-form-label">Color</label>
                        <div class="col-sm-10">
                            <select name="colorU" class="form-control form-control-sm" id="colorU" required>
                                <option selected disabled value="">Seleccione</option>
                                <option value="btn btn-danger btn-sm">Rojo</option>
                                <option value="btn btn-warning btn-sm">Naranja</option>
                                <option value="btn btn-primary btn-sm">Azul</option>
                                <option value="btn btn-success btn-sm">Verde</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn text-white">
                                <i class="fa fa-save"></i> Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>