<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmgp.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> > <!--Thêm class tượng trưng cho mỗi trang lên <body> để tùy biến-->
<!--Menu of mobile and tablet-->
<nav class="main-canvas">
	<div class="content-menu">
		<?php blank_logo(); ?>
		<?php blank_menu( 'primary-menu' ); ?>

		<!--Logo-->
		<div class="logo-brand">
			<a href="#">
				<img src="http://atmarkcafe.org/wp-content/themes/acv/images/logo.png" class="img-responsive" alt="">
			</a>
		</div>
		<!--End Logo-->

		<!--Menus-->
		<div class="top-nav">
			<ul id="menu-about" class="list-top">
				<li id="menu-item-231" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-231"><a href="/">HOME</a></li>
				<li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-43"><a href="#">ABOUT</a></li>
				<li id="menu-item-50" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="#">CONTACT</a></li>
			</ul>
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
			<img class="icon-toggle-nav main-animation" src="images/toggle_nav.png" class="img-responsive" alt="">
		</div>
		<!--End button toggle-->

		<!--Logo-->
		<div class="logo-brand main-animation">
			<a href="#">
				<img src="http://atmarkcafe.org/wp-content/themes/acv/images/logo.png" class="img-responsive" alt="">
			</a>
		</div>
		<!--End Logo-->

		<!--Menus-->
		<div class="top-nav main-animation">
			<ul id="menu-about-1" class="list-top">
				<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-231"><a href="/">HOME</a></li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-43"><a href="#">ABOUT</a></li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="#">CONTACT</a></li>
			</ul>
		</div>
		<!--End Menus-->
	</div>
</nav>
<!--End Menu of PC-->

<div class="content-canvas">