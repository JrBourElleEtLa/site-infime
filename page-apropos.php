<?php
/**
 * Created by PhpStorm.
 * User: juliengreletpro
 * Date: 02/10/2017
 * Time: 11:10
 */

/*
Template Name: Page à propos
*/

// remove action
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

// banner page
add_action('genesis_after_header','banner_title_page');
function banner_title_page(){

    //$urlSite = "https://demo.elle-et-la.com/infime/wp-content/themes/genesis-sample/";
    $urlSite = "http://localhost:8888/infime/wp-content/themes/genesis-sample/";

    echo '<section id="banner-title-page" class="about_title">';
    echo '<video poster="'.$urlSite.'/images/fake_film.jpg" autoplay loop="loop">';
        echo '<source src="'.$urlSite.'/videos/1010125565-hd.mp4.mp4" type="video/mp4"/>';
        echo '<source src="'.$urlSite.'/videos/1010125565-hd.webmhd.webm" type="video/webm"/>';
        echo '<source src="'.$urlSite.'/videos/1010125565-hd.oggtheora.ogv" type="video/ogg"/>';
    echo '</video>';
    echo '</section>';

}

add_action('genesis_loop','content_page_archive', 15);
function content_page_archive(){

    $urlSite = "http://localhost:8888/infime/wp-content/themes/genesis-sample/";

    echo '<section class="apropos">';

    echo the_content();

    echo '<div class="first bloc-apropos">';

    echo '<img src="'.$urlSite.'/images/01.png">';

    echo '<p class="title-bloc-apropos">17 ans d\'expérience</p>';

    echo '</div>';

    echo '<div class="bloc-apropos">';

    echo '<img src="'.$urlSite.'/images/02.png">';

    echo '<p class="title-bloc-apropos">40 collaborateurs</p>';

    echo '</div>';

    echo '<div class="bloc-apropos">';

    echo '<img src="'.$urlSite.'/images/03.png">';

    echo '<p class="title-bloc-apropos">4 directions commerciales</p>';

    echo '</div>';

    echo '<div class="bloc-apropos">';

    echo '<img src="'.$urlSite.'/images/04.png">';

    echo '<p class="title-bloc-apropos">500 lancements</br>commerciaux</p>';

    echo '</div>';

    echo '</section>';

}

add_action('genesis_loop','content_page_archive_two', 20);
function content_page_archive_two(){

    echo '<section>';

    echo '<div class="two-thirds first col-left-apropos">';

    echo '
            <p> 
            L\'étendue des outils est large et en évolution 
            permanente. C\'est pour cette raison que 
            l\'entreprise se positionne comme un partenaire 
            qui accompagne le client dans la digitalisation 
            de ses prestations afin de trouver la solution
            la plus efficace et économique pour que
            le consommateur final s\'approprie son bien 
            de façon optimale, le plus en amont possible.
            </p>
            <p>
            Dix-sept ans d\'expérience dans le lancement 
            commercial immobilier permettent des conseils 
            pertinents et sur-mesure.
            </p>
            <p>
            Au delà de l\'innovation technologique, 
            la force de l\'entreprise réside dans son offre 
            de solutions complètes, du produit à sa mise 
            en œuvre, avec une hauteur de vue qui résulte 
            de sa stratégie de développement externe.
            </p>
    ';

    echo '</div>';

    echo '<div class="two-sixths colright-apropos">';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">200</p>';

    echo '<p>Visites immersives</p>';

    echo '</div>';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">10 000</p>';

    echo '<p>Plans de vente 3D</p>';

    echo '</div>';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">700</p>';

    echo '<p>Perspectives</p>';

    echo '</div>';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">100</p>';

    echo '<p>Interfaces interactives</p>';

    echo '</div>';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">30</p>';

    echo '<p>Vidéos 3D</p>';

    echo '</div>';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">160</p>';

    echo '<p>Maquettes orbitales</p>';

    echo '</div>';

    echo '</div>';

    echo '</section>';

}

wp_reset_postdata();
genesis();

