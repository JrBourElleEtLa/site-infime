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

    $titlePage = get_the_title();

    echo '<section id="banner-title-page"><div class="wrap">';

    echo '<h1 class="title-page-banner">'.$titlePage.'</h1>';

    echo '</div>';

    echo '</section>';

}

// Content page archive
add_action('genesis_loop','intro_page_archive', 10);
function intro_page_archive(){

    echo '<section id="text-intro">';

    echo the_content();

    echo '</section>';

}

add_action('genesis_loop','content_page_archive', 15);
function content_page_archive(){

    echo '<section>';

    echo '<div class="one-third first bloc-apropos">';

    echo '<span class="icon-birthday icon-apropos"></span>';

    echo '<p class="title-bloc-apropos">15 ans d\'expérience</p>';

    echo '</div>';

    echo '<div class="one-third bloc-apropos">';

    echo '<span class="icon-people icon-apropos"></span>';

    echo '<p class="title-bloc-apropos">60 collaborateurs</p>';

    echo '</div>';

    echo '<div class="one-third bloc-apropos">';

    echo '<span class="icon-map icon-apropos"></span>';

    echo '<p class="title-bloc-apropos">5 directions commerciales</p>';

    echo '</div>';

    echo '<div class="one-third first bloc-apropos">';

    echo '<span class="icon-graphic icon-apropos"></span>';

    echo '<p class="title-bloc-apropos">35% de croissance</br>annuel</p>';

    echo '</div>';

    echo '<div class="one-third bloc-apropos">';

    echo '<span class="icon-rocket icon-apropos"></span>';

    echo '<p class="title-bloc-apropos">+ de 450 lancements</br>commerciaux</p>';

    echo '</div>';

    echo '<div class="one-third bloc-apropos">';

    echo '<span class="icon-hundred icon-apropos"></span>';

    echo '<p class="title-bloc-apropos">+ de 100 clients dans le monde</br>nous ont fait confiance</p>';

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
            Quinze ans d\'expérience dans le lancement 
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

    echo '<p>Visites immersives d’appartements</p>';

    echo '</div>';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">9000</p>';

    echo '<p>Plans de vente 3D décorés</p>';

    echo '</div>';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">700</p>';

    echo '<p>Perspectives et plans de masse</p>';

    echo '</div>';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">100</p>';

    echo '<p>Interfaces interactives en ligne</p>';

    echo '</div>';

    echo '<div class="bloc-chiffre">';

    echo '<p class="chiffres">25</p>';

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