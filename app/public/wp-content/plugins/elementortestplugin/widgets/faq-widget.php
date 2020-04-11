<?php

//Class 2.12

class Elementor_Faq_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return "FaqWidget";
	}

	public function get_title() {
		return __("FAQ Widget","eltp");
	}

	public function get_icon() {
		return "fa fa-question";
	}

	public function get_categories() {
		//return array("general","basic");
		//return array("general");
		//Class 1.4
		return array("general");
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'eltp' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control('title',[
			'label' => __('Title','eltp'),
			'type' => \Elementor\Controls_Manager::TEXT,
		]);
		$repeater->add_control('description',[
			'label' => __('Description','eltp'),
			'type' => \Elementor\Controls_Manager::TEXTAREA, // or WYSIWYG
		]);

		$this->add_control('faqs',[
			'label' => __('FAQs', 'eltp'),
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_fields' => '{{{ title }}}',
			'default' => [
				[
					'title' => 'FAQ 1',
					'description' => 'DESC 1'
				],
				[
					'title' => 'FAQ 2',
					'description' => 'DESC 2'
				],
			]
		]);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if($settings['faqs']) {
			foreach($settings['faqs'] as $index=>$faq) {
				$key = $this->get_repeater_setting_key('title','faqs',$index);
				$this->add_inline_editing_attributes($key,none);
				echo "<h3 ". $this->get_render_attribute_string($key) ." >" . $faq['title'] . "</h3>";
				echo "<p>" . $faq['description'] . "</p>";
			}
		}
	}

	protected function _content_template() {
		?>
		<#
			if(settings.faqs.length){
				_.each(settings.faqs, function(faq, index){
					var key = view.getRepeaterSettingKey('title','faqs', index);
					view.addInlineEditingAttributes(key,'none');
					#>
					<h3 {{{ view.getRenderAttributeString(key) }}}>{{{ faq.title }}}</h3>
					<p>{{{ faq.description }}}</p>
					<#
				});
			};
		#>
		<?php
	}

}



?>