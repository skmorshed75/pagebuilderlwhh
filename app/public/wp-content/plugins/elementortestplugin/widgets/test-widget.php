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
				'label' => __( 'Heading', 'eltp' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Type your heading', 'eltp' ),
			]
		);
		//class 1.6
		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Heading Description', 'eltp' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'input_type' => 'text',
				'placeholder' => __( 'Type your Description', 'eltp' ),
			]
		);
		// end 1.6
		$this->end_controls_section();

		//Class 1.5
		$this->start_controls_section(
			'position_section',
			[
				'label' => __('Position', 'eltp'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
				//Class 1.6
				'selectors' =>[
					'{{WRAPPER}} h1.heading' => 'text-align:{{VALUE}}'
				],
				//End Class 1.6
			]
		);
		//class 1.6
		$this->add_control(
			'description_alignment',
			[
				'label' => __( 'Description Alignment', 'eltp' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'left'  => __( 'Left', 'eltp' ),
					'right' => __( 'Right', 'eltp' ),
					'center' => __( 'Center', 'eltp' ),
				],
				//Class 1.6
				'selectors' =>[
					'{{WRAPPER}} p.description' => 'text-align:{{VALUE}}'
				],
				//End Class 1.6
			]
		);
		//class 1.6
		$this->end_controls_section();


		//Class 1.6
		$this->start_controls_section(
			'color_section',
			[
				'label' => __('Color', 'eltp'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);		
		$this->add_control(
			'heading_color',
			[
				'label' => __( 'Heading Color', 'eltp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#224400',
				'selectors' =>[
					'{{WRAPPER}} h1.heading' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Description Color', 'eltp' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#666666',
				'selectors' =>[
					'{{WRAPPER}} p.description' => 'color: {{VALUE}}',
				]
			]
		);
		//End class 1.6		
		$this->end_controls_section();		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$heading = $settings['heading'];
		$heading_description = $settings['heading_description'];
		//$alignment = $settings['alignment'];
		//echo "<h1 style = 'text-align:".esc_attr($alignment)."'>".esc_html($heading)."</h1>";
		//Class 1.6
		echo "<h1 class='heading'>".esc_html($heading)."</h1>";
		echo "<p class='description'>".wp_kses_post($heading_description)."</p>";
	}

	protected function _content_template() {
		//Class 1.7
		?>

		<!--Javascrip console log If want to see the Console log -->
		#>
		console.log(settings);
		<#
		<!-- Javascrip console log -->
		<h1 class="heading">
			{{{settings.heading}}}
		</h1>
		<p class="description">
			{{{settings.heading_description}}}
		</p>
		<?php			
		//End Class 1.7
	}
}