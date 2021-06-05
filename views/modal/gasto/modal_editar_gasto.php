<div class="modal fade" data-backdrop="static" id="EditarGasto" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Editar gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmActualizarGasto" onsubmit="return actualizarGasto()" method="post" autocomplete="off">
                    <input type="hidden" name="registroIDU" id="registroIDU" readonly>
                    <div class="form-group">
                        <label for="terceroGastoU" class="text-body col-form-label-sm">Tercero</label>
                        <select class="form-control form-control-sm" name="terceroGastoU" id="terceroGastoU" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="montoU" class="text-body col-form-label-sm">Monto</label>
                        <input type="text" name="montoU" class="form-control form-control-sm" id="montoU" required>
                    </div>
                    <div class="form-group">
                        <label for="medioGastoU" class="text-body col-form-label-sm">Medio de pago</label>
                        <select class="form-control form-control-sm" name="medioGastoU" id="medioGastoU" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoriaGastoU" class="text-body col-form-label-sm">Categoria</label>
                        <select class="form-control form-control-sm" name="categoriaGastoU" id="categoriaGastoU"
                            required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcionGastoU" class="text-body col-form-label-sm">Descripción</label>
                        <textarea class="form-control form-control-sm" rows="3" name="descripcionGastoU"
                            id="descripcionGastoU"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-modal  text-white">
                            <i class='fas fa-save'></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
            <div id="erroresIngreso"></div>
        </div>
    </div>
</div>