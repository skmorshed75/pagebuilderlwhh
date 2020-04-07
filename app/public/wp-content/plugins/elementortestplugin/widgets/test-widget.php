<?php

/*
mmmmm
*/

class Elementor_Test_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return "TestWidget";
	}

	public function get_title() {
		return __("TestWidget","eltp");
	}

	public function get_icon() {
		return "fa fa-image";
	}

	public function get_categories() {
		//return array("general","basic");
		//return array("general");
		//Class 1.4
		return array("general", "test_category", "sliders");
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'eltp' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __( 'Type Something', 'eltp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Type your text', 'eltp' ),
			]
		);

		$this->add_control(
			'alignment',
			[
				'label' => __( 'Alignment', 'eltp' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'left'  => __( 'Left', 'eltp' ),
					'right' => __( 'Right', 'eltp' ),
					'center' => __( 'Center', 'eltp' ),
				],

			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$heading = $settings['heading'];
		$alignment = $settings['alignment'];
		echo "<h1 style = 'text-align:".esc_attr($alignment)."'>".esc_html($heading)."</h1>";
	}

	protected function _content_template() {}
}