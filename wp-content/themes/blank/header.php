<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> > <!--Thêm class tượng trưng cho mỗi trang lên <body> để tùy biến-->
<!--Menu of mobile and tablet-->
<nav class="main-canvas">
	<div class="content-menu">
		<!--Logo-->
		<div class="logo-brand">
            <?php blank_logo(); ?>
		</div>
		<!--End Logo-->

		<!--Menus-->
		<div class="top-nav">
			<?php blank_menu( 'primary-menu' ); ?>
		</div>
		<!--End Menus-->
	</div>
</nav>
<!--End Menu of mobile and tablet-->

<!--Menu of PC-->
<nav class="main-nav main-animation">
	<div class="container-fluid main-animation">

		<!--Button toggle-->
		<div class="toggleNav main-animation">
			<img class="icon-toggle-nav main-animation" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/layout/toggle_nav.png" class="img-responsive" alt="">
		</div>
		<!--End button toggle-->

		<!--Logo-->
		<div class="logo-brand main-animation">
			<?php blank_logo(); ?>
		</div>
		<!--End Logo-->

		<!--Menus-->
		<div class="top-nav main-animation">
			<?php blank_menu( 'primary-menu' ); ?>
		</div>
		<!--End Menus-->
	</div>
</nav>
<!--End Menu of PC-->

<div class="content-canvas">