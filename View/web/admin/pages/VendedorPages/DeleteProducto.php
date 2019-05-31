<?php
include_once 'Layout/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Entidades/Producto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/DAO/categoria/DaoCategoria.php';
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Formulario Para Editar El Producto Seleccionado</h2>
        </div>
        <!-- Advanced Select -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <b>Eliminar Producto</b> : <?php echo  $this->datosVista->getNombre();?>
                            <small> Realiza Los Cambios Que Necesites</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <form action="../../../proyecto/HandleRequest/routes?ruta=producto.delete" id="frmProducto" method="post">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="hidden" value=<?php echo $this->datosVista->getId() ?> name="idProducto" />
                                            <div style="text-align: center"><button type="submit" class="btn btn-primary m-t-15 waves-effect">Eliminar</button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <div style="text-align: center"><a class="btn btn-primary m-t-15 waves-effect" href="../../../proyecto/HandleRequest/routes?ruta=vendedor.dashVendedor">Cancelar</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #END# Advanced Select -->

    </div>
</section>

<?php include_once 'Layout/footer.php'; ?>