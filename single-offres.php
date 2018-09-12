<?php
/**
 * Created by PhpStorm.
 * User: juliengreletpro
 * Date: 04/10/2017
 * Time: 09:53
 */

// remove action
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action('genesis_after_header','nav_header_offre', 10);
function nav_header_offre() {

    $titlePage = get_the_title();
    $durationOffres = get_field('duration');
    $locationOffres = get_field('location');
    $linkOffre = get_field('link_offre');
    $catOffre = get_field('type_offre');

    if(!empty($linkOffre)) {

        echo '<div id="nav-header-offre">';

        echo '<div class="one-third first title-nav-offre">';

        echo $titlePage;

        echo '</div>';

        echo '<div class="one-third infos-offres-nav">';

        echo '<p style="margin: 0px;"><b>Type :</b> ' . $catOffre . '</p>';

        echo '<p style="margin: 0px;"><b>Durée :</b> ' . $durationOffres . '</p>';

        echo '<p style="margin: 0px;"><b>Localisation :</b> ' . $locationOffres . '</p>';

        echo '</div>';

        echo '<div class="one-third btn-nav-offre">';

        echo '<a class="button-turquoise-bg" href="' . $linkOffre . '" target="_blank">Postuler</a>';

        echo '</div>';

        echo '</div>';

    } /*else{

        echo '<div id="nav-header-offre">';

        echo '<div class="one-half first title-nav-offre">';

        echo $titlePage;

        echo '</div>';

        echo '<div class="one-half infos-offres-nav">';

        echo '<p style="margin: 0px;"><b>Type :</b> ' . $catOffre . '</p>';

        echo '<p style="margin: 0px;"><b>Durée :</b> ' . $durationOffres . '</p>';

        echo '<p style="margin: 0px;"><b>Localisation :</b> ' . $locationOffres . '</p>';

        echo '</div>';

        echo '</div>';

    }*/

}

// banner page
add_action('genesis_after_header','banner_title_page', 20);
function banner_title_page(){

    $titlePage = get_the_title();

    echo '<section id="banner-title-page"><div class="wrap">';

    echo '<h1 class="title-page-banner">'.$titlePage.'</h1>';

    echo '</div></section>';

}

// content page
add_action('genesis_loop','content_page_offres');
function content_page_offres(){

    $durationOffres = get_field('duration');
    $locationOffres = get_field('location');
    $catOffre = get_field('type_offre');
    $linkOffre = get_field('link_offre');

    echo '<div id="text-intro">';

    $theContent = the_content();

    echo $theContent;

    if(!empty($linkOffre)) {

        echo '<div class="bloc-rejoindre">';
        echo '<p>Vous souhaitez nous rejoindre ?</p><a class="button-turquoise" href="' . $linkOffre . '" target="_blank">Postuler</a>';
        echo '</div>';

    }

    echo '</div>';

    echo '<div class="col-right-offre">';

    echo '<p class="infos-offre-col"><b>Type :</b> '.$catOffre.'</p>';

    echo '<p class="infos-offre-col"><b>Durée :</b> '.$durationOffres.'</p>';

    echo '<p class="infos-offre-col"><b>Localisation :</b> '.$locationOffres.'</p>';

    echo '<div>';
}

wp_reset_postdata();

genesis();