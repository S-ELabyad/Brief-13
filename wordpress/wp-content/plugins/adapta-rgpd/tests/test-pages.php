<?php
/**
 * Nos Adaptamos RGPD Pages Tests.
 *
 * @since   0.0.0
 * @package Nos_Adaptamos_RGPD
 */
class ARGPD_Pages_Test extends WP_UnitTestCase {

	/**
	 * Test if our class exists.
	 *
	 * @since  0.0.0
	 */
	function test_class_exists() {
		$this->assertTrue( class_exists( 'ARGPD_Pages' ) );
	}

	/**
	 * Test that we can access our class through our helper function.
	 *
	 * @since  0.0.0
	 */
	function test_class_access() {
		$this->assertInstanceOf( 'ARGPD_Pages', adaptargpd()->pages );
	}

	/**
	 * Replace this with some actual testing code.
	 *
	 * @since  0.0.0
	 */
	function test_sample() {
		$this->assertTrue( true );
	}
}
