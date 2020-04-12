<?php

//Class 3.1

class Elementor_pricing_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return "PricingWidget";
	}

	public function get_title() {
		return __("Pricing Widget","eltp");
	}

	public function get_icon() {
		return "fa fa-table";
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
		//Class 3.2
		$this->add_control('title',[
			'label' => __('Title','eltp'),
			'tab' => \Elementor\Controls_Manager::TEXT,
		]);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control('title',[
			'label' => __('Title', 'eltp'),
			'type' => \Elementor\Controls_Manager::TEXT,
		]);
		$repeater->add_control('description',[
			'label' => __('Description', 'eltp'),
			'type' => \Elementor\Controls_Manager::TEXTAREA,
		]);
		$repeater->add_control('pricing',[
			'label' => __('Pricing', 'eltp'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('Buy Now','eltp')
		]);
		$repeater->add_control('button_url',[
			'label' => __('Button URL', 'eltp'),
			'type' => \Elementor\Controls_Manager::URL,
		]);
		$repeater->add_control('button_title',[
			'label' => __('Button Title', 'eltp'),
			'type' => \Elementor\Controls_Manager::TEXT,
		]);

		$this->add_control('pricings',[
			'label' => __('Pricing Columns','eltp'),
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_field' => '{{{ title }}}',
		]);
		//End Class 3.2

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		//Class 3.2
		$heading = $this->get_settings('title');
		$pricings = $this->get_settings('pricings');

		//End Class 3.2

?>
  <section class="fdb-block" style="background-image: url(<?php echo plugins_url("../assets/img/red.svg",__FILE__); ?>;">
      <div class="container">
        <div class="row text-center">
          <div class="col">
          	<!-- class 3.2 -->
            <h1 class="text-white"><?php echo esc_html($heading); ?></h1>
            <!-- class 3.2 -->
          </div>
        </div>
    
        <div class="row mt-5 align-items-center">
        	<?php //Class 3.2
        	if($pricings){
        		foreach($pricings as $pricing) {
        			?>
			        <div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center">
			            <div class="fdb-box p-4">
			              <h2><?php echo esc_html($pricing['title']); ?></h2>
			              <p class="lead"><?php echo esc_html($pricing['description']); ?></p>
			    
			              <p class="h1 mt-5 mb-5"><?php echo apply_filters('pricing_prefix','$'); ?><?php echo esc_html($pricing['pricing']) ; ?></p>
			    
			              <p><a href="<?php echo esc_url($pricing['button_url']['url'])?>" class="btn btn-dark"><?php echo esc_html($pricing['button_title']) ; ?></a></p>
			            </div>
			        </div>
        			<?php
        		}
        	}
        	//End Class 3.2
        	?>

        </div>
      </div>
    </section>  
<?php
	}

	protected function _content_template() {
		
	}

}



?>