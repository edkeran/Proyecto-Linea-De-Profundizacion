<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Entidades/Usuario.php'; ?>
<?php session_start(); ?>
<?php include_once 'Layout/Header.php'; ?>
<?php include_once  $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Controller/productoController.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Entidades/Producto.php';
$productoControll = new productoController();
$lstProductosDestacados = $this->datosVista;
setlocale(LC_MONETARY, "es_CO.UTF-8");
?>
<!-- banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item item1 active">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>Get flat
                            <span>10%</span> Cashback</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">The
                            <span>Big</span>
                            Sale
                        </h3>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item item2">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>advanced
                            <span>Wireless</span> earbuds</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
                            <span>Headphone</span>
                        </h3>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item item3">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>Get flat
                            <span>10%</span> Cashback</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">New
                            <span>Standard</span>
                        </h3>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item item4">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>Get Now
                            <span>40%</span> Discount</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Today
                            <span>Discount</span>
                        </h3>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>N</span>uestros
            <span>N</span>uevos
            <span>P</span>roductos</h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                        <h3 class="heading-tittle text-center font-italic">Productos Destacados</h3>
                        <div class="row">
                            <?php foreach ($lstProductosDestacados as $valor) : ?>
                                <div class="col-md-4 product-men mt-5">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img src=<?php echo '/proyecto/ImagenesCargadas/' . $valor->getImagen(); ?> width="33.3%" height="200px" alt="">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href=<?php echo "single?prodId=".$valor->getId(); ?> class="link-product-add-cart">Mas Info</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <h4 class="pt-1">
                                                <a href="single"><?php echo $valor->getNombre() ?></a>
                                            </h4>
                                            <div class="info-product-price my-2">
                                                <span class="item_price">$<?php echo number_format($valor->getPrecio(), 0) ?></span>
                                                <del>$<?php echo number_format($valor->getPrecio() + $valor->getPrecio() * 0.10, 0); ?></del>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="business" value=" " />
                                                        <input type="hidden" name="item_name" value="<?php echo $valor->getNombre() ?>" />
                                                        <input type="hidden" name="amount" value="<?php echo $valor->getPrecio() + $valor->getPrecio() * 0.10 ?>" />
                                                        <input type="hidden" name="discount_amount" value="<?php echo $valor->getPrecio() * 0.10 ?>" />
                                                        <input type="hidden" name="currency_code" value="COP" />
                                                        <input type="hidden" name="return" value=" " />
                                                        <input type="hidden" name="cancel_return" value=" " />
                                                        <input type="submit" name="submit" value="Añadir Al Carrito" class="button btn" />
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- //first section -->
                </div>
            </div>
            <!-- //product left -->

            <!-- product right -->
            <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                <div class="side-bar p-sm-4 p-3">
                    <div class="search-hotel border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Search Here..</h3>
                        <form action="#" method="post">
                            <input type="search" placeholder="Product name..." name="search" required="">
                            <input type="submit" value=" ">
                        </form>
                    </div>
                    <!-- price -->
                    <div class="range border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Price</h3>
                        <div class="w3l-range">
                            <ul>
                                <li>
                                    <a href="#">Under $1,000</a>
                                </li>
                                <li class="my-1">
                                    <a href="#">$1,000 - $5,000</a>
                                </li>
                                <li>
                                    <a href="#">$5,000 - $10,000</a>
                                </li>
                                <li class="my-1">
                                    <a href="#">$10,000 - $20,000</a>
                                </li>
                                <li>
                                    <a href="#">$20,000 $30,000</a>
                                </li>
                                <li class="mt-1">
                                    <a href="#">Over $30,000</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //price -->
                    <!-- discounts -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Discount</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">5% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">10% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">20% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">30% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">50% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">60% or More</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //discounts -->
                    <!-- reviews -->
                    <div class="customer-rev border-bottom left-side py-2">
                        <h3 class="agileits-sear-head mb-3">Customer Review</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>5.0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>4.0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half"></i>
                                    <span>3.5</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>3.0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half"></i>
                                    <span>2.5</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- //reviews -->
                    <!-- electronics -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Electronics</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Accessories</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Cameras & Photography</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Car & Vehicle Electronics</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Computers & Accessories</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">GPS & Accessories</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Headphones</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Home Audio</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Home Theater, TV & Video</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Mobiles & Accessories</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Portable Media Players</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Tablets</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Telephones & Accessories</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Wearable Technology</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //electronics -->
                    <!-- delivery -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Cash On Delivery</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Eligible for Cash On Delivery</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //delivery -->
                    <!-- arrivals -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">New Arrivals</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Last 30 days</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Last 90 days</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //arrivals -->
                    <!-- best seller -->
                    <div class="f-grid py-2">
                        <h3 class="agileits-sear-head mb-3">Best Seller</h3>
                        <div class="box-scroll">
                            <div class="scroll">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                        <img src="images/k1.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                        <a href="">Samsung Galaxy On7 Prime (Gold, 4GB RAM + 64GB Memory)</a>
                                        <a href="" class="price-mar mt-2">$12,990.00</a>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                        <img src="images/k2.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                        <a href="">Haier 195 L 4 Star Direct-Cool Single Door Refrigerator</a>
                                        <a href="" class="price-mar mt-2">$12,499.00</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                        <img src="images/k3.jpg" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                        <a href="">Ambrane 13000 mAh Power Bank (P-1310 Premium)</a>
                                        <a href="" class="price-mar mt-2">$1,199.00 </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //best seller -->
                </div>
                <!-- //product right -->
            </div>
        </div>
    </div>
</div>
<!-- //top products -->

<!-- middle section -->
<div class="join-w3l1 py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <div class="row">
            <div class="col-lg-6">
                <div class="join-agile text-left p-4">
                    <div class="row">
                        <div class="col-sm-7 offer-name">
                            <h6>Smooth, Rich & Loud Audio</h6>
                            <h4 class="mt-2 mb-3">Branded Headphones</h4>
                            <p>Sale up to 25% off all in store</p>
                        </div>
                        <div class="col-sm-5 offerimg-w3l">
                            <img src="images/off1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-5">
                <div class="join-agile text-left p-4">
                    <div class="row ">
                        <div class="col-sm-7 offer-name">
                            <h6>A Bigger Phone</h6>
                            <h4 class="mt-2 mb-3">Smart Phones 5</h4>
                            <p>Free shipping order over $100</p>
                        </div>
                        <div class="col-sm-5 offerimg-w3l">
                            <img src="images/off2.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['msg'])) {
    echo '<script>alert("' . $_SESSION['msg'] . '");</script>';
} ?>
<?php unset($_SESSION['msg']); ?>
<!-- middle section -->
<?php include 'Layout/Footer.php'; ?>