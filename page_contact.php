<?php
/**
 * Created by PhpStorm.
 * User: juliengreletpro
 * Date: 02/10/2017
 * Time: 11:10
 */

/*
Template Name: Page contact
*/

// remove action
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

// add_filter
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// function page
function bannerTitlePage() {

    echo '<section class="contact-title"><div class="wrap">';

    echo '<h1 class="title-page-banner">Contactez-nous, nous nous ferons un plaisir<br>de vous répondre ;-)</h1>';

    echo '</div></section>';

} add_action('genesis_after_header','bannerTitlePage');

function content_page_archive(){

    $urlSite = get_stylesheet_directory_uri();

    echo '<section class="section-padding">';

    echo '<div class="wrap">';

    echo '<div class="one-third first">';

    echo '<div class="bloc-adresse">';

    echo '<img src="'.$urlSite.'/images/localtion.png">';

    echo '<p class="fonction-contact">123 rue Saint-Lazare<br>75008 Paris</p>';

    echo '<p class="fonction-contact">8 rue Alsace Lorraine<br>27200 Vernon</p>';

    echo '<p class="number-contact" style="margin: 0px;"><a href="tel:0148786867" style="color:#00AFDC">01 48 78 68 67</a></p>';

    echo '<p class="number-contact" style="color:#00AFDC; margin: 0px"><a href="mailto:contact@infime.net">contact@infime.net</a></p>';

    echo '</div>';

    echo '</div>';

    echo '<div class="one-third bloc-contact">';

    echo '<img src="'.$urlSite.'/images/Stephane.png">';

    echo '<p class="title-bloc-contact">Stéphane LE GAL</p>';

    echo '<p class="fonction-contact">Directeur commercial France</p>';

    echo '<p class="number-contact">06 64 86 27 21</p>';

    echo '<a class="button-turquoise" href="mailto:stephane.legal@infime.net">Me contacter</a>';

    echo '</div>';

    echo '<div class="one-third bloc-contact">';

    echo '<img src="'.$urlSite.'/images/Caroline.png">';

    echo '<p class="title-bloc-contact">Caroline BOURDIER GARREC</p>';

    echo '<p class="fonction-contact">Directrice Commerciale Ouest – Centre</p>';

    echo '<p class="number-contact">06 59 50 12 46</p>';

    echo '<a class="button-turquoise" href="mailto:caroline.bourdier-garrec@infime.net">Me contacter</a>';

    echo '</div>';

    echo '<div class="one-third first bloc-contact">';

    echo '<img src="'.$urlSite.'/images/celia.png">';

    echo '<p class="title-bloc-contact">Célia CERVERO TAVERRITI</p>';

    echo '<p class="fonction-contact">Directrice Commerciale Sud Ouest</p>';

    echo '<p class="number-contact">07 60 15 68 67</p>';

    echo '<a class="button-turquoise" href="mailto:celia.cervero@infime.net">Me contacter</a>';

    echo '</div>';

    echo '<div class="one-third bloc-contact">';

    echo '<img src="'.$urlSite.'/images/laetitia.png">';

    echo '<p class="title-bloc-contact">Laëtitia GIRARD</p>';

    echo '<p class="fonction-contact">Directrice Commerciale PACA – Rhône-Alpes</p>';

    echo '<p class="number-contact">07 60 10 68 67</p>';

    echo '<a class="button-turquoise" href="mailto:laetitia.girard@infime.net">Me contacter</a>';

    echo '</div>';

    echo '<div class="one-third bloc-contact">';

    echo '<img src="'.$urlSite.'/images/solene.png">';

    echo '<p class="title-bloc-contact">Solène PEILLON</p>';

    echo '<p class="fonction-contact">Directrice Commerciale Grands Comptes IDF</p>';

    echo '<p class="number-contact">07 64 02 71 41</p>';

    echo '<a class="button-turquoise" href="mailto:solene.peillon@infime.net">Me contacter</a>';

    echo '</div>';

    echo '</div>';

    echo '</section>';

} add_action('genesis_loop','content_page_archive', 15);

genesis();