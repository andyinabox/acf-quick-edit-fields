<?php

namespace ACFQuickEdit\Fields;

if ( ! defined( 'ABSPATH' ) )
	die('Nope.');

class NumberField extends Field {

	public static $quickedit = true;

	public static $bulkedit = true;
	
	/**
	 *	@inheritdoc
	 */
	public function render_column( $object_id ) {
		$value = get_field( $this->acf_field['key'], $object_id );
		$output = '';
		if ( $value === "" ) {
			$output .= __('(No value)', 'acf-quick-edit-fields');
		} else {
			$output .= number_format_i18n($value, strlen(substr(strrchr($value, "."), 1)) );
		}
		return $output;
	}

	/**
	 *	@inheritdoc
	 */
	public function render_input( $input_atts, $column ) {
		$input_atts += array(
			'class'	=> 'acf-quick-edit',
			'type'	=> 'number', 
			'min'	=> $this->acf_field['min'], 
			'max'	=> $this->acf_field['max'],
			'step'	=> $this->acf_field['step'], 
		);
		echo '<input '. acf_esc_attr( $input_atts ) .' />';

	}


}