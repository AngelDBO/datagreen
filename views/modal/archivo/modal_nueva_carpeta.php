<div class="modal fade" id="modalNuevaCarpeta" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pb-2 pt-2">
                <h4 class="modal-title text-white" id="staticBackdropLabel"><i class="zmdi zmdi-folder-outline zmdi-hc-lg"></i> Nueva carpeta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmNuevaCarpeta" method="post" onsubmit="return crearCarpeta();" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="Nombre">Nombre carpeta</label>
                            <input type="text" class="form-control" name="nombreCarpeta" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>