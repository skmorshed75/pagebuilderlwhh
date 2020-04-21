<?php

//Class 3.6

class Elementor_Progressbar_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return "ProgressbarWidget";
	}

	public function get_title() {
		return __("Progressbar Widget","elementortestplugin");
	}

	public function get_icon() {
		return "fa fa-spinner";
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
				'label' => __( 'Content', 'elementortestplugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		//Class 3.7
		$this->add_control('bar_color', [
			'type' => \Elementor\Controls_Manager::COLOR,
			'label' => __("Color","elementortestplugin"),
			'default' => '#222222'
		]);
		$this->add_control('bar_fill', [
			'type' => \Elementor\Controls_Manager::TEXT,
			'label' => __("Fill Amount","elementortestplugin"),
			'default' => '0.8'
		]);
		$this->add_control('bar_height', [
			'type' => \Elementor\Controls_Manager::TEXT,
			'label' => __("Bar Height","elementortestplugin"),
			'default' => '10px'
		]);
		//End Class 3.7

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		//class 3.7
		$color = $this->get_settings('bar_color');
		$fill = $this->get_settings('bar_fill');
		$height = $this->get_settings('bar_height');
		//end class 3.7

		?>
		<!-- class 3.6 and 3.7 -->
		<div class="progress" data-bar_color = "<?php echo $color; ?>" data-bar_fill = "<?php echo $fill; ?>" data-bar_height = "<?php echo $height; ?>"></div>
		<?php
	}
/*
	protected function _content_template() {
	
	}
*/
}



?>