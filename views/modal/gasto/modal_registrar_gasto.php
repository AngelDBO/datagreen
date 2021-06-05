<div class="modal fade" data-backdrop="static" id="registroGasto" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-right rounded-left">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Registrar gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmGasto" onsubmit="return registrarGasto()" method="post" autocomplete="off">
                    <input type="hidden" name="IDusuario" value="1">
                    <div class="form-group">
                        <label for="terceroGasto" class="text-body col-form-label-sm">Tercero</label>
                        <select class="form-control form-control-sm" name="terceroGasto" id="terceroGasto" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="text-body col-form-label-sm">Monto</label>
                        <input type="text" name="monto" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="medioGasto" class="text-body col-form-label-sm">Medio de pago</label>
                        <select class="form-control form-control-sm" name="medioGasto" id="medioGasto" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoriaGasto" class="text-body col-form-label-sm">Categoria</label>
                        <select class="form-control form-control-sm" name="categoriaGasto" id="categoriaGasto" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcionGasto" class="text-body col-form-label-sm">Descripción</label>
                        <textarea class="form-control form-control-sm" rows="3" name="descripcionGasto"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-modal text-white">
                            <i class='fas fa-save'></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
            <div id="erroresIngreso"></div>
        </div>
    </div>
</div>