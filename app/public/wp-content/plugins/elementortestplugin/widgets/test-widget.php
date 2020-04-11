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

		//Class 2.2
		$this->start_controls_section(
			'demo_section',
			[
				'label' => __('Control Demo', 'eltp'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'demo_select2',
			[
				'label' => __( 'Select 2 Demo', 'eltp' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'label_block' => true,
				'options' => [
					'BD'  => __( 'Bangladesh', 'eltp' ),
					'IN' => __( 'India', 'eltp' ),
					'BR' => __( 'Brazil', 'eltp' ),
					'AR' => __( 'Argentina', 'eltp' ),
					'AU' => __( 'Australia', 'eltp' ),
					'DK' => __( 'Denmark', 'eltp' ),
				],
				//Class 1.6
				'selectors' =>[
					'{{WRAPPER}} p.description' => 'text-align:{{VALUE}}'
				],
				//End Class 1.6
			]
		);
		//class 1.6
		//End Class 2.2
		
		//Class 2.5
		$this->add_control(
			'gallery',
			[
				'label' => __('Gallery Control','eltp'),
				'type' => \Elementor\Controls_Manager::GALLERY,
			]
		);
		//End Class 2.5

		//Class 2.6
		$this->add_control(
			'demo_icon',
			[
				'label' => __('Icon Control','eltp'),
				'type' => \Elementor\Controls_Manager::ICON,
				'include' => [
					'fa fa-facebook',
					'fa fa-twitter',
					'fa fa-rss',
					'fa fa-github'
				],
				'default' => 'fa fa-rss'
			]
		);
		//End Class 2.6


		//End Class 2.8
		$this->add_control(
			'demo_popover',
			[
				'label' => __('Fonts','eltp'),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]

		);
		$this->start_popover();
			//Class 2.7
			$this->add_control(
				'demo-font_p1',
				[
					'label' => __('Font for P1','eltp'),
					'type' => \Elementor\Controls_Manager::FONT,
					'default' =>"'Open Sans', 'sans-serif'",
					'selectors' =>[
						'{{WRAPPER}} .p1'=>'font-family:{{VALUE}}'
					]
				]

			);

			$this->add_control(
				'demo-font_p2',
				[
					'label' => __('Fonts for P2','eltp'),
					'type' => \Elementor\Controls_Manager::FONT,
					'default' =>"'Arial', 'sans-serif'",
					'selectors' =>[
						'{{WRAPPER}} .p2'=>'font-family:{{VALUE}}',
					]
				]

			);
			//End Class 2.7
			$this->end_popover();
			//End Class 2.8
			
			//End Class 2.9
			$this->add_control(
			'demo-slider',
			[
				'label' => __('Fonts Size','eltp'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px','%','rem'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 120,
						'step' => 5
					],
					'%' => [
						'min' => 10,
						'max' => 200,
						'step' => 10
					],
					'rem' => [
						'min' => 5,
						'max' => 80,
						'step' => 2
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 60
				],
				'selectors' => [
					'{{WRAPPER}} .p1 '=>'font-size:{{SIZE}}{{UNIT}}'
				]
			]

		);
		//End Class 2.9
		
		// Class 2.10
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __('Typography for P4','eltp'),
				'name' => __('demo_typography','eltp'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				//'selectors' =>['{{WRAPPER}} .p3',{{WRAPPER}} .p2'],
				'selector' =>'{{WRAPPER}} .p3',
			]

		);
		// End Class 2.10

		// Class 2.11
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'label' => __('Text Shadow','eltp'),
				'name' => __('demo_ts','eltp'),
				//'selectors' =>['{{WRAPPER}} .p3',{{WRAPPER}} .p2'],
				'selector' =>'{{WRAPPER}} .p3',
			]

		);
		// End Class 2.10
		
		$this->end_controls_section();



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

		//Class 2.2
		$countries = $settings['demo_select2'];
		foreach ($countries as $country){
			echo $country."</br>";
		}
		//print_r($countries);
		//End Class 2.2
		//Class 2.5
		echo '<div>';
		$gallery_images = $settings['gallery'];
		echo '<pre>';
		//print_r($gallery_images);
		foreach ($gallery_images as $gallery_image) {
			echo wp_get_attachment_image($gallery_image['id'],'medium');
		}
		echo '</pre>';
		echo '</div>';
		//End Class 2.5
		
		//Class 2.6
		echo '<div>';
		echo '<i class = "'. $settings['demo_icon'] .'"></i>';
		echo '</div>';
		//End Class 2.6

		// Class 2.7
		echo '<div>';
		?>
		<p class="p1">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
		</p>
		<p class="p2">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
		</p>
		<!-- Class 2.10 -->
		<p class="p3">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
		</p>
		<?php
		echo '</div>';
		//End Class 2.7
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
		<!-- End Class 1.7 -->
		<!-- Class 2.2 test with JavaScript -->
		<ul>
			<#
				_.each(settings.demo_select2,function(country){ #>
					<li>{{{ country }}}</li>
				<# });
			#>
		</ul>
		<!-- End Class 2.2 test with JavaScript -->
		<!-- Class 2.5 -->
		<div>
			<#
				_.each(settings.gallery, function(image){
					var image = {
						id:image.id,
						url:image.url,
						size:'thumbnail',
					}
					var imageUrl = elementor.imagesManager.getImageUrl(image)
					#>
					<img src = '{{ imageUrl }}'/>
					<#
				});
			#>
		</div>
		<!-- End Class 2.5 -->

		<!-- Class 2.6 -->
		<div>
			<i class = "{{settings.demo_icon}}"></i>
		</div>
		<!-- End Class 2.6 -->

		<!-- Class 2.7 -->
		<p class="p1">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
		</p>

		<p class="p2">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
		</p>

		<!-- Class 2.10 -->
		<p class="p3">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
		</p>

		<!-- End Class 2.7 -->
		<?php			
		
	}
}