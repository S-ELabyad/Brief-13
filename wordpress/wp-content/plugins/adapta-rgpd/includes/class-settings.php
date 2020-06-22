<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package ARGPD
 * @subpackage Settings
 * @since 0.0.0
 *
 * @author César Maeso <info@superadmin.es>
 *
 * @copyright (c) 2018, César Maeso (https://superadmin.es)
 */

/**
 * Settings class.
 *
 * @since  0.0.0
 */
class ARGPD_Settings {

	/**
	 * Parent plugin class.
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $plugin = null;

	/**
	 * Property key
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $key = 'argpd';

	/**
	 * Property themes
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $informbox_themes = null;

	/**
	 * Property themes
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $cookie_themes = null;

	/**
	 * Property countries
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $countries = null;

	/**
	 * Property states
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $states = null;


	/**
	 * Property settings array
	 *
	 * @var    string
	 * @since  1.2
	 */
	const SETTINGS = array(
		'renuncia'              => 0,
		// pages.
		'avisolegalID'          => 0,
		'privacidadID'          => 0,
		'cookiesID'             => 0,
		'avisolegalURL'         => '',
		'privacidadURL'         => '',
		'cookiesURL'            => '',
		'avisolegal-disabled'   => 0,
		'cookies-disabled'      => 0,
		'privacidad-disabled'   => 0,
		'cookies-label'         => '',
		'cookies-btnlabel'      => '',
		'cookies-rejectlabel'   => '',
		'cookies-linklabel'     => '',
		'cookies-theme'         => 'modern-light',
		'consentimiento-label'  => '',
		'informbox-theme'       => 'simple',
		'robots-index'          => 0,
		// owner.
		'dominio'               => '',
		'titular'               => '',
		'id-fiscal'             => '',
		'colegio'               => '',
		'mercantil-ciudad'       => '',
		'mercantil-tomo'         => '',
		'mercantil-libro'        => '',
		'mercantil-folio'        => '',
		'mercantil-seccion'      => '',
		'mercantil-hoja'         => '',
		'mercantil-inscripcion'  => '',
		'domicilio'             => '',
		'provincia'             => '',
		'provincia-code'        => '',
		'pais'                  => 'ES',
		'pais-nombre'           => '',
		'pais-ue'               => 1,
		'correo'                => '',
		'telefono'              => '',
		'es-empresa'            => 0,
		'es-tienda'             => 0,
		'edad-ue'               => 18,
		'edad-otros'            => 13,
		// settings.
		'finalidad'             => '',
		'hosting-info'          => '',
		// options.
		'option-comments'       => 0,
		'option-cookies'        => 0,
		'option-forms'          => 0,
		'option-footer'         => 0,
		'option-formal'         => 0,
		// clauses.
		'clause-exclusion'      => 0,
		'clause-thirdparty'     => 0,
		'clause-edad'           => 0,
		'clause-terceros'       => 0,
		'clause-protegidos'     => 0,
		'clause-portabilidad'   => 0,
		'clause-fuero'          => 1,
		'clause-errores'        => 1,
		'thirdparty-dclick'     => 0,
		'thirdparty-adsense'    => 0,
		'thirdparty-ganalytics' => 0,
		'thirdparty-social'     => 0,
		'thirdparty-mailchimp'  => 0,
		'thirdparty-mailrelay'  => 0,
		'thirdparty-amazon'     => 0,
		'thirdparty-sendinblue' => 0,
		'thirdparty-mailpoet'   => 0,
		// deber de informar.
		'deber-finalidad'       => '',
		'deber-destinatarios'   => '',
		'lista-cookies'         => '',
		'scripts-reject'        => '',
	);


	/**
	 * Property settings array
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $settings = array();


	/**
	 * Constructor.
	 *
	 * @since  0.0.0
	 *
	 * @param  string $plugin Main plugin object.
	 */
	public function __construct( $plugin ) {

		$this->informbox_themes = [
			'simple'        => __( 'Simple', 'argpd' ),
			'border'        => __( 'Con borde', 'argpd' ),
			'border-number' => __( 'Borde + Números', 'argpd' ),
			'in-line'       => __( 'Compacto en una línea', 'argpd' ),
			'hidden'        => __( 'Compacto con botón ver más', 'argpd' ),
		];

		$this->cookie_themes = [
			'classic'      => __( 'Clásico', 'argpd' ),
			'classic-top'  => __( 'Clásico en parte superior', 'argpd' ),
			'modern-light' => __( 'Moderno Claro', 'argpd' ),
			'modern-dark'  => __( 'Moderno Oscuro', 'argpd' ),
		];

		$this->countries = [
			'AR' => __( 'Argentina', 'argpd' ),
			'CO' => __( 'Colombia', 'argpd' ),
			'CL' => __( 'Chile', 'argpd' ),
			'EC' => __( 'Ecuador', 'argpd' ),
			'ES' => __( 'España', 'argpd' ),
			'US' => __( 'Estados Unidos', 'argpd' ),
			'FR' => __( 'Francia', 'argpd' ),
			'GT' => __( 'Guatemala', 'argpd' ),
			'IT' => __( 'Italia', 'argpd' ),
			'IE' => __( 'Irlanda', 'argpd' ),
			'MX' => __( 'México', 'argpd' ),
			'PE' => __( 'Perú', 'argpd' ),
			'PT' => __( 'Portugal', 'argpd' ),
			'GB' => __( 'Reino Unido', 'argpd' ),
			'UY' => __( 'Uruguay', 'argpd' ),
			'VE' => __( 'Venezuela', 'argpd' ),
		];

		$this->plugin = $plugin;

		$this->init_settings();
	}


	/**
	 * Init settings.
	 *
	 * @since  0.0.0
	 */
	public function init_settings() {

		$this->settings = self::SETTINGS;

		$network_id = null;
		if ( is_multisite() ) {
			$network_id = get_current_blog_id();
		}

		// get all settings.
		$options = get_network_option( $network_id, sprintf( '%s_%s', $this->key, 'settings' ) );
		if ( $options ) {
			foreach ( $options as $name => $value ) {
				$this->settings[ $name ] = $value;
			}
		} else {
			// delete old options.
			foreach ( $this->settings as $name => $value ) {
				$existing = get_network_option( $network_id, sprintf( '%s_%s', $this->key, $name ) );
				$this->update_setting( $name, $existing );
				delete_network_option( $network_id, sprintf( '%s_%s', $this->key, $name ) );
			}
		}

		// get url option stored or get_site_url.
		$dominio = $this->settings['dominio'];
		$this->settings['dominio'] = esc_url( strlen( $dominio ) == 0 ? get_site_url() : $dominio );

		// get legal pages permalinks.
		//$this->settings['cookiesURL'] = '';
		$cookies_id = intval( $this->settings['cookiesID'] );
		if ( is_int( $cookies_id ) && $cookies_id > 0 ) {
			$this->settings['cookiesURL'] = get_permalink( $cookies_id );
		}

		$this->settings['avisolegalURL'] = '';
		$avisolegal_id = intval( $this->settings['avisolegalID'] );
		if ( is_int( $avisolegal_id ) && $avisolegal_id > 0 ) {
			$this->settings['avisolegalURL'] = get_permalink( $avisolegal_id );
		}

		$this->settings['privacidadURL'] = '';
		$privacidad_id = intval( $this->settings['privacidadID'] );
		if ( is_int( $privacidad_id ) && $privacidad_id > 0 ) {
			$this->settings['privacidadURL'] = get_permalink( $privacidad_id );
		}

		// scripts-reject.
		if ( is_string( $this->settings['scripts-reject'] ) && strlen( $this->settings['scripts-reject'] ) ) {
			$this->settings['scripts-reject'] = explode( ',', $this->settings['scripts-reject'] );
		}

		// configure cookies-btnlabel default value.
		if ( ! strlen( $this->settings['cookies-btnlabel'] ) ) {
			$this->settings['cookies-btnlabel'] = __( 'Aceptar', 'argpd' );
		}

		if ( ! strlen( $this->settings['cookies-rejectlabel'] ) ) {
			$this->settings['cookies-rejectlabel'] = __( 'Rechazar', 'argpd' );
		}

		// configure cookies-linklabel default value.
		if ( ! strlen( $this->settings['cookies-linklabel'] ) ) {
			$this->settings['cookies-linklabel'] = __( 'Ver Política de cookies', 'argpd' );
		}

		// default 'edad' setting.
		if ( ! strlen( $this->settings['edad-ue'] ) ) {
			$this->settings['edad-ue'] = self::SETTINGS[ 'edad-ue' ];
		}

		if ( ! strlen( $this->settings['edad-otros'] ) ) {
			$this->settings['edad-otros'] = self::SETTINGS[ 'edad-otros' ];
		}

		$this->convert_regional_codes();
	}

	/**
	 * Convert_regional_codes
	 *
	 * @since  0.0.0
	 */
	private function convert_regional_codes() {

		if ( strlen( $this->settings['pais'] ) == 0 ) {
			$this->settings['pais'] = 'ES';
		}

		// convert cc2 to string.
		$cc2 = $this->settings['pais'];

		foreach ( $this->countries as $key => $value ) {
			if ( $key == $cc2 ) {
				$this->settings['pais-nombre'] = $value;
			}
		}

		// is ue country.
		$this->settings['pais-ue'] = ( 'ES' == $cc2 || 'FR' == $cc2 || 'PT' == $cc2 ) ? 1 : 0;

		// convert state-cc2 to string.
		$state_code = $this->settings['provincia-code'];
		$states     = $this->get_states( $cc2 );
		foreach ( $states as $i ) {
			if ( $i['code'] == $state_code ) {
				$this->settings['provincia'] = $i['name'];
			}
		}
	}


	/**
	 * Reset settings.
	 *
	 * @since  0.0.0
	 */
	public function reset() {
		$this->update_setting( 'clause-exclusion', 0 );
		$this->update_setting( 'clause-terceros', 0 );
		$this->update_setting( 'clause-edad', 0 );
		$this->update_setting( 'clause-protegidos', 0 );
		$this->update_setting( 'clause-portabilidad', 0 );
		$this->update_setting( 'clause-fuero', 0 );
		$this->update_setting( 'clause-errores', 0 );

		$this->update_setting( 'thirdparty-dclick', 0 );
		$this->update_setting( 'thirdparty-adsense', 0 );
		$this->update_setting( 'thirdparty-ganalytics', 0 );
		$this->update_setting( 'thirdparty-social', 0 );
		$this->update_setting( 'thirdparty-mailchimp', 0 );
		$this->update_setting( 'thirdparty-mailrelay', 0 );
		$this->update_setting( 'thirdparty-amazon', 0 );
		$this->update_setting( 'thirdparty-sendinblue', 0 );
		$this->update_setting( 'thirdparty-mailpoet', 0 );

		$this->update_setting( 'es-tienda', 0 );
		//$this->settings = self::SETTINGS;
	}


	/**
	 * Returns all settings
	 *
	 * @return array
	 */
	public function get_settings() {
		return $this->settings;
	}

	/**
	 * Returns themes
	 *
	 * @return array
	 */
	public function get_cookie_themes() {
		return $this->cookie_themes;
	}

	/**
	 * Returns themes
	 *
	 * @return array
	 */
	public function get_informbox_themes() {
		return $this->informbox_themes;
	}

	/**
	 * Returns countries
	 *
	 * @return array
	 */
	public function get_countries() {
		return $this->countries;
	}


	/**
	 * Returns states
	 *
	 * @param  string $country country.
	 * @return array
	 */
	public function get_states( $country ) {

		$fn = sprintf( '%s/../assets/json/%s.json', dirname( __FILE__ ), strtolower( $country ) );
		if ( file_exists( $fn ) ) {
			$str  = file_get_contents( $fn );
			$json = json_decode( $str, true );

			// catch error.
			if ( null === $json && JSON_ERROR_NONE !== json_last_error() ) {
				return array();
			}

			$states = array();
			foreach ( $json as $state ) {
				array_push(
					$states,
					array(
						'name' => $state['name'],
						'code' => $state['code'],
					)
				);
			}
			return $states;
		}

		return array();
	}


	/**
	 * Returns the value of given setting key, based on if network settings are enabled or not
	 *
	 * @param string $name Setting to fetch.
	 * @param string $default Default Value.
	 *
	 * @return bool|mixed|void
	 */
	public function get_setting( $name = '', $default = false ) {

		if ( empty( $name ) ) {
			return false;
		}

		return $this->settings[ $name ];
	}


	/**
	 * Update value for given setting key
	 *
	 * @param string $name Key.
	 * @param string $value Value.
	 *
	 * @return bool If the setting was updated or not
	 */
	public function update_setting( $name = '', $value = '' ) {

		if ( empty( $name ) ) {
			return false;
		}

		$network_id = null;
		if ( is_multisite() ) {
			$network_id = get_current_blog_id();
		}

		$value = trim( sanitize_text_field( $value ) );
		$old_settings = $this->settings;

		$this->settings[ $name ] = $value;
		( 'provincia-code' == $name || 'pais' == $name ) && $this->convert_regional_codes();

		if ( update_network_option( $network_id, sprintf( '%s_%s', $this->key, 'settings' ), $this->settings ) ) {
			return true;
		} else {
			// restaurar viejos settings.
			$this->settings = $old_settings;
		}
		return false;
	}

}
