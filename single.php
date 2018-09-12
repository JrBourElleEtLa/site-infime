<?php
/**
 * Created by PhpStorm.
 * User: juliengreletpro
 * Date: 15/11/2017
 * Time: 15:55
 */

// remove action
remove_action( 'genesis_loop', 'genesis_do_loop' );

// banner page
add_action('genesis_after_header','banner_title_page');
function banner_title_page(){

    $titlePage = get_the_title();

    echo '<section id="banner-title-page"><div class="wrap">';

    echo '<h1 class="title-page-banner">'.$titlePage.'</h1>';

    echo '</div>';

    echo '</section>';

}

// content page
add_action('genesis_loop','content_page_offres');
function content_page_offres(){

    echo '<section id="text-intro">';

    $theContent = the_content();

    echo $theContent;

    echo '<div class="bloc-rejoindre">';

    echo '<p>Vous souhaitez nous rejoindre ?</p>';

    echo do_shortcode('[addtoany]');

    echo '</div>';

    echo '</section>';
}

wp_reset_postdata();

genesis();