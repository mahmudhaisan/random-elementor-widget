<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Currency Widget.
 *
 * Elementor widget that uses the currency control.
 *
 * @since 1.0.0
 */
class Random_Elementor_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve currency widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'Random Widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Random widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Random Widget', 'elemrandom');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Random widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-cart-medium';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url() {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the currency widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['basic'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the currency widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['Random', 'Random Widget'];
    }

    /**
     * Register Random widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        // start basic section
        $this->start_controls_section(
            'basic_section',
            [
                'label' => esc_html__('Contents', 'elementor-currency-control'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'elementor-currency-control'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => "Pick Another Card",
            ]
        );

        $cpt_cat_args = array(
            'post_type' => 'random_image_cpt',
            'taxonomy' => 'random493_category',
        );


        //getting cpt custom taxonomy for select control
        $rand_cats = get_categories($cpt_cat_args);
        $rand_cat_array = array();
        foreach ($rand_cats as $rand_cat) {
            $rand_cat_array[$rand_cat->name] = $rand_cat->name;
        }

        $this->add_control(
            'select_rand_category',
            [
                'label' => esc_html__('Select Category', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'black',
                'options' => $rand_cat_array,
            ]
        );

        $this->end_controls_section();



        //Random Title Tabs
        $this->start_controls_section(
            'rand_title_style',
            [
                'label' => esc_html__('Title', 'elementor-currency-control'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'rand_title_color',
            [
                'label' => esc_html__('Title Color', 'elementor-currency-control'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .random-card-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'rand_title_typography',
                'selector' => '{{WRAPPER}} .random-card-title',
            ]
        );


        $this->add_control(
            'rand_title_align',
            [
                'label' => esc_html__('Alignment', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'plugin-name'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'plugin-name'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'plugin-name'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );


        $this->end_controls_section();


        //Image Section Tab
        $this->start_controls_section(
            'image_section',
            [
                'label' => esc_html__('Random Thumbanail', 'elementor-currency-control'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'rand_thumbnail_width',
            [
                'label' => esc_html__('Thumbnail Width', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .rand-thumbnail' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'rand_thumbnail_height',
            [
                'label' => esc_html__('Thumbnail Height', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],

            ]
        );


        $this->end_controls_section();


        //Contents Sections Tab
        $this->start_controls_section(
            'rand_content_section',
            [
                'label' => esc_html__('Random Post Content', 'elementor-currency-control'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'rand_content_color',
            [
                'label' => esc_html__('content Color', 'elementor-currency-control'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .random-card-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'rand_content_typography',
                'selector' => '{{WRAPPER}} .random-card-text',
            ]
        );


        $this->add_control(
            'rand_content_align',
            [
                'label' => esc_html__('Alignment', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'plugin-name'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'plugin-name'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'plugin-name'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );

        $this->end_controls_section();



        //layout Sections Tab
        $this->start_controls_section(
            'rand_layout_section',
            [
                'label' => esc_html__('Random Layout Section', 'elementor-currency-control'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'rand_layout_width',
            [
                'label' => esc_html__('Layout Width', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 70,
                ],
            ]
        );


        $this->end_controls_section();
    }

    /**
     * Render currency widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        require_once(PLUGIN_DIR . '/widgets/random-html-parts.php');
    }
}
