<?php

Shoestrap_Kirki::add_field( array(
	'type'        => 'color',
	'settings'    => 'background_color',
	'label'       => __( 'Background Color', 'shoestrap' ),
	'section'     => 'colors',
	'default'     => '#FFFFFF',
	'priority'    => 10,
	'transport'   => 'auto',
	'choices'     => array(
		'alpha'   => false,
	),
	'transport'   => 'refresh',
	'output'      => array(
		array(
			'element'  => array(
				'body.custom-background',
				'table thead',
				'table tbody',
				'table tfoot',
			),
			'property' => 'background-color',
		),
	),
));

Shoestrap_Kirki::add_field( array(
	'type'        => 'color-palette',
	'settings'    => 'primary_color',
	'label'       => __( 'Primary Color', 'shoestrap' ),
	'section'     => 'colors',
	'default'     => '#29B6FC',
	'priority'    => 10,
	'transport'   => 'auto',
	'choices'     => array(
		'colors' => ( class_exists( 'Kirki_Helper' ) ) ? Kirki_Helper::get_material_design_colors( '400' ) : array(),
		'size'   => 32,
	),
	'transport'   => 'refresh',
	'output'      => array(
		array(
			'element'  => array( 'a', 'a:hover', 'a:visited' ),
			'property' => 'color',
		),
		array(
			'element'  => array(
				'.menu .active > a',
				'button',
				'html input[type="button"]',
				'input[type="reset"]',
				'input[type="submit"]',
			),
			'property' => 'background',
		),
		array(
			'element'       => '.dropdown.menu.medium-horizontal > li.is-dropdown-submenu-parent > a::after',
			'property'      => 'border-color',
			'value_pattern' => '$ transparent transparent'
		),
		array(
			'element'       => '.is-dropdown-submenu .is-dropdown-submenu-parent.opens-left > a::after',
			'property'      => 'border-color',
			'value_pattern' => 'transparent $ transparent transparent'
		),
		array(
			'element'       => '.is-dropdown-submenu .is-dropdown-submenu-parent.opens-right > a::after',
			'property'      => 'border-color',
			'value_pattern' => 'transparent transparent transparent $'
		),
	),
));
