<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-primary">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white" id="exampleModalLabel">Actualizar Anexo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmActualizarAnexo" onsubmit="return actualizarAnexo()" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="codigoAnexo" id="codigoAnexo">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="updateAnexo" name="anexoNuevo" accept=".jpg, .jpeg, .png, .pdf" onchange="fileUpdate()">
                        <label class="custom-file-label" for="customFileLang">Seleccionar anexo</label>
                    </div>
                    <small>*jpg, jpeg, png, pdf</small>
                    <div id="anexoTempUpdate" class="mt-4"></div>
                    <button type="button" class="btn btn-secondary btn-sm float-right" data-dismiss="modal"><i class="uil uil-cancel"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-upload float-right ml-2"><i class="uil uil-cloud-upload"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>