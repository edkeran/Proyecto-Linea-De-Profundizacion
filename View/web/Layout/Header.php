<?php error_reporting(0); ?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Shopland | Pagina Principal</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="/../../../../<?php __DIR__?>/proyecto/View/web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="/../../../proyecto/View/web/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="/../../../proyecto/View/web/css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="/../../proyecto/View/web/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="/../../proyecto/View/web/css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->

</head>

<body>
	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center"> Ofertas Disponibles
						<i class="fas fa-shopping-cart ml-1"></i>
					</p>
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
					<?php if(isset($_SESSION['Usuario'])):?>
						<li class="text-center border-right text-white">
							<a href="#" class="text-white">
								<?php $user = $_SESSION['Usuario'];?>
								<i class="fas fa-truck mr-2"></i><?php echo($user->getNombre()); ?></a>
						</li>
					<?php endif;?>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-truck mr-2"></i>Sigue Tu Orden</a>
						</li>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 001 234 5678
						</li>

						<!--Validar Con PHP Si Existe Una Sesion En Curso-->
						<?php if(!isset($_SESSION["Usuario"])) :?>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Ingresar </a>
						</li>
						<?php endif;?>
						<!--Boton De Registro O De LogOut Segun Sea El Caso-->
						<li class="text-center text-white">
							<?php if (isset($_SESSION['Usuario'])):?>
							<a href="../../HandleRequest/routes?ruta=session.LogOut" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesion </a>
							<?php else :?>
							<a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Registrate </a>
						<?php endif; ?>
						</li>
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>

	<!-- modals -->
	<!-- Modal Del Log-In -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Ingresa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../../HandleRequest/routes?ruta=registrar.loginUsuario" method="post">
						<div class="form-group">
							<label class="col-form-label">Nombre De Usuario</label>
							<input type="text" maxlength="20" class="form-control" placeholder="Usuario" name="usr" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Contraseña</label>
							<input type="password" class="form-control" placeholder="password" maxlength="20" name="pswd" required pattern="[A-Za-z0-9]+">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Ingresar">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">Recordarme?</label>
							</div>
						</div>
						<p class="text-center dont-do mt-3">No Tienes Una Cuenta?
							<a href="#" data-toggle="modal" data-target="#exampleModal2">
								Registrate ahora</a>
						</p>

						<p class="text-center dont-do mt-3">Quieres Asociarte?
							<a href="../web/admin/pages/VendedorPages/RegisterVendedor" >
								Registrarte</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Registro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../../HandleRequest/routes?ruta=registrar.register" method="post">
						<div class="form-group">
							<label class="col-form-label">Nombre :</label>
							<input type="text" class="form-control" minlength="4"  maxlength="20" placeholder="Nombre" name="nombre" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Apellido :</label>
							<input type="text" class="form-control" minlength="4"  maxlength="20" placeholder="Apellido" name="apellido" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Correo Electronico :</label>
							<input type="email" class="form-control" placeholder="E-mail" minlength="8" maxlength="40" name="correo" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Nombre De Usuario :</label>
							<input type="text" class="form-control" placeholder="Nombre Usuario" name="nmUsr" minlength="4" maxlength="20" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Contraseña :</label>
							<input type="password" class="form-control" placeholder="Password" name="password" id="pass1" minlength="4" maxlength="20" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
						</div>
						<div class="form-group">
							<label class="col-form-label">Confirmar Contraseña :</label>
							<input type="password" class="form-control" placeholder="Password" name="confirmPass" id="pass2" minlength="4" maxlength="20" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Registrate">
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.php" class="font-weight-bold font-italic">
							<img src="/../../../proyecto/View/web/images/logo2.png" alt=" " class="img-fluid">Shopland
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="../../HandleRequest/routes?ruta=producto.search" method="post">
								<input class="form-control mr-sm-2" name="cadena" type="search" placeholder="Buscar" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" type="submit">Buscar</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="#" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<?php include_once __DIR__.'/../../../Controller/categoriasController.php'; ?>
				<?php $cat = new categoriasController(); $datos = $cat->readCategorias();?>
				<div class="agileits-navi_search">
					<form action="#" method="post">
						<select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
							<?php if($datos !=  false) :?>
								<option value="">Todas Las Categorias</option>
								<?php foreach($datos as $registro):?>
									<option value="<?php echo $registro['id'];?>"><?php echo $registro['descripcion'];?></option>
								<?php endforeach;?>
							<?php else:?>
								<option value="">No Hay Categorias Disponibles<option>
							<?php endif;?>
						</select>
					</form>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.php">Pagina Principal
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="about">Sobre Nosotros</a>
						</li>
						
						<!-- <li class="nav-item">
							<a class="nav-link" href="contact.html">Contactar Vendedor</a>
						</li> -->
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
