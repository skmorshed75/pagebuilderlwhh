<?php

//Class 3.8

class Elementor_Infobox_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return "InfoboxWidget";
	}

	public function get_title() {
		return __("Infobox Widget","elementortestplugin");
	}

	public function get_icon() {
		return "fa fa-info";
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

		$this->add_control('box_color',[
			'type' => \Elementor\Controls_Manager::COLOR,
			'label' => __("Box Color", "eltp"),
			'default' => '#b6b8dc',
			'selectors' => [
				'{{WRAPPER}} .stamp' => 'background: {{VALUE}}'
			],
		]);

		$this->add_control('box_svg',[
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'label' => __("Box Image SVG","eltp"),
			'default' => '<svg width="40" height="40">
    				<rect x="10" y="0" rx="0" ry="0" width="40" height="40" style="fill:red;stroke:black;stroke-width:5;opacity:0.5"></rect>
    			</svg>'
		]);

		$this->add_control('box_headline',[
			'type' => \Elementor\Controls_Manager::TEXT,
			'label' => __("Box Headline","eltp"),
			'label_block' => true,
			'default' => 'Headline'
		]);

		$this->add_control('box_text',[
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'label' => __("Box Text","eltp"),
			'default' => ''
		]);

		$this->add_control('box_link',[
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'label' => __("Box Link","eltp"),
		]);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$link = $this->get_settings('box_url');
		$headline = $this->get_settings('box_headline');
		$items = $this->get_settings('box_text');
		$items_array = explode("\n", $items);
		$items_list = '';
		//$item = esc_html($item);
		foreach($items_array as $item) {
			if(trim($item) != ''){
				$items_list .="<li>{$item}</li>";
			
			}
			//
		}
		$svg_image = $this->get_settings('box_svg');

		?>
		<a href="<?php echo esc_url($link['url']); ?>">
        	<div class="infostamp">
        		<div class="stamp">
        			<?php echo $svg_image; ?>
        		</div>
        		<div class="data">	
        			<h3><?php echo $headline; ?></h3>
        			<ul>
        				<?php echo $items_list; ?>
        			</ul>
        		</div>
        		<div class="clear">	</div>
        	</div>
        </a>
		<?php
	}
/*
	protected function _content_template() {
	
	}
*/
}



?>