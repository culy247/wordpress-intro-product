<?php
function wd_vc_portfolio($atts)
{

    extract(shortcode_atts(array(
        'itemperpage' => '10',
        'category' => '',
        'layout' => '1',
        'columns_mobile' => '1',
        'columns_tablet' => '2',
        'columns_desktop' => '3',
        'show_pagination' => '',
        'css_animation' => 'no'
    ), $atts));

    ob_start();
    $animation_classes = "";
    $data_animated = "";
    if (($css_animation != 'no')) {
        $animation_classes = " animated ";
        $data_animated = "data-animated=$css_animation";
    }
    if ($layout == '2') {
        $style = 'wd-section-portfolio';
    } elseif ($layout == '3') {
        $style = 'style-3';
    } else {
        $style = 'masque portfolio-grid';
    }
    ?>

    <div class="wd-section-project">
        <?php
        $category_array = explode(",", $category);
        if (isset($layout) && $layout == 1) { ?>
            <ul class='<?php echo esc_attr($style); ?> small-block-grid-<?php echo esc_attr($columns_mobile); ?>
	 medium-block-grid-<?php echo esc_attr($columns_tablet); ?> large-block-grid-<?php echo esc_attr($columns_desktop); ?>'>
                <?php

                if (!empty($show_pagination)) {
                    $show_pagination = false;
                } else {
                    $show_pagination = true;
                };

                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                if ($category !== '') {
                    $loop = new WP_Query(
                        array(
                            'post_type' => 'portfolio',
                            'posts_per_page' => $itemperpage,
                            'paged' => $paged,
                            'no_found_rows' => $show_pagination,
                            'tax_query' => array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => 'projet',
                                    'field' => 'slug',
                                    'terms' => $category_array
                                )
                            )
                        ));
                }else{
                    $loop = new WP_Query(
                        array(
                            'post_type' => 'portfolio',
                            'posts_per_page' => $itemperpage,
                            'paged' => $paged,
                            'no_found_rows' => $show_pagination,
                        ));
                }
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <li class="<?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
                        <div class="wd-project hvr-underline-from-center">
                            <?php the_post_thumbnail('flooring_portfolio') ?>
                            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>

                            <p><?php
                                $terms = get_the_terms(
                                    get_the_ID(),
                                    'projet'
                                );
                                if (!empty($terms)):
                                    foreach ($terms as $term) {
                                        ?><?php echo esc_attr($term->name); ?><span>- </span> <?php
                                    }
                                endif;
                                ?></p>
                        </div>

                    </li>
                <?php endwhile; ?>
            </ul>
            <?php

            if (function_exists('flooring_pagination')) {
                flooring_pagination($loop->max_num_pages, "", $paged);
            }
            ?>
        <?php } else { ?>
            <ul class='<?php echo esc_attr($style); ?> small-block-grid-<?php echo esc_attr($columns_mobile); ?> medium-block-grid-<?php echo esc_attr($columns_tablet); ?> large-block-grid-<?php echo esc_attr($columns_desktop); ?>'>
                <?php

                if (!empty($show_pagination)) {
                    $show_pagination = false;
                } else {
                    $show_pagination = true;
                };
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => $itemperpage, 'paged' => $paged, 'no_found_rows' => $show_pagination));

                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <li>

                        <div class="image-wrapper overlay-slide-in-left">

                            <?php the_post_thumbnail('flooring_portfolio_760x500') ?>

                            <div class="image-overlay-content">
                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

                            </div>

                        </div>

                    </li>

                <?php endwhile;


                ?>
            </ul>
            <?php
            if (function_exists("flooring_pagination")) {
                flooring_pagination($loop->max_num_pages, "", $paged);
            }
            ?>
        <?php }
        wp_reset_postdata();
        ?>
    </div>


    <?php return ob_get_clean();

}

add_shortcode('wd_vc_portfolio', 'wd_vc_portfolio');