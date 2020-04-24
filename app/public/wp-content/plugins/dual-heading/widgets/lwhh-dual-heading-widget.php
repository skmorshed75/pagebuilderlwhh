<?php

//Class 6.2

class LWHH_Dual_Heading extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Dual Heading name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'dual_heading_widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Dual Heading title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Dual Heading', 'lwhhedh' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Dual Heading icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'fa fa-heading';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Dual Heading belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register Dual Heading controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->register_content_controls();
		$this->register_style_controls();

	}

	/**
	 * Register Dual Heading content ontrols.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	function register_content_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'lwhhedh' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading_one',
			[
				'label'       => __( 'Heading One', 'lwhhedh' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'input_type'  => 'text',
				'placeholder' => __( 'Heading One', 'lwhhedh' ),
				'default'     => __( 'The Quick Brown Fox', 'lwhhedh' ),
			]
		);

		$this->add_control(
			'heading_two',
			[
				'label'       => __( 'Heading Two', 'lwhhedh' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'input_type'  => 'text',
				'placeholder' => __( 'Heading Two', 'lwhhedh' ),
				'default'     => __( 'Jumps Over the Lazy Dog', 'lwhhedh' ),
			]
		);

		$this->add_control(
			'heading_one_tag',
			[
				'label'       => __( 'Heading One HTML Tag', 'lwhhedh' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'input_type'  => 'text',
				'placeholder' => __( '<h1>', 'lwhhedh' ),
				'default'     => __( '<h1>', 'lwhhedh' ),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register Dual Heading style ontrols.
	 *
	 * Adds different input fields in the style tab to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_style_controls() {

		$this->start_controls_section(
			'style_section_one',
			[
				'label' => __( 'Heading One Style', 'lwhhedh' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_one_color',
			[
				'label'     => __( 'Heading One Color', 'lwhhedh' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ff0000',
				'selectors' => [
					'{{WRAPPER}} .heading_one' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'heading_one_typography',
				'label'    => __( 'Typography', 'lwhhedh' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .heading_one',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section_two',
			[
				'label' => __( 'Heading Two Style', 'lwhhedh' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_two_color',
			[
				'label'     => __( 'Heading Two Color', 'lwhhedh' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#0000ff',
				'selectors' => [
					'{{WRAPPER}} .heading_two' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'heading_two_typography',
				'label'    => __( 'Typography', 'lwhhedh' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .heading_two',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Dual Heading output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings   = $this->get_settings_for_display(); //and echo $settings['dummy_text']
		$heading_one = $this->get_settings( 'heading_one' );
		$this->add_render_attribute( 'heading_one', 'class', 'heading_one' );
		$this->add_inline_editing_attributes( 'heading_one' );
		$heading_one_tag = $this->get_settings('heading_one_tag');

		$heading_two = $this->get_settings( 'heading_two' );
		$this->add_render_attribute( 'heading_two', 'class', 'heading_two' );
		$this->add_inline_editing_attributes( 'heading_two' );
		?>
        <<?php echo esc_html($heading_one_tag); ?>>
        	<span <?php echo $this->get_render_attribute_string( 'heading_one' ) ?>> <?php echo esc_html( $heading_one ); ?></span>
        	<span <?php echo $this->get_render_attribute_string( 'heading_two' ) ?>> <?php echo esc_html( $heading_two ); ?></span>
        </<?php echo esc_html($heading_one_tag); ?>>
		<?php


	}

	/**
	 * Render Dual Heading output on the frontend.
	 *
	 * Written in JS and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_templatexxx() {
		$this->add_render_attribute( 'dummy_text', 'class', 'dummy_text' );
		$this->add_inline_editing_attributes( 'dummy_text', 'none' );
		?>
        <div <?php echo $this->get_render_attribute_string( 'dummy_text' ) ?>> {{ settings.dummy_text }}</div>
		<?php
	}

}