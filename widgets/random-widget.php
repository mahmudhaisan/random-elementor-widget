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

        //content section
        $this->start_controls_section(
            'content_section',
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
            'taxonomy' => 'category',
        );


        //getting cpt custom taxonomy
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

        $this->add_control(
            'select_rand_categorys',
            [
                'label' => esc_html__('Select Category', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'black',
                'options' => $rand_cat_array,
            ]
        );
        $this->add_control(
            'select_rand_categorysss',
            [
                'label' => esc_html__('Select Category', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'black',
            ]
        );


        $this->end_controls_section();






        $this->start_controls_section(
            'content_sections',
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
            'taxonomy' => 'category',
        );


        //getting cpt custom taxonomy
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

        $this->add_control(
            'select_rand_categorys',
            [
                'label' => esc_html__('Select Category', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'black',
                'options' => $rand_cat_array,
            ]
        );
        $this->add_control(
            'select_rand_categorysss',
            [
                'label' => esc_html__('Select Category', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'black',
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

        $settings = $this->get_settings_for_display();

        echo  $settings['button_text'];
        echo '<br>';
        echo  $settings['select_rand_category'];
        echo '<br>';
        // echo  $settings['select_rand_categorysss']; 
?>

        <button style="background-color:<?php echo  $settings['button_text']; ?>">Burn</button>


<?php }
}
