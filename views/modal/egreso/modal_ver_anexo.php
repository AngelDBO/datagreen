<div class="modal fade" data-backdrop="static" id="modalAnexoEgreso" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header pt-2 text-white pb-2">
                <h5 class="modal-title text-white">Ver comprobante egreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="AnexoEgreso"></div>
            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-upload btn-sm">
                        <button type="button" id="IDAnexoActualizar" class="text-white" data-toggle="modal" data-target="#exampleModal" onclick="modificarAnexo()"><i class="uil uil-camera-change"></i> Cambiar</button>
                    </label>
                    <label class="btn btn-delete btn-sm ml-2">
                        <button type="button" id="IDAnexoRemover" class="text-white" onclick="eliminarAnexo()"><i class="uil uil-trash-alt"></i> Remover</button>
                    </label>
                    <label class="btn btn-secondary btn-sm ml-2">
                        <button type="button" class="text-white" data-dismiss="modal"><i class="uil uil-cancel"></i> Cancelar</button>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>