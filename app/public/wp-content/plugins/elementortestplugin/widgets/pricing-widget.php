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

		//Class 3.5
		$this->add_control('style',[
			'label' => __('Style','eltp'),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' =>[
				'default' => __('Default', 'eltp'),
				'blue' => __('Blue Style','eltp'),
			],
			'default' =>'default',
		]);
		$this->add_control('style_select_hidden',[
			'label' => __('Title','eltp'),
			'type' => \Elementor\Controls_Manager::HIDDEN,
			'default' => 'style_select_hidden'
		]);
		//End class 3.5

		//Class 3.2
		$this->add_control('title',[
			'label' => __('Title','eltp'),
			'type' => \Elementor\Controls_Manager::TEXT,
		]);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control('title',[
			'label' => __('Title', 'eltp'),
			'type' => \Elementor\Controls_Manager::TEXT,
		]);

		//Class 3.4
		$repeater->add_control('featured',[
			'label' => __('Featured', 'eltp'),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => false,
		]);
		//End Class 3.4

		//class 3.5
		$repeater->add_control('items',[
			'label' => __('Items', 'eltp'),
			'type' => \Elementor\Controls_Manager::TEXTAREA,
		]);
		$repeater->add_control('items_hidden_selector',[
			'label' => __('Title', 'eltp'),
			'type' => \Elementor\Controls_Manager::HIDDEN,
			'default' => "items_hidden_selector"
		]);
		//end class 3.5

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

		//class 3.5
		$style = $this->get_settings('style');

		if('default' == $style){

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
			        			//Class 3.4
			        			$button_class = $pricing['featured']?'secondary':'dark';
			        			//End Class 3.4
			        			?>
								<div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center">
									<div class="fdb-box p-4">
										<h2><?php echo esc_html($pricing['title']); ?></h2>
										<p class="lead"><?php echo esc_html($pricing['description']); ?></p>

										<p class="h1 mt-5 mb-5"><?php echo apply_filters('pricing_prefix','$'); ?><?php echo esc_html($pricing['pricing']) ; ?></p>
										<!-- Class 3.3 & 3.4 -->
										<p><a href="<?php echo esc_url($pricing['button_url']['url'])?>" class="btn btn-<?php echo esc_attr($button_class); ?>"><?php echo esc_html($pricing['button_title']) ; ?></a></p>
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
		} else {
			?>
			<section class="fdb-block">
				<div class="container">
					<div class="row text-center">
						<div class="col">
							<h1><?php echo esc_html($heading); ?></h1>
						</div>
					</div>
		   
			        <div class="row mt-5 align-items-center">
			        	<?php 
			        	if($pricings){
			        		foreach($pricings as $pricing){
			        			$button_class = $pricing['featured']?'secondary' : 'dark';
			        			?>
								<div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-left">
									<div class="fdb-box fdb-touch p-5 rounded">
										<h2><?php echo esc_html($pricing['title']); ?> <strong class="float-xl-right d-lg-block d-xl-inline"><?php echo apply_filters('pricing_prefix','$'); ?><?php echo esc_html($pricing['pricing']); ?></strong></h2>
										<p class="lead"><em><?php echo esc_html($pricing['description']); ?></em></p>

										<ul class="text-left pl-3 mt-5 mb-5">
											<?php 
											$items = explode("\n", trim($pricing['items']));
											foreach($items as $item) {
												if($item){
													echo "<li>{$item}</li>";
												}												
											}
											?>
										</ul>

										<p class="text-left pt-4"><a href="https://www.froala.com" class="btn btn-<?php echo esc_attr($button_class); ?>">Buy Now</a></p>
									</div>
								</div>
			          			<?php
			          		}
			        	}
			        	?>		    
					</div>
				</div>
			</section>
			<?php
		}
	}
	protected function _content_template() {

	}
}

?>