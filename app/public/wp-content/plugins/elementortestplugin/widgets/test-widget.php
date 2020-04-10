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

		//Class 2.1 Image Control
		$this->start_controls_section(
			'image_section',
			[
				'label' => __('Image', 'eltp'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'imagex',
			[
				'label' => __('Image','eltp'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' =>[
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'default' => 'large',
				'name' => 'imagesz'
			]
		);
		$this->end_controls_section();
		// End class 2.1		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$heading = $settings['heading'];
		$description = $settings['heading_description'];
		//Class 1.9
		$this->add_inline_editing_attributes('heading','advanced'); //none / basic / advanced to show toolbar
		$this->add_inline_editing_attributes('heading_description','basic'); //none / basic / advanced to show toolbar while selected title in edit mode
		$this->add_render_attribute('heading', [
			'class' => 'heading' //Add heading class in the last
		]);
		$this->add_render_attribute('heading_description', [
			'class' => 'description' //Add description class in the last
		]);
		//End Class 1.9
		//$alignment = $settings['alignment'];
		//echo "<h1 style = 'text-align:".esc_attr($alignment)."'>".esc_html($heading)."</h1>";
		//Class 1.6 & 1.9
		echo "<h1 ". $this->get_render_attribute_string('heading') ." >" . esc_html($heading) . "</h1>";
		echo "<p ". $this->get_render_attribute_string('heading_description') ." >" . wp_kses_post($description) . "</p>";
		// echo "<p class='description'>" . wp_kses_post($description) . "</p>";
		//Class 2.1
		//print_r($settings[image]);
		//echo wp_get_attachment_image($settings['image']['id'],'large');
		//or
		echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings,'imagesz','imagex');
		//End Class 2.1
	}

	protected function _content_template() {
		//Class 1.7
		?>

		<!--Javascrip console log If want to see the Console log -->
		<#
			var image = {
			id:settings.imagex.id,
			url:settings.imagex.url,
			size:settings.imagesz_size,
			dimension:settings.imagesz_custom_dimension
			}

			var imageUrl = elementor.imagesManager.getImageUrl(image);
			<!-- console.log(imageUrl); -->
		#>

		<!-- Class 1.9 -->
		<#
			view.addInlineEditingAttributes('heading','none');
			view.addRenderAttribute('heading',{'class':'heading'});

			view.addInlineEditingAttributes('heading_description','none');
			view.addRenderAttribute('heading_description',{'class':'description'});
		#>
		<h1 {{{ view.getRenderAttributeString('heading') }}}>{{{settings.heading}}}</h1>
		<p {{{ view.getRenderAttributeString('heading_description') }}}>{{{settings.heading_description}}}</p>
		<!-- class 2.1 -->
		<!-- <img src="{{{settings.imagex.url}}}" alt=""> -->
		<img src="{{{ imageUrl }}}" alt="">
		<!-- End class 2.1 -->
		<!--End Class 1.9 -->
		<!-- Javascrip console log -->
		<!-- <h1 class="heading">
			{{{settings.heading}}}
		</h1> -->
		<!-- <p class="description">
			{{{settings.heading_description}}}
		</p> -->
		<?php			
		//End Class 1.7
	}
}