<div class="modal fade" id="modalAgregarAnexo" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h5 class="modal-title text-white" id="exampleModalLabel">Agregar anexo</h5>
                <button type="button" class="close" data-dismiss="modal" id="btn-close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmAddAnexo" onsubmit="return agregarAnexo()" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="agregarAnexoEgreso" name="codigoAnexoEgreso" readonly>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input form-control form-control-sm" name="anexo">
                        <label class="custom-file-label" for="customFile">Seleccione archivo</label>
                    </div>
                    <div id="tempFile" class="mt-4"></div>
                    <button type="submit" class="btn btn-upload btn-sm float-right"><i class="uil uil-cloud-upload"></i>
                        Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>