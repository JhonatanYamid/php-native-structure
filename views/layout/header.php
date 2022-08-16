<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>SuperOfertas</title>
		<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
		<link rel="stylesheet" href="<?=base_url?>assets/bootstrap/dist/css/bootstrap.min.css" />
		<script src="<?=base_url?>assets/js/jquery.min.js"></script>
		<script src="<?=base_url?>helpers/main.js"></script>
		<script src="<?=base_url?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
	</head>
	<body>
			<!-- MENU -->
			<?php $categorias = Utils::showCategorias(); ?>
			<div class="navbar navbar-expand-lg navbar-light bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<div id="logo">
				<img src="<?=base_url?>assets/img/oferta.jpg" alt="Ofertas Logo" />
				<a href="<?=base_url?>">
					Super ofertas
				</a>
			</div>
				<ul class="navbar-nav mr-auto">
				<?php if(@$_SESSION['admin']):?>
					<li class="nav-item dropdown ml-5">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
							Gestión
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?=base_url?>categoria/index">Gestionar categorias</a>
							<a class="dropdown-item" href="<?=base_url?>producto/gestion">Gestionar productos</a>
							<a class="dropdown-item" href="<?=base_url?>venta/gestion">Gestionar pedidos</a>
        				</div>
					</li>
				<?php endif; ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color: white;">
							Categorias
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: white;">
				<?php while($cat = $categorias->fetch_object()):?>
							<a class="dropdown-item" href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
				<?php endwhile; ?>
						</div>
					</li>
				<?php if(!isset($_SESSION['identity'])): ?>
						<li class="nav-item mr-sm-5"><a class="nav-link" href="<?=base_url?>usuario/registro" style="color: white;">Ingresar</a></li>
				<?php endif; ?>
					</ul>
				</div>
				<div class="dropdown my-2 my-lg-0">
					<div style="color: white;" class="dropdown-toggle mr-sm-5" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-carrito" src="<?=base_url?>assets/img/carrito.jpg"></div>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<?php $stats = Utils::statsCarrito();?>
						<a class="dropdown-item" href="<?=base_url?>carrito/index">Productos (<?=$stats['count']?>)</a>
						<a class="dropdown-item" href="<?=base_url?>carrito/index">Total: <?=$stats['total']?> $</a>
						<a class="dropdown-item" href="<?=base_url?>carrito/index">Ver el carrito</a>
					</div>
				</div>
				<?php if(isset($_SESSION['identity'])):?>
				<div class="dropdown my-2 my-lg-0">
					<div style="color: white;" class="dropdown-toggle mr-sm-5" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<h5><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellido?></h5></div>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?=base_url?>venta/mis_pedidos">Mis pedidos</a>
						<a class="dropdown-item" href="<?=base_url?>usuario/logout">Cerrar sesión</a>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="container">