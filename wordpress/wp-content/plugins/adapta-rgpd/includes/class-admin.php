<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package ARGPD
 * @subpackage Admin
 * @since 0.0.0
 *
 * @author César Maeso <info@superadmin.es>
 *
 * @copyright (c) 2018, César Maeso (https://superadmin.es)
 */

/**
 * Admin class.
 *
 * @since  0.0.0
 */
class ARGPD_Admin {

	/**
	 * Parent plugin class.
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $plugin = null;

	/**
	 * Plugin title
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $title = 'Adapta RGPD';

	/**
	 * Plugin menu title
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $menu_title = 'Adapta RGPD';

	/**
	 * This is the key
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $key = 'argpd';

	/**
	 * Constructor.
	 *
	 * @since  0.0.0
	 *
	 * @param string $plugin Main plugin object.
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since  0.0.0
	 */
	public function hooks() {

		if ( ! is_admin() ) {
			return false;
		}

		// add menu page.
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );

		// action to save settings from setup.
		add_action( 'admin_post_argpd_setup', array( $this, 'setup' ) );

		// action to save settings from pages setup.
		add_action( 'admin_post_argpd_pages_setup', array( $this, 'pages_setup' ) );

		// accept disclaimer.
		add_action( 'admin_post_argpd_disclaimer', array( $this, 'accept_disclaimer' ) );

		// add settings to plugin menu.
		add_filter( 'plugin_action_links_' . $this->plugin->basename, array( $this, 'plugin_add_settings_link' ) );
	}


	/**
	 * Add main menu
	 *
	 * @since  0.0.0
	 */
	public function add_menu_page() {

		add_menu_page(
			$this->title,
			$this->menu_title,
			'manage_options',
			$this->key,
			array( $this, 'admin_page_display' ),
			'dashicons-welcome-write-blog'
		);
	}


	/**
	 * Add admin user interface
	 *
	 * @since  0.0.0
	 */
	public function admin_page_display() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'argpd' ) );
		}

		$this->plugin->argpd_ui->options_ui();
	}


	/**
	 * Accept Disclaimer
	 *
	 * @since  0.0.0
	 */
	public function accept_disclaimer() {

		if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'argpd' ) ) {
			wp_die( esc_html__( 'No tienes permisos.', 'argpd' ) );
		}

		// update disclaimer setting.
		$this->plugin->argpd_settings->update_setting( 'renuncia', 1 );

		// create default pages.
		$this->plugin->pages->create_all();

		// redirect.
		wp_redirect(
			add_query_arg(
				array(
					'page'    => 'argpd',
					'message' => null,
				),
				admin_url( 'admin.php?page=argpd' )
			)
		);
	}


	/**
	 *
	 * Save settings from pages setup
	 *
	 * @since  0.0.0
	 */
	public function pages_setup() {

		if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'argpd' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'argpd' ) );
		}

		// Scripts to reject.
		$scripts_reject= [];
		foreach ( $_POST as $k => &$v) { 		
			if (strpos($k, 'scripts-reject') === 0) {
				$k= trim( sanitize_text_field ( $k ) );
				$i= substr( $k, 15 );
				array_push( $scripts_reject, $i );
			}
		}
		$this->plugin->argpd_settings->update_setting( 'scripts-reject', join( ',', $scripts_reject ) );

        // cookies lists.
        $this->plugin->argpd_settings->update_setting( 'lista-cookies', $_POST['lista-cookies'] );

		// sanitize is doing in update_setting function.
        $this->plugin->argpd_settings->update_setting( 'avisolegalID', $_POST['avisolegal'] );
        $this->plugin->argpd_settings->update_setting( 'privacidadID', $_POST['privacidad'] );
        $this->plugin->argpd_settings->update_setting( 'cookiesID', $_POST['cookies'] );

		// cookies page is disabled?.
		$disabled = isset( $_POST['avisolegal-enabled'] ) ? 0 : 1;
		$this->plugin->argpd_settings->update_setting( 'avisolegal-disabled', $disabled );
		if ( $disabled ) {
			$this->plugin->argpd_settings->update_setting( 'avisolegalID', 0 );
		}

		// cookies page is disabled?.
		$disabled = isset( $_POST['cookies-enabled'] ) ? 0 : 1;
		$this->plugin->argpd_settings->update_setting( 'cookies-disabled', $disabled );
		if ( $disabled ) {
			$this->plugin->argpd_settings->update_setting( 'cookiesID', 0 );
			//
			if ( isset( $_POST['cookies-id'] ) ) {
				$cookies_id = intval( $_POST['cookies-id'] );
				if ( is_int( $cookies_id ) ) {
				$this->plugin->argpd_settings->update_setting( 'cookiesID', $cookies_id );
				}
			}
		}

		// ¿está activa la pagina de Politica de privacidad?.
		$disabled = isset( $_POST['privacidad-enabled'] ) ? 0 : 1;
		$this->plugin->argpd_settings->update_setting( 'privacidad-disabled', $disabled );
		if ( $disabled ) {
			$this->plugin->argpd_settings->update_setting( 'privacidadID', 0 );
		}

		// robots-index.
		$enabled = isset( $_POST['robots-index'] ) ? 1 : 0;
		$this->plugin->argpd_settings->update_setting( 'robots-index', $enabled );

		// comments.
		$option_comments = isset( $_POST['option-comments'] ) ? 1 : 0;
		$this->plugin->argpd_settings->update_setting( 'option-comments', $option_comments );

		$option_cookies = isset( $_POST['option-cookies'] ) ? 1 : 0;
		$this->plugin->argpd_settings->update_setting( 'option-cookies', $option_cookies );

		$option_forms = isset( $_POST['option-forms'] ) ? 1 : 0;
		$this->plugin->argpd_settings->update_setting( 'option-forms', $option_forms );

		$option_footer = isset( $_POST['option-footer'] ) ? 1 : 0;
		$this->plugin->argpd_settings->update_setting( 'option-footer', $option_footer );

		$option_formal = isset( $_POST['option-formal'] ) ? 1 : 0;
		$this->plugin->argpd_settings->update_setting( 'option-formal', $option_formal );

		// labels.
		$this->plugin->argpd_settings->update_setting( 'cookies-linklabel', $_POST['cookies-linklabel'] );
		$this->plugin->argpd_settings->update_setting( 'cookies-btnlabel', $_POST['cookies-btnlabel'] );
		$this->plugin->argpd_settings->update_setting( 'cookies-rejectlabel', $_POST['cookies-rejectlabel'] );
		$this->plugin->argpd_settings->update_setting( 'cookies-label', $_POST['cookies-label'] );
		$this->plugin->argpd_settings->update_setting( 'consentimiento-label', $_POST['consentimiento-label'] );

		// themes
		$this->plugin->argpd_settings->update_setting( 'cookies-theme', $_POST['cookies-theme'] );
		$this->plugin->argpd_settings->update_setting( 'informbox-theme', $_POST['informbox-theme'] );

		// set message and redirect.
		$message = 'saved';
		if ( wp_redirect(
			add_query_arg(
				array(
					'page'    => 'argpd',
					'message' => $message,
				),
				admin_url( 'admin.php?page=argpd&tab=paginas' )
			)
		) ) {
			exit;
		}
	}

	/**
	 *
	 * Save settings from setup
	 *
	 * @since  0.0.0
	 */
	public function setup() {

		if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'argpd' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'argpd' ) );
		}

		// reset settings.
		$settings = $this->plugin->argpd_settings->reset();
		$settings = $this->plugin->argpd_settings->get_settings();

		// save every setting.
		foreach ( $settings as $name => $text ) {
			if ( isset( $_POST[ $name ] ) ) {
				$this->plugin->argpd_settings->update_setting( $name, $_POST[ $name ] );
			}
		}

		// checkboxes.
		$disabled = isset( $_POST['es-empresa'] ) ? 1 : 0;
		$this->plugin->argpd_settings->update_setting( 'es-empresa', $disabled );

		// set message and redirect.
		$message = 'saved';
		wp_redirect(
			add_query_arg(
				array(
					'page'    => 'argpd',
					'message' => $message,
				),
				admin_url( 'admin.php?page=argpd&tab=ajustes' )
			)
		);
	}

	/**
	 *
	 * Add settings to plugin menu
	 *
	 * @since  0.0.0
	 */
	public function plugin_add_settings_link( $links ) {
		$settings = '<a href="admin.php?page=argpd">' . __( 'Settings' ) . '</a>';

		if ( ! empty( $links ) ) {
			array_unshift( $links, $settings );
		} else {
			$links = array( $settings );
		}
		return $links;
	}

}
