<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

class Portfolio_Widget_Final extends \Elementor\Widget_Base
{

	public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_enqueue_style('portfolio-menu-css', plugin_dir_url(__FILE__) . './assets/css/portfolio.css');
        wp_enqueue_script('portfolio-menu-js', plugin_dir_url(__FILE__) . './assets/js/portfolio.js', array(), '1.0.0', true);
    }

	public function get_script_depends()
	{
		return ['portfolio-menu-js'];
	}


	public function get_style_depends()
	{
		return ['portfolio-menu-css'];
	}
	// Your widget's name, title, icon and category
	public function get_name()
	{
		return 'portfolio_widget';
	}

	public function get_title()
	{
		return __('Portfolio Widget', 'portfolio-widget');
	}

	public function get_icon()
	{
		return 'eicon-wrench';
	}

	public function get_categories()
	{
		return ['basic'];
	}

	// Your widget's sidebar settings
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_image',
			[
				'label' => __('Settings', 'my-domain'),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __('Choose image:', 'my-domain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'link',
			[
				'label' => esc_html__('Link', 'textdomain'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);


		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title here', 'my-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Enter your title', 'my-domain'),
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__('Subtitle Here', 'my-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Enter Subtitle', 'my-domain'),
			]
		);

		$this->end_controls_section();
	}





	// What your widget displays on the front-end
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$image_url = $settings['image']['url'];
		$title = $settings['title'];
		$subtitle = $settings['subtitle'];
		$link = $settings['link']['url'];

		$widget = $this->get_data();
		$unique_id = $widget['id'];

?>

		<div class="gray-scale-column">
			<a href="<?= $link ?>" class="gray-scale-column-link">
				<div class="orignal-img-here">
					<img src="<?php echo $image_url; ?>" alt="">
					<span class="gray-scale-spout">
						<span></span>
					</span>
				</div>
				<div class="gray-scale-column-block">
					<h2><?= $title ?></h2>
					<p><i>&diams;</i><?= $subtitle ?></p>
				</div>
			</a>
		</div>

<?php
	}
}