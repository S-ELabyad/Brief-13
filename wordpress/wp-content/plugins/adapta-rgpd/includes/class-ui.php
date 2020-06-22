<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * @package ARGPD
 * @subpackage Ui
 * @since 0.0.0
 *
 * @author César Maeso <info@superadmin.es>
 *
 * @copyright (c) 2018, César Maeso (https://superadmin.es)
 */

/**
 * Ui class.
 *
 * @since  0.0.0
 */
class ARGPD_Ui {

	/**
	 * Parent plugin class.
	 *
	 * @var    string
	 * @since  0.0.0
	 */
	protected $plugin = null;


	/**
	 * Constructor.
	 *
	 * @since  0.0.0
	 *
	 * @param string $plugin Plugin name.
	 */
	public function __construct( $plugin ) {

		// set parent plugin.
		$this->plugin = $plugin;

		// initiate our hooks.
		$this->hooks();
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since  0.0.0
	 */
	public function hooks() {

		//return current_user_can( 'manage_options' ) || current_user_can( 'manage_network' );
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		// config tab.
		add_action( 'argpd_settings_tab', array( $this, 'argpd_ajustes_tab' ), 1 );
		add_action( 'argpd_settings_content', array( $this, 'argpd_ajustes_content' ) );

		// pages tab.
		add_action( 'argpd_settings_tab', array( $this, 'argpd_paginas_tab' ), 2 );
		add_action( 'argpd_settings_content', array( $this, 'argpd_paginas_content' ) );

		// ayuda.
		add_action( 'argpd_settings_tab', array( $this, 'argpd_ayuda_tab' ), 4 );
		add_action( 'argpd_settings_content', array( $this, 'argpd_ayuda_content' ) );

		// ajax scripts.
		add_action( 'admin_footer', array( $this, 'argpd_change_country' ) );
		add_action( 'wp_ajax_argpd_get_states', array( $this, 'argpd_get_states' ) );

		add_action( 'admin_footer', array( $this, 'create_page_events' ) );
		add_action( 'wp_ajax_argpd_create_page', array( $this, 'create_page' ) );

		// Alternar entre negocio y particular.
		add_action( 'admin_footer', array( $this, 'argpd_toggle_bussines' ) );

		// search cookies.
		add_action( 'admin_footer', array( $this, 'argpd_search_cookies' ) );
	}


	/**
	 * Function wp-ajax to create pages
	 *
	 * @since  1.0.1
	 */
	public function create_page() {
		check_ajax_referer( 'argpd_create_page', 'security' );

		$id   = 0;
		$page = ! empty( $_POST['page'] ) ? sanitize_text_field( wp_unslash( $_POST['page'] ) ) : '';

		switch ( $page ) {
			case 'crear-pagina-legal':
				$id = $this->plugin->pages->create_legal_page();
				break;
			case 'crear-pagina-privacidad':
				$id = $this->plugin->pages->create_privacy_page();
				break;
			case 'crear-pagina-cookies':
				$id = $this->plugin->pages->create_cookies_page();
				break;
			default:
				break;
		}
		echo esc_attr( $id );
		wp_die();
	}

	/**
	 * Javascript events to create page
	 *
	 * @since  1.0.1
	 */
	public function create_page_events() { ?>

		<script type="text/javascript" >			
			
			var ajaxurl = '<?php echo esc_attr( admin_url( 'admin-ajax.php' ) ); ?>';

			jQuery(document).ready(function($) {				
				
				$('.crear-pagina').on('click', function(e){
					var pagename= e.target.id;
					if(pagename != '') {
						var data = {
							action: 'argpd_create_page',
							page: pagename,
							'security': '<?php echo esc_attr( wp_create_nonce( 'argpd_create_page' ) ); ?>'
						}
						$.post(ajaxurl, data, function(response) {    						
							  if (!isNaN(parseFloat(response)) && isFinite(response) && response>0){
								  location.replace(location.href+"&message=saved");
							  } else {
								  location.replace(location.href+"&message=");
							  }
						});
					}
				});
			});
		</script> 
		<?php
	}

	/**
	 * Function wp-ajax to echo states
	 *
	 * @since  1.0.0
	 */
	public function argpd_change_country() {
		?>

		<script type="text/javascript" >			
			
			var ajaxurl = '<?php echo esc_attr( admin_url( 'admin-ajax.php' ) ); ?>';

			jQuery(document).ready(function($) {
				
				$('body').on('change', '.countries', function() {    				
					  var countryid = $(this).val();
					  if(countryid != '') {
						var data = {
							  action: 'argpd_get_states',
							  country: countryid,
							  'security': '<?php echo esc_attr( wp_create_nonce( 'load_states' ) ); ?>'
						}
						
						$('.load-state').html("<span><?php esc_html_e( 'cargando...', 'argpd' ); ?></span>");
						$.post(ajaxurl, data, function(response) {
							  $('.load-state').html(response);
						});
					  }
				});

				// Eventos al activar la página de "Aviso Legal".
				$( "input[name*='avisolegal-enabled']" ).on('click', function(e){
					$('#avisolegal').toggle();
					$('.avisolegal-description').toggle();
				});

				// Eventos al activar la página de "Política de Privacidad".
				$( "input[name*='privacidad-enabled']" ).on('click', function(e){
					$('#privacidad').toggle();
					$('.privacidad-description').toggle();
				});

				// Eventos al activar la página de "Política de Cookies".
				$( "input[name*='cookies-enabled']" ).on('click', function(e){
					$('#cookies').toggle();
					$('.cookies-description').toggle();
				});
			});
		</script> 
		<?php
	}

	/**
	 * Function wp-ajax to echo states
	 *
	 * @since  1.0.0
	 */
	public function argpd_search_cookies() {
		?>

<script type="text/javascript" >			
			
	jQuery(document).ready(function($) {
		'use strict';

		window.TestCookies = window.TestCookies || {};

		TestCookies.getCookies= function () {
			var result= [];
			var cookies = document.cookie.split(";");
			if (document.cookie && document.cookie != '') {
				for (var i = 0; i < cookies.length; i++) {
					var name_value = cookies[i].split("=");
					name_value[0] = name_value[0].replace(/^ /, '');
					result.push(name_value[0]);
				}
			}
			
			result= result.filter(function(value, index, array){
				return (!value.startsWith("wp-settings-"))
			});
			
			result.push("wp-settings-*");
			return result;
		}

		TestCookies.events= function(){
			$( "#buscarCookies" ).on('click', function(e){
				var cookies= TestCookies.getCookies();
				var text= cookies.join("\n") + "\n";
				$( "#lista-cookies").val(text);
				$( "#lista-cookies").attr('rows', cookies.length + 1 );
			});
		}

		TestCookies.init= function(){
			TestCookies.events();
		}

		TestCookies.init();
	});

</script> 
		<?php
	}

	/**
	 * Function para el cambio de visualizacion entre negocio y particular.
	 *
	 * @since  1.2
	 */
	public function argpd_toggle_bussines() {
		?>

		<script type="text/javascript" >					
			jQuery(document).ready(function($) {				
				$('body').on('change', '#empresa-switch', function() {					
					if( this.checked == true ){
						$('.empresa').show();
						$('.particular').hide();
					} else {
						$('.empresa').hide();
						$('.particular').show();
					}
				});
			});
		</script> 
		<?php
	}


	/**
	 * Function wp-ajax to get states by country
	 *
	 * @since  1.0.0
	 */
	public function argpd_get_states() {
		check_ajax_referer( 'load_states', 'security' );
		$country = ! empty( $_POST['country'] ) ? sanitize_text_field( wp_unslash( $_POST['country'] ) ) : 'ES';

		$settings = $this->plugin->argpd_settings;
		$states   = $settings->get_states( $country );
		?>
		 
			<select name="provincia-code" id="provincia-code">
				<option value="" selected="selected">Selecciona</option>
				<?php
				foreach ( $states as $i ) {
					$selected = ( $i['code'] == $settings->get_setting( 'provincia-code' ) ) ? ( 'selected="selected"' ) : '';
					printf( '<option value="%s" %s>%s</option>', esc_attr( $i['code'] ), esc_attr( $selected ), esc_html( $i['name'] ) );
				}
				?>
			</select>

		<?php
		wp_die();
	}


	/**
	 * Echo 'Titular' tab of plugin settings
	 *
	 * @since  0.0.0
	 */
	public function argpd_ajustes_tab() {
		global $argpd_active_tab;
		$classname = ( ! empty( $argpd_active_tab ) && 'ajustes' == $argpd_active_tab ) ? 'nav-tab-active' : '';
		?>
		<a 	class="nav-tab <?php echo esc_attr( $classname ); ?>" 
			href="<?php echo esc_attr( admin_url( 'admin.php?page=argpd&tab=ajustes' ) ); ?>">
			<?php esc_html_e( 'Titular', 'argpd' ); ?> 
		</a>
		<?php
	}


	/**
	 * Echo 'Titular' content of plugin settings
	 *
	 * @since  0.0.0
	 */
	public function argpd_ajustes_content() {
		global $argpd_active_tab;
		if ( empty( $argpd_active_tab ) || 'ajustes' != $argpd_active_tab ) {
			return;
		}

		$settings = $this->plugin->argpd_settings;

		$classes = array();
		$classes['empresa'] = $settings->get_setting( 'es-empresa' ) ? 'empresa' : 'empresa oculto';
		$classes['particular'] = $settings->get_setting( 'es-empresa' ) ? 'particular oculto' : 'particular';
		?>
		
		
		<form method="post" action="admin-post.php" style="padding-top: 20px">
			<?php wp_nonce_field( 'argpd' ); ?>
			<input type="hidden" value="argpd_setup" name="action"/>
			
			<div id="message" class="argpd-message">
				<p>
				<?php printf(
        			'%s <b>%s</b> %s',
        			esc_html__( 'Pulsa en', 'argpd' ),
        			esc_html__( 'Guardar cambios', 'argpd' ),
        			esc_html__( 'para actualizar automáticamente los textos legales.', 'argpd' )
    				);
				?>
				</p>		
			</div>

<div class="argpd-panel">
			<table class="form-table">
				<tbody>
					<tr>	
					<th>						
						<h2 class="title"><?php esc_html_e( 'Sobre el Titular', 'argpd' ); ?></h2>
					</th>
						<td>
							<?php
								$checked = ( $settings->get_setting( 'es-empresa' ) == 1 ) ? ( 'checked' ) : '';
							?>
			
							<?php esc_html_e( 'Particular', 'argpd' ); ?>&nbsp;&nbsp;
							<label class="argpd-switch">
							  <input type="checkbox" id="empresa-switch" name="es-empresa" <?php echo esc_attr( $checked ); ?>>
							  <span class="argpd-slider argpd-round"></span>
							</label>

							<?php esc_html_e( 'Empresa o autónomo', 'argpd' ); ?>
						</td>
					</tr>

					<?php /* Titular */ ?>
					<tr>
						<th scope="row">
							<label for="titular">
								<span class="<?php echo esc_attr( $classes['particular'] ); ?>">
									<?php
										printf(
											'%s<br>%s',
											esc_html__( 'Nombre y apellidos', 'argpd' ),
											esc_html__( 'del Titular', 'argpd' )
										);
									?>
								</span>
								<span class="<?php echo esc_attr( $classes['empresa'] ); ?>">
									<?php
										printf(
											'%s<br>%s',
											esc_html__( 'Denominación social', 'argpd' ),
											esc_html__( 'o Titular', 'argpd' )
										);
									?>
								</span>
							</label>
						</th>
						<td>
							<input 	type="text" 
									name="titular" 
									value="<?php echo esc_attr( $settings->get_setting( 'titular' ) ); ?>" 
									/>			
						</td>
					</tr>
					
					<?php /* Identificador fiscal */ ?>
					<tr>
						<th scope="row">
							<label for="id-fiscal">
								<span class="<?php echo esc_attr( $classes['particular'] ); ?>">									
									<?php esc_html_e( 'NIF', 'argpd' ); ?>
								</span>
								<span class="<?php echo esc_attr( $classes['empresa'] ); ?>">
									<?php
										printf(
											'%s<br>%s',
											esc_html__( 'Identificador fiscal', 'argpd' ),
											esc_html__( 'NIF o CIF', 'argpd' )
										);
									?>
								</span>

							</label>
						</th>
						<td>
							<input 	type="text" 
									name="id-fiscal" 
									value="<?php echo esc_attr( $settings->get_setting( 'id-fiscal' ) ); ?>" 
									/>				
						</td>
					</tr>

					<?php /* Colegio Profesional */ ?>
					<tr class="<?php echo esc_attr( $classes['empresa'] ); ?>">
						<th scope="row">
							<label for="colegio">								
							<?php
								printf(
									'%s<br>%s',
									esc_html__( 'Datos del', 'argpd' ),
									esc_html__( 'Colegio Profesional', 'argpd' )
								);
							?>
							</label>
						</th>
						<td>
							<input 	type="text" 
									name="colegio" 
									value="<?php echo esc_attr( $settings->get_setting( 'colegio' ) ); ?>" 
									/>
							<!--<p class="description">
								Datos del Colegio Profesional si ejereces una profesión regulada.
							</p>-->	
							<p class="description">								
								<?php esc_html_e( 'Opcional', 'argpd' ); ?>
							</p>			
						</td>
					</tr>
					
					<?php /* Registro mercantil */ ?>
					<tr class="<?php echo esc_attr( $classes['empresa'] ); ?>">
						<th scope="row">
							<label for="registro-mercantil">								
							<?php
								printf(
									'%s<br>%s',
									esc_html__( 'Datos del', 'argpd' ),
									esc_html__( 'Registro mercantil', 'argpd' )
								);
							?>
							</label>
						</th>
						<td>
							<span><?php esc_html_e( 'Registro mercantil de', 'argpd' ); ?></span>:&nbsp;<input type="text" 
									name="mercantil-ciudad" 
									value="<?php echo esc_attr( $settings->get_setting( 'mercantil-ciudad' ) ); ?>" 
									/>
							<br/><br/>
							<span><?php esc_html_e( 'Tomo', 'argpd' ); ?></span>:&nbsp;<input 	
									type="text" 
									name="mercantil-tomo" 
									size="1"
									value="<?php echo esc_attr( $settings->get_setting( 'mercantil-tomo' ) ); ?>" 
									/>
							<span><?php esc_html_e( 'Libro', 'argpd' ); ?></span>:&nbsp;<input 	
									type="text" 
									name="mercantil-libro" 
									size="1"
									value="<?php echo esc_attr( $settings->get_setting( 'mercantil-libro' ) ); ?>" 
									/>
							<span><?php esc_html_e( 'Sección', 'argpd' ); ?></span>:&nbsp;<input 	
									type="text" 
									name="mercantil-seccion" 
									size="1"
									value="<?php echo esc_attr( $settings->get_setting( 'mercantil-seccion' ) ); ?>" 
									/>
							<br/><br/>
							<span><?php esc_html_e( 'Folio', 'argpd' ); ?></span>:&nbsp;<input 	
									type="text" 
									name="mercantil-folio" 
									size="1"
									value="<?php echo esc_attr( $settings->get_setting( 'mercantil-folio' ) ); ?>" 
									/>
							<span><?php esc_html_e( 'Hoja', 'argpd' ); ?></span>:&nbsp;<input 	
									type="text" 
									name="mercantil-hoja" 
									size="1"
									value="<?php echo esc_attr( $settings->get_setting( 'mercantil-hoja' ) ); ?>" 
									/>									
							<span><?php esc_html_e( 'Inscripción', 'argpd' ); ?></span>:&nbsp;<input 	
									type="text" 
									name="mercantil-inscripcion" 
									size="1"
									value="<?php echo esc_attr( $settings->get_setting( 'mercantil-inscripcion' ) ); ?>" 
									/>
						</td>
					</tr>					


					<?php /* Domicilio */ ?>
					<tr>
						<th scope="row">
							<!--<label for="domicilio"><?php esc_html_e( 'Domicilio', 'argpd' ); ?></label>-->
							<span class="<?php echo esc_attr( $classes['particular'] ); ?>"><?php esc_html_e( 'Domicilio', 'argpd' ); ?></span>
							<span class="<?php echo esc_attr( $classes['empresa'] ); ?>"><?php esc_html_e( 'Domicilio social', 'argpd' ); ?></span>
						</th>
						<td>

							<input 	type="text" 
									name="domicilio" 
									value="<?php echo esc_attr( $settings->get_setting( 'domicilio' ) ); ?>" 
									/>
							<p>								
							
							<span class="load-state">
							<select name="provincia-code" id="provincia-code">
								<option value="" selected="selected">Selecciona</option>
								<?php
								// $provincias= $settings->get_states();
								$country = $settings->get_setting( 'pais' );
								$states  = $settings->get_states( $country );
								foreach ( $states as $i ) {
									$selected = ( $i['code'] == $settings->get_setting( 'provincia-code' ) ) ? ( 'selected="selected"' ) : '';
									printf( '<option value="%s" %s>%s</option>', esc_attr( $i['code'] ), esc_attr( $selected ), esc_html( $i['name'] ) );
								}
								?>
							</select>

							</span>

							<select name="pais" id="pais" class="countries">
								<?php
									$countries = $settings->get_countries();
								foreach ( $countries as $key => $value ) {
									$selected = ( $key == $settings->get_setting( 'pais' ) ) ? ( 'selected="selected"' ) : '';
									printf( '<option value="%s" %s>%s</option>', esc_attr( $key ), esc_attr( $selected ), esc_html( $value ) );
								}
								?>
							</select>
							</p>

							<!--<p class="description">
								Domicilio del titular o Domicilio Fiscal
							</p>-->				
						</td>
					</tr>						
										
					<?php /* correo electrónico */ ?>
					<tr>
						<th scope="row">
							<label for="correo">								
							<?php
								printf(
									'%s<br>%s',
									esc_html__( 'Correo electrónico', 'argpd' ),
									esc_html__( 'de contacto', 'argpd' )
								);
							?>
							</label>
						</th>
						<td>
							<input 	type="text" name="correo" value="<?php echo esc_attr( $settings->get_setting( 'correo' ) ); ?>" />
							<p class="description">
								<?php
									printf(
										'%s<br>%s',
										esc_html__( 'Correo electrónico dónde ejercen sus', 'argpd' ),
										esc_html__( 'derechos los usuarios', 'argpd' )
									);
								?>
							</p>
						</td>
					</tr>

					<?php /* teléfono */ ?>
					<tr class="<?php echo esc_attr( $classes['empresa'] ); ?>">
						<th scope="row">							
							<label for="telefono"><?php esc_html_e( 'Teléfono', 'argpd' ); ?></label>							
						</th>
						<td>
							<input 	type="text" name="telefono" value="<?php echo esc_attr( $settings->get_setting( 'telefono' ) ); ?>" />
							<p class="description">
								<?php esc_html_e( 'Opcional', 'argpd' ); ?>
							</p>
						</td>
					</tr>					
				</tbody>
			</table>
			<?php submit_button(); ?>
			</div>

			<?php /* Sobre el sitio web */ ?>
			<br>
			<div class="argpd-panel">
				<h2 class="title"><?php esc_html_e( 'Sobre el sitio Web', 'argpd' ); ?></h2>
			
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="dominio">
								<?php
									/* translators: en el contexto: Dirección web del sitio */
									printf(
										'%s<br>%s',
										esc_html__( 'Dirección web', 'argpd' ),
										esc_html__( 'del sitio', 'argpd' )
									);
								?>
							</label>			
						</th>
						<td>
							<input 	type="text" 
									name="dominio" 
									value="<?php echo esc_attr( $settings->get_setting( 'dominio' ) ); ?>" 
									/>							
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="finalidad"><?php esc_html_e( 'Finalidad', 'argpd' ); ?></label>
						</th>
						<td>
							<textarea 
								name="finalidad" 
								id="finalidad" 
								cols="24"
								rows="3"
								><?php echo esc_html( $settings->get_setting( 'finalidad' ) ); ?></textarea>
							<p class="description">
								<?php esc_html_e( 'Por ejemplo, tienda de venta de zapatos', 'argpd' ); ?>
							</p>
							<br/>
						</td>
					</tr>
					<tr class="<?php echo esc_attr( $classes['empresa'] ); ?>">
						<th scope="row">
							<label for="es-tienda"><?php esc_html_e( 'Tienda online', 'argpd' ); ?></label>
						</th>
						<td>							
							<fieldset>
								<label  for="es-tienda">
									<input 	name="es-tienda" 
											type="checkbox" 
											id="es-tienda" 
											value="1"
											<?php ( $settings->get_setting( 'es-tienda' ) == 1 ) && printf( 'checked' ); ?>
											>											
											Venta de productos o servicios
								</label>
								&nbsp;
								<a 	href="https://superadmin.es/blog/que-es/lssi/" 
									target="_blank"
									rel="nofollow"
									>
									<span style="text-decoration: none" class="dashicons dashicons-editor-help"></span>								
									<?php esc_html_e( '¿Qué es la LSSI?', 'argpd' ); ?>
								</a>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="hosting-info">								
							<?php
								printf(
									'%s<br>%s',
									esc_html__( 'Proveedor del', 'argpd' ),
									esc_html__( 'alojamiento web', 'argpd' )
								);
							?>
							</label>
						</th>
						<td>
							<input 	type="text" 
									name="hosting-info" 
									value="<?php echo esc_attr( $settings->get_setting( 'hosting-info' ) ); ?>" 
									/>
							<!--<p class="description">
								Indica tu proveedor de alojamiento o hosting y un enlace a su política de privacidad.
							</p>-->				
						</td>
					</tr>					
					<tr>
						<th scope="row">
							<label><?php esc_html_e( 'Servicios de Terceros', 'argpd' ); ?></label>
							<!--<p class="description">
								<?php esc_html_e( 'Marca los servicios que utilices', 'argpd' ); ?>
							</p>-->
						</th>
						<td>
							<fieldset>
								<b>Análisis web</b><br/>
								<label for="thirdparty-ganalytics">
									<input 	name="thirdparty-ganalytics" 
											type="checkbox" 
											id="thirdparty-ganalytics" 
											value="1"
											<?php ( $settings->get_setting( 'thirdparty-ganalytics' ) == 1 ) && printf( 'checked' ); ?>
											>											
											Google Analytics
								</label>
								<br/>
								
								<br/><b>Publicidad</b><br/>
								<label for="thirdparty-adsense">
									<input 	name="thirdparty-adsense" 
											type="checkbox" 
											id="thirdparty-adsense" 
											value="1"
											<?php ( $settings->get_setting( 'thirdparty-adsense' ) == 1 ) && printf( 'checked' ); ?>
											>											
											Google AdSense
								</label>
								<br/>

								<label for="thirdparty-dclick">
									<input 	name="thirdparty-dclick" 
											type="checkbox" 
											id="thirdparty-dclick" 
											value="1"
											<?php ( $settings->get_setting( 'thirdparty-dclick' ) == 1 ) && printf( 'checked' ); ?>
											>											
											DoubleClick by Google
								</label>
								<br/>

								<?php /* amazon afiliados */ ?>
								<label for="thirdparty-amazon">
									<input 	name="thirdparty-amazon" 
											type="checkbox" 
											id="thirdparty-amazon" 
											value="1" 
											<?php ( $settings->get_setting( 'thirdparty-amazon' ) == 1 ) && printf( 'checked' ); ?>
											>
											<?php esc_html_e( 'Programa de Afiliados de Amazon de la UE', 'argpd' ); ?>
								</label>							
								<br/>

								<br/><b>Email Marketing</b><br/>
								<?php /* thirdparty mailchimp */ ?>
								<label for="thirdparty-mailchimp">
									<input 	name="thirdparty-mailchimp" 
											type="checkbox" 
											id="thirdparty-mailchimp" 
											value="1" 
											<?php ( $settings->get_setting( 'thirdparty-mailchimp' ) == 1 ) && printf( 'checked' ); ?>
											>
											MailChimp
								</label>
								<br/>

								<?php /* thirdparty mailrelay */ ?>
								<label for="thirdparty-mailrelay">
									<input 	name="thirdparty-mailrelay" 
											type="checkbox" 
											id="thirdparty-mailrelay" 
											value="1" 
											<?php ( $settings->get_setting( 'thirdparty-mailrelay' ) == 1 ) && printf( 'checked' ); ?>
											>
											MailRelay											
								</label>							
								<br/>

								<?php /* thirdparty sendinblue */ ?>
								<label for="thirdparty-sendinblue">
									<input 	name="thirdparty-sendinblue"
											type="checkbox" 
											id="thirdparty-sendinblue"
											value="1" 
											<?php ( $settings->get_setting( 'thirdparty-sendinblue' ) == 1 ) && printf( 'checked' ); ?>
											>
											SendinBlue
								</label>							
								<br/>

								<?php /* thirdparty mailpoet */ ?>
								<label for="thirdparty-mailpoet">
									<input 	name="thirdparty-mailpoet"
											type="checkbox" 
											id="thirdparty-mailpoet"
											value="1" 
											<?php ( $settings->get_setting( 'thirdparty-mailpoet' ) == 1 ) && printf( 'checked' ); ?>
											>
											MailPoet
								</label>							
								<br/>								

								<br/><b>Redes Sociales</b><br/>
								<?php /* thidparte social */ ?>
								<label for="thirdparty-social">
									<input 	name="thirdparty-social" 
											type="checkbox" 
											id="thirdparty-social" 
											value="1" 
											<?php ( $settings->get_setting( 'thirdparty-social' ) == 1 ) && printf( 'checked' ); ?>
											>
											<?php esc_html_e( 'Facebook, Twitter, Linkedin, YouTube o Instagram', 'argpd' ); ?>
								</label>
								<br/>


							<?php
							/* thirdparty links
							<label for="thirdparty-links">
							<input  name="thirdparty-links"
									type="checkbox"
									id="thirdparty-links"
									value="1"
									<?php ($settings->get_setting('thirdparty-links') == 1) && printf("checked"); ?>
									>
									<?php _e('Enlaces o imágenes de otros sitios', 'argpd');?>
							</label>
							<p class="description">
								Marca si utilizas imágenes o pones enlaces a otros sitios.
							</p>
							<br/> */
							?>
							</fieldset>
						</td>
					</tr>
				</tbody>
			</table>
			<?php submit_button(); ?>
		</div>

			<?php /* Más ajustes */ ?>
			<br>
			<div class="argpd-panel">
				<h2 class="title"><?php esc_html_e( 'Más Ajustes', 'argpd' ); ?></h2>
			
			<table class="form-table">
				<tbody>	
					<tr>
						<th scope="row">
							<label><?php esc_html_e( 'Cláusulas', 'argpd' ); ?></label>
							<!--<p class="description">
								<?php esc_html_e( 'Marca para activar', 'argpd' ); ?>
							</p>-->
						</th>
						<td>
							<fieldset>							
							<label for="clause-exclusion">
							<input 	name="clause-exclusion" 
									type="checkbox" 
									id="clause-exclusion" 
									value="1"
									<?php ( $settings->get_setting( 'clause-exclusion' ) == 1 ) && printf( 'checked' ); ?>
									>
									<?php esc_html_e( 'Reservar el Derecho de exclusión', 'argpd' ); ?>
							</label>
							<br/>
							<label for="clause-terceros">
							<input 	name="clause-terceros" 
									type="checkbox" 
									id="clause-terceros" 
									value="1" 
									<?php ( $settings->get_setting( 'clause-terceros' ) == 1 ) && printf( 'checked' ); ?>
									>
									<?php esc_html_e( 'Cesión de datos a terceros', 'argpd' ); ?>
							</label>
							<br/>
							
							<?php /* clausula mayoría edad */ ?>
							<label for="clause-edad">
							<input 	name="clause-edad" 
									type="checkbox" 
									id="clause-edad" 
									value="1" 
									<?php ( $settings->get_setting( 'clause-edad' ) == 1 ) && printf( 'checked' ); ?>
									>									
									<?php esc_html_e( 'Requisito mayoría edad. ', 'argpd' ); ?>
									Ciudadanos europeos: 
									<input 	
									type="text" 
									name="edad-ue" 
									size="1"
									value="<?php echo esc_attr( $settings->get_setting( 'edad-ue' ) ); ?>" 									
									/>&nbsp;<?php esc_html_e( 'años', 'argpd' ); ?>,
									&nbsp;<?php esc_html_e( 'otros', 'argpd' ); ?>
									<input 	
									type="text" 
									name="edad-otros" 
									size="1"
									value="<?php echo esc_attr( $settings->get_setting( 'edad-otros' ) ); ?>"
									/>&nbsp;<?php esc_html_e( 'años', 'argpd' ); ?>
							</label>						
							<br/>

							<?php /* clausula protected data */ ?>
							<label for="clause-protegidos">
							<input 	name="clause-protegidos" 
									type="checkbox" 
									id="clause-protegidos" 
									value="1" 
									<?php ( $settings->get_setting( 'clause-protegidos' ) == 1 ) && printf( 'checked' ); ?>
									>
									<?php esc_html_e( 'Datos especialmente protegidos: médicos, religiosos, orientación sexual...', 'argpd' ); ?>
							</label>
							<br/>

							<?php /* clausula portabilidad  */ ?>
							<label for="clause-portabilidad">
							<input 	name="clause-portabilidad" 
									type="checkbox" 
									id="clause-portabilidad" 
									value="1" 
									<?php ( $settings->get_setting( 'clause-portabilidad' ) == 1 ) && printf( 'checked' ); ?>
									>
									<?php esc_html_e( 'Permitir la Portabilidad de datos', 'argpd' ); ?>
							</label>
							<br/>

							<?php /* clausula errores tipográficos */ ?>
							<label for="clause-errores">
							<input 	name="clause-errores" 
									type="checkbox" 
									id="clause-errores" 
									value="1" 
									<?php ( $settings->get_setting( 'clause-errores' ) == 1 ) && printf( 'checked' ); ?>
									>
									<?php esc_html_e( 'Error tipográfico y fe de erratas', 'argpd' ); ?>
							</label>
							<br/>

							<?php /* clausula renuncia fuero propio  */ ?>
							<label for="clause-fuero">
							<input 	name="clause-fuero" 
									type="checkbox" 
									id="clause-fuero" 
									value="1" 
									<?php ( $settings->get_setting( 'clause-fuero' ) == 1 ) && printf( 'checked' ); ?>
									>
									<?php esc_html_e( 'Renuncia de fuero propio', 'argpd' ); ?>
							</label>
							<br/>

							</fieldset>
						</td>
					</tr>
				</tbody>
			</table>


			<?php submit_button(); ?>
			</div>
		</form>
		<?php
	}


	/**
	 * Echo 'Integracion' tab of plugin settings
	 *
	 * @since  0.0.0
	 */
	public function argpd_paginas_tab() {
		global $argpd_active_tab;
		$classname = ( ! empty( $argpd_active_tab ) && 'paginas' == $argpd_active_tab ) ? 'nav-tab-active' : '';
		?>
		<a 	class="nav-tab <?php echo esc_attr( $classname ); ?>" 
			href="<?php echo esc_url( admin_url( 'admin.php?page=argpd&tab=paginas' ) ); ?>">
			<?php esc_html_e( 'Integración', 'argpd' ); ?> 
		</a>
		<?php
	}


	/**
	 * Echo 'Integracion' content of plugin settings
	 *
	 * @since  0.0.0
	 */
	public function argpd_paginas_content() {
		global $argpd_active_tab;
		if ( empty( $argpd_active_tab ) || 'paginas' != $argpd_active_tab ) {
			return;
		}

		$settings = $this->plugin->argpd_settings;
		?>
 
		<br/>
		<form method="post" action="admin-post.php" style="padding-top: 20px">
		<div class="argpd-panel">
			<h2 class="title"><?php esc_html_e( 'Páginas Legales', 'argpd' ); ?></h2>
			<p>
				<?php esc_html_e( 'Activa o desactiva cada texto legal y escoge en que página aparece.', 'argpd' ); ?>
			</p>
		

		
			<div>

				<?php wp_nonce_field( 'argpd' ); ?>
				<input type="hidden" value="argpd_pages_setup" name="action"/>
	
				<table class="wp-list-table widefat fixed striped posts">
					<thead>
						<tr>
							<td><?php esc_html_e( 'Texto Legal', 'argpd' ); ?></td>
							<td><?php esc_html_e( 'Página', 'argpd' ); ?></td>
							<!--<td>Código Abreviado</td>-->
							<td><?php esc_html_e( 'Ayuda', 'argpd' ); ?></td>
						</tr>
					</thead>
					<tbody>

						<?php /* Aviso Legal */ ?>
						<tr>
							<th scope="row">

								<?php
									$checked = ( $settings->get_setting( 'avisolegal-disabled' ) == 0 ) ? ( 'checked' ) : '';
								?>
								<label class="argpd-switch">
								  <input type="checkbox" name="avisolegal-enabled" <?php echo esc_attr( $checked ); ?>>
								  <span class="argpd-slider argpd-round"></span>
								</label>

								<label for="avisolegal"><?php esc_html_e( 'Aviso Legal', 'argpd' ); ?></label>
								<?php if ( $checked && $settings->get_setting( 'avisolegalID' ) != 0 ) { ?>
								<div class="row-actions">
									<span class="view argpd-view">
										<?php
										printf(
											'<a href="%s">%s</a>',
											esc_attr( $settings->get_setting( 'avisolegalURL' ) ),
											esc_html__( 'Ver', 'argpd' )
										);
										?>
									</span>
								</div>
								<?php } ?> 
							</th>
							<td>								
								<select name="avisolegal" id="avisolegal" class="<?php echo esc_attr( $settings->get_setting( 'avisolegal-disabled' ) == 0 ) ? '' : 'oculto'; ?>">
									<option value="0"
											<?php
											if ( $settings->get_setting( 'avisolegalID' ) == 0 ) {
												printf( 'selected="selected"' );}
											?>
											>
											Ninguna</option>
									<?php
									foreach ( get_pages() as $page ) {
										$selected = ( $page->ID == $settings->get_setting( 'avisolegalID' ) ) ? ( 'selected="selected"' ) : '';
										printf( '<option value="%s" %s>%s</option>', esc_attr( $page->ID ), esc_attr( $selected ), esc_html( $page->post_title ) );
									}
									?>
								</select>								

								<?php
								$match = false;
								foreach ( get_pages() as $page ) {
									if ( $page->ID == $settings->get_setting( 'avisolegalID' ) ) {
										$match = true;
									}
								}
								if ( ! $match && $settings->get_setting( 'avisolegal-disabled' ) == 0 ) {
									?>
								<p class="description avisolegal-description">
									Escoge la página dónde aparecerá <br/>el Aviso Legal, <a id="crear-pagina-legal" class="crear-pagina" style="cursor:pointer">crea una nueva</a> o usa el <br/>shortcode [argpd_aviso-legal/]
								</p>
								<?php } ?>
							</td>
							<!--<td>
								<span class="shortcode">[argpd_aviso-legal]</span>
							</td>-->
							<td>
								<a 	href="https://superadmin.es/blog/que-es/lssi/" 
									class="button" 
									target="_blank"
									style="background-color: #03A9F4;color: white;border-color: #03A9F4;"
								>Qué es la LSSI</a>

							</td>
						</tr>

						<?php /* Política de privacidad */ ?>
						<tr>
							<th scope="row">
								<?php
									$checked = ( $settings->get_setting( 'privacidad-disabled' ) == 0 ) ? ( 'checked' ) : '';
								?>
								<label class="argpd-switch">
								  <input type="checkbox" name="privacidad-enabled" <?php echo esc_attr( $checked ); ?>>
								  <span class="argpd-slider argpd-round"></span>
								</label>

								<label for="privacidad"><?php esc_html_e( 'Política de Privacidad', 'argpd' ); ?></label>
								<?php if ( $checked && $settings->get_setting( 'privacidadID' ) != 0 ) { ?>
								<div class="row-actions">
									<span class="view argpd-view">
										<?php
										printf(
											'<a href="%s">%s</a>',
											esc_attr( $settings->get_setting( 'privacidadURL' ) ),
											esc_html__( 'Ver', 'argpd' )
										);
										?>
									</span>				
								</div>
								<?php } ?> 
							</th>
							<td>
								<select name="privacidad" id="privacidad" class="<?php echo esc_attr( $settings->get_setting( 'privacidad-disabled' ) == 0 ) ? '' : 'oculto'; ?>">
									<option value="0"
											<?php
											if ( $settings->get_setting( 'privacidadID' ) == 0 ) {
												printf( 'selected="selected"' );}
											?>
											>
											Ninguna</option>
									<?php
									foreach ( get_pages() as $page ) {
										$selected = ( $page->ID == $settings->get_setting( 'privacidadID' ) ) ? ( 'selected="selected"' ) : '';
										printf( '<option value="%s" %s>%s</option>', esc_attr( $page->ID ), esc_attr( $selected ), esc_html( $page->post_title ) );
									}
									?>
								</select>
								<?php
								$match = false;
								foreach ( get_pages() as $page ) {
									if ( $page->ID == $settings->get_setting( 'privacidadID' ) ) {
										$match = true;
									}
								}
								if ( ! $match && $settings->get_setting( 'privacidad-disabled' ) == 0 ) {
									?>
								<p class="description privacidad-description">
									Selecciona la página dónde aparecerá <br/>la Política de Privacidad, <a id="crear-pagina-privacidad" class="crear-pagina" style="cursor:pointer">crea una nueva</a> o usa el <br/>shortcode [argpd_politica-privacidad/]
								</p>
								<?php } ?>

							</td>
							<td>
								<a 	href="https://superadmin.es/blog/privacidad/crear-politica-de-privacidad-en-wordpress/?utm_source=wordpressorg&utm_campaign=adapta_rgpd&utm_medium=direct" 
									class="button" 
									target="_blank"
									style="background-color: #03A9F4;color: white;border-color: #03A9F4;"
								>Aprende a crear la Política de Privacidad</a>
							</td>
						</tr>

						<?php /* Política de cookies */ ?>
						<tr>
							<th scope="row">								
								<?php
									$checked = ( $settings->get_setting( 'cookies-disabled' ) == 0 ) ? ( 'checked' ) : '';
								?>
								<label class="argpd-switch">
								  <input type="checkbox" name="cookies-enabled" <?php echo esc_attr( $checked ); ?>>
								  <span class="argpd-slider argpd-round"></span>
								</label>

								<label for="cookies"><?php esc_html_e( 'Política de Cookies', 'argpd' ); ?></label>

								<?php if ( $checked && $settings->get_setting( 'cookiesID' ) != 0 ) { ?>
								<div class="row-actions">
									<span class="view argpd-view">
										<?php
										printf(
											'<a href="%s">%s</a>',
											esc_attr( $settings->get_setting( 'cookiesURL' ) ),
											esc_html__( 'Ver', 'argpd' )
										);
										?>
									</span>
								</div>
								<?php } ?> 
							</th>
							<td>
								<select name="cookies" id="cookies" class="<?php echo esc_attr( $settings->get_setting( 'cookies-disabled' ) == 0 ) ? '' : 'oculto'; ?>">
									<option value="0"
											<?php
											if ( $settings->get_setting( 'cookiesID' ) == 0 ) {
												printf( 'selected="selected"' );}
											?>
											>
											Ninguna</option>
									<?php
									foreach ( get_pages() as $page ) {
										$selected = ( $page->ID == $settings->get_setting( 'cookiesID' ) ) ? ( 'selected="selected"' ) : '';
										printf( '<option value="%s" %s>%s</option>', esc_attr( $page->ID ), esc_attr( $selected ), esc_html( $page->post_title ) );
									}
									?>
								</select>
								<?php
								$match = false;
								foreach ( get_pages() as $page ) {
									if ( $page->ID == $settings->get_setting( 'cookiesID' ) ) {
										$match = true;
									}
								}
								if ( ! $match && $settings->get_setting( 'cookies-disabled' ) == 0 ) {
									?>
									<p class="description cookies-description">
										Selecciona la página dónde aparecerá <br/>la Política de Cookies, <a id="crear-pagina-cookies" class="crear-pagina" style="cursor:pointer">crea una nueva</a> o usa el <br/>shortcode [argpd_politica-cookies/]
									</p>
								<?php } ?>
							</td>
							<!--<td>
								<span class="shortcode">[argpd_politica-cookies]</span>
							</td>-->
							<td>
								<a 	href="https://superadmin.es/blog/privacidad/crear-banner-de-cookies-en-wordpress/?utm_source=wordpressorg&utm_campaign=adapta_rgpd&utm_medium=direct" 
									class="button" 
									target="_blank"
									style="background-color: #03A9F4;color: white;border-color: #03A9F4;"
								>Aprende a cumplir la Ley de Cookies</a>
							</td>
						</tr>												
						<?php /* Información Básica */ ?>
						<!--<tr>
							<th scope="row">
								<label><span style="padding-left:40px"><?php esc_html_e( 'Deber de Informar', 'argpd' ); ?></span></label>								
								<div class="row-actions">
								</div>
							</th>
							<td>								
							</td>							
							<td>
								<span class="shortcode">[argpd_deber_de_informar]</span>
							</td>
							<td>
								<a 	href="https://superadmin.es/blog/emprendedor/cumplir-deber-de-informar-rgpd/" 
									class="button" 
									target="_blank"
									style="background-color: #03A9F4;color: white;border-color: #03A9F4;"
								>Cumplir el deber de informar</a>
							</td>
						</tr>-->			
					</tbody>
				</table>

	
				<table class="form-table">
					<tr>
						<td>
							<fieldset>
								<br/>
								<label  for="option-formal">
									<?php
										$checked = ( $settings->get_setting( 'option-formal' ) == 1 ) ? ( 'checked' ) : '';
									?>
									<input 	name="option-formal" 
											type="checkbox" 
											id="option-formal" 
											value="1"							
											<?php echo esc_attr( $checked ); ?>						
										>
									<?php esc_html_e( 'Tratamiento de usted', 'argpd' ); ?>
								</label>
								<p class="description">
									<?php esc_html_e( 'Por defecto los textos aparecen escritos de forma familiar o de tú.', 'argpd' ); ?>					
								</p>

								<br/>
								<label  for="robots-index">
									<?php
										$checked = ( $settings->get_setting( 'robots-index' ) == 1 ) ? ( 'checked' ) : '';
									?>
									<input 	name="robots-index" 
											type="checkbox" 
											id="robots-index" 
											value="1"							
											<?php echo esc_attr( $checked ); ?>						
										>
									<?php esc_html_e( 'Las páginas legales aparecen en buscadores (Google, Bing...)', 'argpd' ); ?>
									<a 	href="https://superadmin.es/adapta-rgpd/nofollow-politica-privacidad/?utm_source=wordpressorg&utm_campaign=adapta_rgpd&utm_medium=direct" 
										target="_blank"
										rel="nofollow"
										>
										<span style="text-decoration: none" class="dashicons dashicons-editor-help"></span>
										Indexar o no indexar
									</a>
								</label>
								<p class="description">
									<?php esc_html_e( 'No recomendado.', 'argpd' ); ?>			
								</p>
							</fieldset>
						</td>
					</tr>
				</table>


				<?php submit_button(); ?>				
				</div>
			</div>

			<br><br>
			<div class="argpd-panel">
				<h2 class="title"><?php esc_html_e( 'Consentimiento y Deber de Informar', 'argpd' ); ?></h2>
				<p>
					<?php esc_html_e( 'Este apartado sirve para cumplir el deber de informar. Aprende los conceptos que necesitas en', 'argpd' ); ?> 
					<a href="https://superadmin.es/blog/privacidad/cumplir-deber-de-informar-rgpd/?utm_source=wordpressorg&utm_campaign=adapta_rgpd&utm_medium=direct" 
							 target="_blank"
							 >							
							<?php esc_html_e( 'esta guía.', 'argpd' ); ?>
					</a>
				</p>
			<hr/>
			
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label><?php esc_html_e( 'Activar', 'argpd' ); ?></label>
						</th>
						<td>
							<span><b><?php esc_html_e( 'Capa informativa en', 'argpd' ); ?></b></span>
							<br/><br/>
							<fieldset>
							<label  for="option-comments">
								<input 	name="option-comments" 
									type="checkbox" 
									id="option-comments" 
									value="1"							
									<?php ( $settings->get_setting( 'option-comments' ) == 1 ) && printf( 'checked' ); ?>
									>
									<?php esc_html_e( 'Comentarios ', 'argpd' ); ?>
							</label>
							<!--<p class="description">								
								<?php esc_html_e( 'Añade una casilla para obtener el consentimiento y mostrar la primera capa informativa.', 'argpd' ); ?>
							</p>-->													
							<br/>

							<label  for="option-forms">
								<input 	name="option-forms" 
										type="checkbox" 
										id="option-forms" 
										value="1"							
										<?php ( $settings->get_setting( 'option-forms' ) == 1 ) && printf( 'checked' ); ?>
										>
										<?php esc_html_e( 'Formularios', 'argpd' ); ?>
										<a href="https://superadmin.es/blog/privacidad/adecuar-formulario-al-rgpd/?utm_source=wordpressorg&utm_campaign=adapta_rgpd&utm_medium=direct" 
											target="_blank"><span style="text-decoration: none" class="dashicons dashicons-editor-help"></span>
											<?php esc_html_e( 'Guía para adecuar los formularios', 'argpd' ); ?>
										</a>
							</label>
							<br/>

							<label  for="option-footer">
								<input 	name="option-footer" 
										type="checkbox" 
										id="option-footer" 
										value="1"							
										<?php ( $settings->get_setting( 'option-footer' ) == 1 ) && printf( 'checked' ); ?>
										>
										<?php esc_html_e( 'Menú en el pie de página', 'argpd' ); ?>
										<a href="https://superadmin.es/adapta-rgpd/pie-de-pagina-ley-proteccion-de-datos/?utm_source=wordpressorg&utm_campaign=adapta_rgpd&utm_medium=direct" target="_blank">
											<span style="text-decoration: none;" class="dashicons dashicons-editor-help"></span>
											<?php esc_html_e( 'Añade más enlaces', 'argpd' ); ?>
										</a>

										
										<!--<a href="https://superadmin.es/adapta-rgpd/pie-de-pagina-ley-proteccion-de-datos/" target="_blank">
											<span style="text-decoration: none;" class="dashicons dashicons-editor-help"></span>
											Añadir más enlaces
										</a>-->
							</label>
							</fieldset>
						</td>
					</tr>
					
					<?php /* Texto consentimiento */ ?>
					<tr>
						<th scope="row">
							<label for="consentimiento-label"><?php esc_html_e( 'Texto', 'argpd' ); ?></label>
						</th>
						<td>
								<textarea 
									name="consentimiento-label" 
									id="consentimiento-label" 
									cols="60"
									rows="3"
									placeholder="He leído y acepto la política de privacidad."
									><?php echo esc_html( $settings->get_setting( 'consentimiento-label' ) ); ?></textarea>						
									<br><span class="description">
										<?php esc_html_e( 'Para mostrar el texto por defecto deja en blanco.', 'argpd' ); ?>	
									</span>
						</td>
					</tr>
				</tbody>
			</table>
			<?php submit_button(); ?>
			</div>


			<br><br>
			<div class="argpd-panel">
				<h2 class="title"><?php esc_html_e( 'Ley de Cookies', 'argpd' ); ?></h2>			
				<p>
					<?php esc_html_e( 'Este apartado sirve para cumplir la ley de Cookies.', 'argpd' ); ?>
					<a 	href="https://superadmin.es/blog/privacidad/crear-banner-de-cookies-en-wordpress/?utm_source=wordpressorg&utm_campaign=adapta_rgpd&utm_medium=direct" 
						target="_blank"
						>
						Aprende más aquí.
					</a>
				</p>
				<div>					
					<hr/>
					
						<table class="form-table">
							<tbody>	
								<?php /* Activar/Desactivar cookies */ ?>
								<tr>
									<th scope="row">
										<label for="option-cookies"><?php esc_html_e( 'Activar', 'argpd' ); ?></label>
									</th>
									<td>
										<label  for="option-cookies">
										<input 	name="option-cookies" 
												type="checkbox" 
												id="option-cookies" 
												value="1"							
												<?php ( $settings->get_setting( 'option-cookies' ) == 1 ) && printf( 'checked' ); ?>
												>
												<?php esc_html_e( 'Banner de Cookies ', 'argpd' ); ?>
										</label>
									</td>
								</tr>								

								
								
								
								<?php /* Texto */ ?>
								<tr>
									<th scope="row">
										<label for="cookies-label"><?php esc_html_e( 'Textos', 'argpd' ); ?></label>
									</th>
									<td>
										<table>
											<tr>																		
												<td style="padding: 0px">	
													<span><b><?php esc_html_e( 'Texto en el banner de cookies', 'argpd' ); ?></b></span>
													<br/><br/>												
													<textarea 
														name="cookies-label" 
														id="cookies-label" 
														cols="40"
														rows="3"
														placeholder="Esta web utiliza cookies. Puedes ver aquí la Política de Cookies."
														><?php echo esc_html( $settings->get_setting( 'cookies-label' ) ); ?></textarea>
														<br>
													<span class="description">
														<?php esc_html_e( 'Para mostrar el texto por defecto deja en blanco.', 'argpd' ); ?>
													</span>
												</td>
											</tr>

											<?php /* Ver política de cookies */ ?>
											<tr>	
												<td class="pt20-cell">
													<span><b><?php esc_html_e( 'Texto para el enlace &laquo;Ver Política de Cookies&raquo;', 'argpd' ); ?></b></span>
													<br/><br/>
													<input 	name="cookies-linklabel" 
															type="text"
															id="cookies-linklabel" 
															size="15"
															value="<?php echo esc_attr( $settings->get_setting( 'cookies-linklabel' ) ); ?>"
															placeholder="Puedes ver aquí la Política de Cookies"
															>		
												</td>
											</tr>

											<?php /* Texto del botón aceptar */ ?>
											<tr>
												<td class="pt20-cell">
													<span><b><?php esc_html_e( 'Texto para el botón &laquo;Aceptar&raquo;', 'argpd' ); ?></b></span>
													<br/><br/>
													<input 	name="cookies-btnlabel" 
															id="cookies-btnlabel" 
															type="text"
															size="10"
															value="<?php echo esc_attr( $settings->get_setting( 'cookies-btnlabel' ) ); ?>"
															>		
												</td>
											</tr>

											<?php /* Texto del botón rechazar */ ?>
											<tr>
												<td class="pt20-cell">
													<span><b><?php esc_html_e( 'Texto para el botón &laquo;Rechazar&raquo;', 'argpd' ); ?></b></span>
													<br/><br/>
													<input 	name="cookies-rejectlabel" 
															id="cookies-rejectlabel" 
															type="text"
															size="10"
															value="<?php echo esc_attr( $settings->get_setting( 'cookies-rejectlabel' ) ); ?>"
															>		
												</td>
											</tr>

										</table>
									</td>
								</tr>

								<?php /* show setting if not cookiesID  */ ?>
								<?php if ( $settings->get_setting( 'cookies-disabled' ) == 1 ) : ?>
								<tr>
									<th scope="row">
										<label for="cookies"><?php esc_html_e( 'Enlace', 'argpd' ); ?></label>
									</th>
									
									<td>
										<select name="cookies-id" id="cookies-id">
											<option value="0"
													<?php
													if ( ! strlen( $settings->get_setting( 'cookiesURL' ) == 0 ) ) {
														printf( 'selected="selected"' );}
													?>
													>
													Ninguna</option>											
											<?php
											foreach ( get_pages() as $page ) {
												$permalink = get_permalink( $page->ID );
												$selected = ( $permalink == $settings->get_setting( 'cookiesURL' ) ) ? ( 'selected="selected"' ) : '';
												printf( '<option value="%s" %s>%s</option>', esc_attr( $page->ID ), esc_attr( $selected ), esc_html( $page->post_title ) );
											}
											?>
										</select>
										<p>
											<span class="description">
												Selecciona la página a la que apunta el enlace "Ver Política de Cookies".
											</span>
										</p>
									</td>
								</tr>
								<?php endif; ?>


								<?php /* detectar cookies */ ?>	

								<tr>									
									<th scope="row">
										<label for="cookies-linklabel"><?php esc_html_e( 'Avanzado', 'argpd' ); ?></label>
									</th>
									<td>
										<div>
											<b><?php esc_html_e( 'Listado de Cookies instaladas', 'argpd' ); ?></b><br/><br/>
										<textarea id="lista-cookies" name="lista-cookies" cols="60" rows="3"
										><?php echo esc_html( str_replace( ' ', "\n", $settings->get_setting( 'lista-cookies' ) ) ); ?></textarea>

										</div>
										<a 	id="buscarCookies"
											class="button button-primary"
											style="background-color: #00C853; border:none"
											value="<?php esc_attr_e( 'Detectar cookies ahora', 'argpd' ); ?>" 
											>											
											<?php esc_html_e( 'Detectar cookies ahora', 'argpd' ); ?>
										</a>
									</td>									
								</tr>

								<?php /* Reject scripts */ ?>
								<tr>
									<th scope="row">
										
									</th>
									<td>
										<div>
										<b><?php esc_html_e( 'Bloqueo de scripts', 'argpd' ); ?></b><br/>
										<p>
											Los siguientes scripts serán bloqueados mientras el usuario no acepte la instalación de las cookies. <br/>De este modo se evita la instalación de cookies antes de obtener el consentimiento del usuario.
										</p>
										<br/>
										<?php
										$collection = $this->collect_assets();
										foreach ( $collection as $el => &$i ) {
											$checked = '';
											foreach ( $settings->get_setting( 'scripts-reject' ) as $script ) {
												if ( $script == $el ) {
													$checked = 'checked';
												}
											}
											?>
											<div style="padding: 2px 0">
											<label class="argpd-switch">												
												<input 
													id="scripts-reject-<?php echo esc_attr( $el ); ?>"
													name="scripts-reject-<?php echo esc_attr( $el ); ?>"
													type="checkbox" <?php echo esc_attr( $checked ); ?>>
												<span class="argpd-slider argpd-round"></span>
											</label>
											<?php
												printf( '%s (%s)', esc_html( $i['title'] ), esc_html( $i['script_name'] ) );
											?>
											</div>
											<?php
										}
										?>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
				</div>
				<?php submit_button(); ?>
			</div>			
			

			<br><br>
			<div class="argpd-panel">
				<h2 class="title"><?php esc_html_e( 'Estilo y diseño', 'argpd' ); ?></h2>
				<p>					
					<?php esc_html_e( 'Para personalizar el diseño del banner de cookies y de la primera capa informativa.', 'argpd' ); ?>
				</p>		
				<div>	
					<hr/>				
					
						<table class="form-table">
							<tbody>	
								<?php /* Theme */ ?>
								<tr>
									<th scope="row">
										<label for="cookies-theme"><?php esc_html_e( 'Tema', 'argpd' ); ?></label>
									</th>
									<td>

									<select name="cookies-theme" id="cookies-theme">
										<?php
											$cookie_themes = $settings->get_cookie_themes();
										foreach ( $cookie_themes as $key => $value ) {
											$selected = ( $key == $settings->get_setting( 'cookies-theme' ) ) ? ( 'selected="selected"' ) : '';
											printf( '<option value="%s" %s>%s</option>', esc_attr( $key ), esc_attr( $selected ), esc_html( $value ) );
										}
										?>
									</select>
									<a 	href="https://superadmin.es/adapta-rgpd/personalizar-banner-cookies/?utm_source=wordpressorg&utm_campaign=adapta_rgpd&utm_medium=direct" 
										 target="_blank"
										 >
										<span style="text-decoration: none" class="dashicons dashicons-editor-help"></span>
											<?php esc_html_e('Cómo personalizar con CSS', 'argpd'); ?>
									</a>
									</td>
								</tr>	

								<?php /* list style */ ?>
								<tr>
									<th scope="row">
										<label><?php esc_html_e( 'Listas', 'argpd' ); ?></label>
									</th>
									<td>
										<select name="informbox-theme" id="informbox-theme">
										<?php
											$informbox_themes = $settings->get_informbox_themes();
										foreach ( $informbox_themes as $key => $value ) {
											$selected = ( $key == $settings->get_setting( 'informbox-theme' ) ) ? ( 'selected="selected"' ) : '';
											printf( '<option value="%s" %s>%s</option>', esc_attr( $key ), esc_attr( $selected ), esc_html( $value ) );
										}
										?>
										</select>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				<?php submit_button(); ?>
				</div>
				
		</form>
		
		<?php
	}

	/**
	 * Echo 'Ayuda' tab of plugin settings
	 *
	 * @since  0.0.0
	 */
	public function argpd_ayuda_tab() {
		global $argpd_active_tab;
		$classname = ( ! empty( $argpd_active_tab ) && 'ayuda' == $argpd_active_tab ) ? 'nav-tab-active' : '';
		?>
		<a 	class="nav-tab <?php echo esc_attr( $classname ); ?>" 
			href="<?php echo esc_url( admin_url( 'admin.php?page=argpd&tab=ayuda' ) ); ?>">
			<?php esc_html_e( 'Ayuda', 'argpd' ); ?> 
		</a>
		<?php
	}

	/**
	 * Echo 'Ayuda' content of plugin settings
	 *
	 * @since  0.0.0
	 */
	public function argpd_ayuda_content() {
		global $argpd_active_tab;
		if ( empty( $argpd_active_tab ) || 'ayuda' != $argpd_active_tab ) {
			return;
		}
		?>
 
			<div>
				<h2 class="title"><?php esc_html_e( 'Ayuda', 'argpd' ); ?></h2>
				
				<?php
					echo $this->plugin->pages->ayuda_view();

					echo $this->plugin->pages->disclaimer();
				?>

			</div>		
		<?php
	}


	/**
	 * Echo plugin settings view
	 *
	 * @since  0.0.0
	 */
	public function options_ui() {

		global $argpd_active_tab;
		$argpd_active_tab = ! empty( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'ajustes';
		?>

		<?php /* ARGPD messages */ ?>
		<?php

			$message       = __( 'Algo fue mal.', 'argpd' );
			$message_class = 'notice-success';

		if ( isset( $_GET['message'] ) ) {
			switch ( $_GET['message'] ) {
				case 'saved':
					$message = __( 'Los cambios se han guardado.', 'argpd' );
					break;
				default:
					$message       = __( 'La página ya existe.', 'argpd' );
					$message_class = 'notice-error';
					break;
			}
			?>
				<div id="message" 
					 class="notice <?php echo esc_attr( $message_class ); ?> is-dismissible"
					 >
					 <p><?php echo esc_html( $message ); ?></p>
					 <button type="button" 
							  class="notice-dismiss"
							  >
							  <span class="screen-reader-text">
								  Descartar este aviso.
							  </span>
					</button>
				</div>
		<?php } ?>
		
		
		<div class="wrap">		
			<h1>Cumple con la RGPD</h1>
			
			<p>				
				Tu valoración de <a href="https://wordpress.org/support/plugin/adapta-rgpd/reviews?rate=5#new-post" target="_blank">★★★★★</a>&nbsp;&nbsp; ayuda a mejorar el plugin. ¡Muchas gracias!
			</p>

			<?php
				$settings = $this->plugin->argpd_settings;
			if ( $settings->get_setting( 'renuncia' ) == 0 ) {
				?>
				<div>
					<div>
						<?php echo $this->plugin->pages->disclaimer(); ?>
						<form method="post" action="admin-post.php">
						<?php wp_nonce_field( 'argpd' ); ?>
							<input type="hidden" value="argpd_disclaimer" name="action"/>

							<p class="submit">
								<input 	type="submit" 
										name="submit" 
										id="submit" 
										class="button button-primary" 
										value="Aceptar">
							</p>
						</form>
					</div>
				</div>
				

			<?php } else { ?>

			<div>
				<h2 class="nav-tab-wrapper">
					<?php
					// echo tabs by tab param.
					do_action( 'argpd_settings_tab' );
					?>
				</h2>
		
				<?php
					// echo content by tab param.
					do_action( 'argpd_settings_content' );
				?>
			</div>
			<?php } ?>
			<hr>
			<p>				
				Tu valoración de <a href="https://wordpress.org/support/plugin/adapta-rgpd/reviews?rate=5#new-post" target="_blank">★★★★★</a>&nbsp;&nbsp; ayuda a mejorar el plugin. ¡Muchas gracias!
			</p>		
		</div>
		<?php
	}




	/**
	 * Exception for address starting from "//example.com" instead of
	 * "http://example.com". WooCommerce likes such a format
	 *
	 * @param string $url   Incorrect URL.
	 *
	 * @return string      Correct URL.
	 */
	public function prepare_url( $url ) {
		if ( isset( $url[0] ) && isset( $url[1] ) && '/' == $url[0] && '/' == $url[1] ) {
			$out = ( is_ssl() ? 'https:' : 'http:' ) . $url;
		} else {
			$out = $url;
		}

		return $out;
	}

	/**
	 * Get plugin data from folder name
	 *
	 * @param $name
	 *
	 * @return array
	 */
	public function get_plugin_data( $name ) {
		$data = [];

		if ( $name ) {
			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}
			$all_plugins = get_plugins();
			if ( ! empty( $all_plugins ) ) {
				foreach ( $all_plugins as $plugin_path => $plugin_data ) {
					if ( strpos( $plugin_path, $name . '/' ) !== false ) {
						$data             = $plugin_data;
						$data['basename'] = $plugin_path;
						break;
					}
				}
			}
		}

		return $data;
	}

	/**
	 * Get information regarding used assets
	 *
	 * @return bool
	 */
	public function collect_assets() {
		$collection = [];
		$data = wp_scripts();
		foreach ( $data->done as $el ) {
			if ( isset( $data->registered[ $el ] ) ) {

				if ( 'argpd-cookies-eu-banner' == $el ) {
					continue;
				}

				if ( isset( $data->registered[ $el ]->src ) ) {
					$url       = $this->prepare_url( $data->registered[ $el ]->src );
					$url_short = str_replace( get_home_url(), '', $url );

					if ( strpos( $url, plugins_url() ) !== 0 ) {
						continue;
					}

					$clean_url     = str_replace( WP_PLUGIN_URL . '/', '', $url );
					$url_parts     = explode( '/', $clean_url );
					$resource_name = ! empty( $url_parts[0] ) ? $url_parts[0] : null;

					if ( ! isset( $collection[ $el ] ) ) {
						$plugin_data = $this->get_plugin_data( $resource_name );
						$collection[ $el ] = [
							'url_full'  => $url,
							'url_short' => $url_short,
							'resource_name' => $resource_name,
							'script_name' => substr( $url_short, strrpos( $url_short, '/' ) + 1 ),
							'title' => $plugin_data['Title'],
							'author' => $plugin_data['Author'],
							'el' => $el,
						];
					}
				}
			}
		}
		return $collection;
	}

}
