<div class="modal fade" id="modalNuevo" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pb-2 pt-2">
                <h5 class="modal-title text-white" id="staticBackdropLabel">Nuevo archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmUpload" method="post" onsubmit="return subirArchivo();" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select id="categoriaArchivo" class="form-control" name="categoriaArchivo">
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombreArchivo">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="archivo">Archivo</label>
                            <input type="file" class="form-control" id="files" onchange="file()" name="archivo">
                            <small class="form-text text-muted">
                                *pdf *xlsx *docx *img *video.
                            </small>
                        </div>
                    </div>
                    <div id="tempFile"></div>
                    <button type="submit" class="btn btn-m text-white float-right">
                        <i class="fas fa-cloud-upload-alt"></i> Subir</button>
                </form>
            </div>
        </div>
    </div>
</div>