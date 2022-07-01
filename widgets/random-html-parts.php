<?php

$settings = $this->get_settings_for_display();

$rand_cat_name = $settings['select_rand_category'];

//image  width part
$rand_image_height = $settings['rand_thumbnail_height']; //return an array with size and unit
$rand_image_height_formation = $rand_image_height['size'] . $rand_image_height['unit'] . ' ' . '!important' . ';';



print_r($rand_image_height);
$rand_cat_args = array(
    'numberposts' => -1,
    'post_type'   => 'random_image_cpt',
    'tax_query' => array(
        array(
            'taxonomy' => 'random493_category', // the custom vocabulary
            'field'    => 'name',
            'terms'    => $rand_cat_name, // provide the term name
        )
    ),

);


$new_rand_query = get_posts($rand_cat_args);
$random_array_key = array_rand($new_rand_query);
$rand_posts = $new_rand_query[$random_array_key];

//get rand post values
$rand_post_id = $rand_posts->ID;
$rand_post_title = $rand_posts->post_title;
$rand_post_content = $rand_posts->post_content;
$rand_post_thumbnail = get_the_post_thumbnail_url($rand_post_id, 'full');

$term_obj_list = get_the_terms($rand_post_id, 'random493_category');



?>



<div class="">
    <div class="row random-row">
        <div class="col-md-8">
            <div class="text-center random-image-card">
                <div class="card-body">
                    <h3 style="text-align:<?php echo esc_attr($settings['rand_title_align']); ?>" class="random-card-title mt-2"><?php echo $rand_post_title; ?></h3>
                    <div class="random-card-image">
                        <img class="rand-thumbnail" style="height:<?php echo $rand_image_height_formation;  ?>" src="<?php echo $rand_post_thumbnail; ?>" alt="">
                    </div>

                    <p class="random-card-text mt-2" style="text-align:<?php echo esc_attr($settings['rand_content_align']); ?>"><?php echo $rand_post_content; ?></p>
                </div>
            </div>

        </div>
        <div class="col-md-4 text-center">
            <div class="jumbotron d-flex align-items-center min-vh-100 ">
                <div class="container text-center">
                    <a href="?<?php echo $rand_post_id; ?>" class="btn btn-primary random-btn " style="background:red;"><?php echo  $settings['button_text']; ?></a>
                </div>
            </div>

        </div>
    </div>
</div>