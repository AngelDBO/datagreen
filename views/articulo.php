<?php
session_start();
if (isset($_SESSION['session_datapagos'])) {
?>

    <?php require_once 'layouts/header.php' ?>

    <div class="page-wrapper">

        <!-- END MENU SIDEBAR-->
        <?php require_once 'layouts/menu_principal.php' ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
            <?php require_once 'layouts/menu_control.php' ?>
            <!-- MENU PRINCIPAL-->
            <?php require_once 'layouts/menu_mobile.php' ?>
            <!-- END HEADER DESKTOP-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container">
                        <div class="card">
                            <h5 class="card-header">Información</h5>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-8">
                                        <form action="be_pages_ecom_product_edit.html" method="POST" onsubmit="return false;">
                                            <div class="mb-4">
                                                <label class="form-label" for="one-ecom-product-name">Nombre</label>
                                                <input type="text" class="form-control" name="one-ecom-product-name" placeholder="Nombre del artículo">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="one-ecom-product-description-short">Descripción</label>
                                                <textarea class="form-control" name="one-ecom-product-description-short" rows="4" style="resize: none;"></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="one-ecom-product-category">Category</label>
                                                <select class="form-control" id="one-ecom-product-category" data-placeholder="Seleccione una categoría">
                                                    <option></option>
                                                    <option value="1">Cables</option>
                                                </select>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="one-ecom-product-price">Precio</label>
                                                    <input type="text" class="form-control" id="one-ecom-product-price" name="one-ecom-product-price" value="59,00">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="one-ecom-product-stock">Cantidad</label>
                                                    <input type="number" class="form-control" id="one-ecom-product-stock" name="one-ecom-product-stock" value="29">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Featured</h5>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-8">
                                        <form class="dropzone" action="be_pages_ecom_product_edit.html"></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ====================== MODALS ====================-->

    <!--JS-->
    <?php require_once 'layouts/scripts.php' ?>
    <script src="../ajax/archivo.js"></script>

<?php
} else {
    header("location:../");
}
?>