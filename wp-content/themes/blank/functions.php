<?php
/**
@ Thiết lập các hằng dữ liệu quan trọng
@ THEME_URL = get_stylesheet_directory() - đường dẫn tới thư mục theme
@ CORE = thư mục /core của theme, chứa các file nguồn quan trọng.
 **/
define( 'THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . '/core' );

/**
@ Load file /core/init.php
@ Đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này.
 **/

require_once( CORE . '/init.php' );

/**
@ Thiết lập các chức năng sẽ được theme hỗ trợ
 **/
if ( ! function_exists( 'blank_theme_setup' ) ) {
	/*
	 * Nếu chưa có hàm blank_theme_setup() thì sẽ tạo mới hàm đó
	 */
	function blank_theme_setup() {
		/*
		* Tự chèn RSS Feed links trong <head>
		*/
		add_theme_support( 'automatic-feed-links' );

		/*
		* Thêm chức năng post thumbnail
		*/
		add_theme_support( 'post-thumbnails' );

		/*
		* Thêm chức năng title-tag để tự thêm <title>
		*/
		add_theme_support( 'title-tag' );

		/*
		 * Thêm chức năng post format
		 */
		add_theme_support( 'post-formats',
			array(
				'video',
				'image',
				'audio',
				'gallery'
			)
		);

		/*
		 * Thêm chức năng custom background
		 */
		$default_background = array(
			'default-color' => '#e8e8e8',
		);
		add_theme_support( 'custom-background', $default_background );

		/*
		 * Tạo menu cho theme
		 */
		register_nav_menu ( 'primary-menu', __('Primary Menu', 'acv') );

		/*
		 * Tạo sidebar cho theme
		 */
		$sidebar = array(
			'name' => __('Main Sidebar', 'acv'),
			'id' => 'main-sidebar',
			'description' => 'Main sidebar for ACV theme',
			'class' => 'main-sidebar',
			'before_title' => '<h3 class="widgettitle">',
			'after_sidebar' => '</h3>'
		);
		register_sidebar( $sidebar );
	}
	add_action ( 'init', 'blank_theme_setup' );

}

/**
@ Thiết lập hàm hiển thị logo
@ blank_logo()
 **/
if ( ! function_exists( 'blank_logo' ) ) {
	function blank_logo() {?>
		<?php
		global $tp_options;

		if( $tp_options['logo-on'] == 1 ) :
		?>
		<a href="/"><img src="<?php echo $tp_options['logo-image']['url']; ?>" class="img-responsive" alt=""/></a>
		<?php endif; ?>
	<?php }
}

/**
@ Thiết lập hàm hiển thị footer text
@ blank_footer_text()
 **/
if ( ! function_exists( 'blank_footer_text' ) ) {
	function blank_footer_text() {?>
		<?php
		global $tp_options;

		if( $tp_options['footer-text'] != '' ) :
		?>
		<p class="text-center"><?php echo $tp_options['footer-text']; ?></p>
		<?php endif; ?>
	<?php }
}

/**
@ Thiết lập hàm hiển thị menu
@ blank_menu( $slug )
 **/
if ( ! function_exists( 'blank_menu' ) ) {
	function blank_menu( $slug ) {
		$menu = array(
			'theme_location' => $slug,
			'menu_id' => '',
			'menu_class' => 'list-top',
		);
		wp_nav_menu( $menu );
	}
}

/**
@ Chèn CSS và Javascript vào theme
@ sử dụng hook wp_enqueue_scripts() để hiển thị nó ra ngoài front-end
 **/
function blank_styles() {
	/*
	 * Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
	 * Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
	 */

	/* CSS */
	wp_register_style( 'bootstrap-style', get_template_directory_uri() . '/css/common/bootstrap.min.css', 'all' );
	wp_enqueue_style( 'bootstrap-style' );

    wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/common/bootstrap.min.css', 'all' );
    wp_enqueue_style( 'font-awesome' );

	wp_register_style( 'main-style', get_template_directory_uri() . '/css/layout.css', 'all' );
	wp_enqueue_style( 'main-style' );

	wp_register_style( 'slider-basic-style', get_template_directory_uri() . '/css/slide-basic.css', 'all' );
	wp_enqueue_style( 'slider-basic-style' );

	wp_register_style( 'animate-style', get_template_directory_uri() . '/css/common/animate.css', 'all' );
	wp_enqueue_style( 'animate-style' );

	/* JS */
	wp_register_script( 'jquery-js', get_template_directory_uri() . '/js/common/jquery-1.12.3.min.js', 'all' );
	wp_enqueue_script( 'jquery-js' );

	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/common/bootstrap.min.js', 'all' );
	wp_enqueue_script( 'bootstrap-js' );

	wp_register_script( 'toggle-nav-js', get_template_directory_uri() . '/js/layout/script.js', 'all' );
	wp_enqueue_script( 'toggle-nav-js' );

	wp_register_script( 'slider-basic-js', get_template_directory_uri() . '/js/slider-basic/script.js', 'all' );
	wp_enqueue_script( 'slider-basic-js' );
}
add_action( 'wp_enqueue_scripts', 'blank_styles' );

//Khởi tạo function cho shortcode slider
function create_shortcode_slider ( $post_type, $post_status = 'publish' ) {?>
	<div class="container-fluid">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol id="carousel-indicators" class="carousel-indicators">
			</ol>

			<!-- Wrapper for slides -->
			<div id="carousel-inner" class="carousel-inner" role="listbox">

				<?php
				$query = new WP_Query ( array (
					'post_type' => $post_type,
					'post_status' => $post_status,
				) );

				if ($query->have_posts ()) :
					while ( $query->have_posts () ) :
						$query->the_post ();
				?>

					<div class="item <?php if ($query->current_post == 0) {echo 'active'; } ?>">
						<?php
						the_post_thumbnail('', array('class' => 'img-slider'));
						?>
					</div>

					<?php endwhile; ?>
				<?php endif; ?>

			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left fa fa-arrow-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right fa fa-arrow-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<?php
}

//Tạo shortcode tên là [test_shortcode] và sẽ thực thi code từ function create_shortcode
add_shortcode( 'slider_shortcode', 'create_shortcode_slider' );
?>