<?php
/**
 * Adapta_RGPD.
 *
 * @since   0.0.0
 * @package Adapta_RGPD
 */
class Adapta_RGPD_Test extends WP_UnitTestCase {

	/**
	 * Test if our class exists.
	 *
	 * @since  0.0.0
	 */
	function test_class_exists() {
		$this->assertTrue( class_exists( 'Adapta_RGPD') );
	}

	/**
	 * Test that our main helper function is an instance of our class.
	 *
	 * @since  0.0.0
	 */
	function test_get_instance() {
		$this->assertInstanceOf(  'Adapta_RGPD', adaptargpd() );
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
