<?php
/**
 * WPML and Polylang compatibility functions.
*/
/**
 * Filter to translate strings
*/
function elitepress_translate_single_string( $original_value, $domain ) {
	if ( is_customize_preview() ) {
		$wpml_translation = $original_value;
	} else {
		$wpml_translation = apply_filters( 'wpml_translate_single_string', $original_value, $domain, $original_value );
		if ( $wpml_translation === $original_value && function_exists( 'pll__' ) ) {
			return pll__( $original_value );
		}
	}
	return $wpml_translation;
}
add_filter( 'elitepress_translate_single_string', 'elitepress_translate_single_string', 10, 2 );

/**
 * Helper to register pll string.
 *
 * @param String    $theme_mod Theme mod name.
 */
function elitepress_pll_string_register_helper( $theme_mod ) {
	if ( ! function_exists( 'pll_register_string' ) ) {
		return;
	}

	$repeater_content = get_theme_mod( $theme_mod );
	$repeater_content = json_decode( $repeater_content );
	if ( ! empty( $repeater_content ) ) {
		foreach ( $repeater_content as $repeater_item ) {
			foreach ( $repeater_item as $field_name => $field_value ) {
				if ( $field_value !== 'undefined' ) {
					
						if ( $field_name !== 'id' ) {
							$f_n = ucfirst( $field_name );
							pll_register_string( $f_n, $field_value);
					}
				}
			}
		}
	}
}

/** Service WPML/Polylang translation*/
function elitepress_features_register_strings() {
	elitepress_pll_string_register_helper( 'elitepress_service_content', 'Service section' );
}

/** Testimonial WPML/Polylang translation*/
	function elitepress_testimonials_register_strings() {
	elitepress_pll_string_register_helper( 'elitepress_testimonial_content', 'Testimonials section' );
 }

/** Slider WPML/Polylang translation*/
function elitepress_slider_register_strings() {
	elitepress_pll_string_register_helper( 'elitepress_slider_content', 'Slider section' );
}

if ( function_exists( 'pll_register_string' ) ) {
	add_action( 'after_setup_theme', 'elitepress_features_register_strings', 11 );
	add_action( 'after_setup_theme', 'elitepress_testimonials_register_strings', 11 );
	add_action( 'after_setup_theme', 'elitepress_slider_register_strings', 11 );
}