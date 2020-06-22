<?php
//about theme info
add_action( 'admin_menu', 'bb_ecommerce_store_abouttheme' );
function bb_ecommerce_store_abouttheme() {    	
	add_theme_page( esc_html__('About Ecommerce Theme', 'bb-ecommerce-store'), esc_html__('About Ecommerce Theme', 'bb-ecommerce-store'), 'edit_theme_options', 'bb_ecommerce_store_guide', 'bb_ecommerce_store_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function bb_ecommerce_store_admin_theme_style() {
   wp_enqueue_style('bb-ecommerce-store-custom-admin-style', get_template_directory_uri() .'/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'bb_ecommerce_store_admin_theme_style');

//guidline for about theme
function bb_ecommerce_store_mostrar_guide() {
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<div class="wrapper-info">
	 <div class="header">
	 	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/logo.png" alt="" />
		<h2><?php esc_html_e('Welcome to BB Ecommerce Theme', 'bb-ecommerce-store'); ?></h2>
 		<p><?php esc_html_e('Most of our outstanding theme is elegant, responsive, multifunctional, SEO friendly has amazing features and functionalities that make them highly demanding for designers and bloggers, who ought to excel in web development domain. Our Themeshopy has got everything that an individual and group need to be successful in their venture.', 'bb-ecommerce-store'); ?></p>
		<div class="main-button">
			<a href="<?php echo esc_url( BB_ECOMMERCE_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'bb-ecommerce-store'); ?></a>
			<a href="<?php echo esc_url( BB_ECOMMERCE_STORE_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'bb-ecommerce-store'); ?></a>
			<a href="<?php echo esc_url( BB_ECOMMERCE_STORE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'bb-ecommerce-store'); ?></a>
		</div>
	</div>
	<div class="button-bg">
	<button role="tab" class="tablink" onclick="openPage('Home', this, '')"><?php esc_html_e('Lite Theme Setup', 'bb-ecommerce-store'); ?></button>
	<button role="tab" class="tablink" onclick="openPage('Contact', this, '')"><?php esc_html_e('Premium Theme info', 'bb-ecommerce-store'); ?></button>
	</div>
	<div id="Home" class="tabcontent tab1">
	  	<h3><?php esc_html_e('How to set up homepage', 'bb-ecommerce-store'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( BB_ECOMMERCE_STORE_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'bb-ecommerce-store'); ?></a>
			<a href="<?php echo esc_url( BB_ECOMMERCE_STORE_CONTACT ); ?>"><?php esc_html_e('Support', 'bb-ecommerce-store'); ?></a>
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Start Customizing', 'bb-ecommerce-store'); ?></a>
		</div>
	  	<div class="documentation">
		  	<div class="image-docs">
				<ul>
					<li> <b><?php esc_html_e('Step 1.', 'bb-ecommerce-store'); ?></b> <?php esc_html_e('Follow these instructions to setup Home page.', 'bb-ecommerce-store'); ?></li>
					<li> <b><?php esc_html_e('Step 2.', 'bb-ecommerce-store'); ?></b> <?php esc_html_e(' Create Page to set template: Go to Dashboard >> Pages >> Add New Page.Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.', 'bb-ecommerce-store'); ?></li>
				</ul>
		  	</div>
		  	<div class="doc-image">
		  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/home-page-template.png" alt="" />	
		  	</div>
		  	<div class="clearfixed">
				<div class="doc-image1">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/set-front-page.png" alt="" />	
			    </div>
			    <div class="image-docs1">
				    <ul>
						<li> <b><?php esc_html_e('Step 3.', 'bb-ecommerce-store'); ?></b> <?php esc_html_e('Set the front page: Go to Setting -> Reading --> Set the front page display static page to home page', 'bb-ecommerce-store'); ?></li>
					</ul>
			  	</div>
			</div>
		</div>
	</div>

	<div id="Contact" class="tabcontent">
	 	<h3><?php esc_html_e('Premium Theme Info', 'bb-ecommerce-store'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( BB_ECOMMERCE_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'bb-ecommerce-store'); ?></a>
			<a href="<?php echo esc_url( BB_ECOMMERCE_STORE_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'bb-ecommerce-store'); ?></a>
			<a href="<?php echo esc_url( BB_ECOMMERCE_STORE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'bb-ecommerce-store'); ?></a>
		</div>
	  	<div class="features-section">
	  		<div class="col-4">
	  			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/screenshot.jpg" alt="" />
	  			<p><?php esc_html_e( 'BB Ecommerce Store WordPress Theme is an extremely user-friendly premium Ecommerce WordPress Theme. It is a multipurpose Ecommerce WordPress theme designed to build stunning online business stores. It is very flexible and has ample of options that makes the website development swift and easy. This is the perfect solution for webmasters who want to create modern online stores with ample number of useful features along with user & mobile friendly design. It comprises of a responsive layout design with the help of its advanced customization options. Easily change the entire look of your ecommerce store, with the help of hook and child theme features. Our WordPress ecommerce store made with secure and clean code and it best ecommerce ready WordPress themes available on the web now. It is built on the Bootstrap and has valid HTML and CSS codes. It features beautiful image galleries, numerous sidebars, well-built sections, menus, etc. This certainly makes our themes one of the best WordPress woo commerce Theme available on the internet. Sell out your products and inventory with BB Ecommerce theme and leave all your competitors battered and beaten.', 'bb-ecommerce-store' ); ?></p>
	  		</div>
	  		<div class="col-4">
	  			<h4><?php esc_html_e( 'Theme Features', 'bb-ecommerce-store' ); ?></h4>
				<ul>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Theme options using customizer API', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Responsive Design', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( '100+ Font Family Options', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Slider with a Number of Slider Images Upload Option Available.', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Support to Add Custom CSS/JS', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'SEO Friendly', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Footer Customization Options', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Short Codes', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Background Image Option', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Page Templates', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Featured Product Images, HD Images and Video display', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Make Post About Firms News, Events, Achievements and So On.', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Left and Right Sidebar', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Sticky Post & Comment Threads', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Parallax Image-Background Section', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Customizable Home Page', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Full-Width Template', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'bb-ecommerce-store' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Social Media Feature', 'bb-ecommerce-store' ); ?></li>
				</ul>
			</div>
		</div>
	</div>

<script>
	function openPage(pageName,elmnt,color) {
	    var i, tabcontent, tablinks;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablink");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].style.backgroundColor = "";
	    }
	    document.getElementById(pageName).style.display = "block";
	    elmnt.style.backgroundColor = color;

	}
	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>
<?php } ?>