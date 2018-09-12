<?php
/**
 * Created by PhpStorm.
 * User: juliengreletpro
 * Date: 02/10/2017
 * Time: 11:10
 */

/*
Template Name: Page détail d'offre
*/

// remove action
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

// add_filter
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_loop', 'detailOffre');
function detailOffre(){
    $titlePage = get_the_title();
    $SubTitle = get_field('subtitle_offre');
    $descriptionOffre = get_field('description_offre');
    $choiceOffres = get_field('choix_offres');
    $imageOffres = get_field('images_offres');
    $iframeOffres = get_field('interactif_360');
    $fileMp4 = get_field('format_mp4');
    $fileWebm = get_field('format_webm');
    $fileOgg = get_field('format_ogg');

    $offers = array('images' => 'Images',
        'video' => 'Vidéos',
        'interactif-360' => 'Interactif 360°',
        'temps-reel' => 'Temps réel',
        'apprim' => 'APPRIM',
        'interface-digitale' => 'Interface Digitale',
        'stock-stagging' => 'Stock Stagging',
        'vip' => 'TIME LOOP');
    $i = 0;
    foreach ($offers as $offer) {
        $i++;
        if ($titlePage == $offer) {
            $indexOffers = $i;
        }
    }
    $urls = array_keys($offers);
    $titles = array_values($offers);

    $nextUrl = ($urls[$indexOffers] !== null) ? $urls[$indexOffers] : $urls[0];
    $nextTitle = ($titles[$indexOffers] !== null) ? $titles[$indexOffers] : $titles[0];

    $prevUrl = ($urls[$indexOffers-2] !== null) ? $urls[$indexOffers-2] : $urls[count($urls)-1];
    $prevTitle = ($titles[$indexOffers-2] !== null) ? $titles[$indexOffers-2] : $titles[count($titles)-1];

    ?>

    <section id="section-detail-offres">
        <div class="wrap">
            <div id="col-left-offre">
                <?php if ($choiceOffres === "stock-staging") { ?>

                    <div class="stack_carousel owl-carousel owl-theme">
                        <?php while( have_rows('stock_stagging') ): the_row(); $image = get_sub_field('image_1'); ?>
                            <!--<img class="item" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"/>-->
                            <div class="item" style="background:url('<?php echo $image['url']; ?>'); background-size: cover" alt="<?php echo $image['alt'] ?>" ></div>
                        <?php endwhile; ?>
                    </div>

                    <?php
                } elseif ($choiceOffres === "image") {

                    echo '<div class="bg-image-offre" style="background-image: url('.$imageOffres['url'].')"></div>';

                } elseif ($choiceOffres === "video") {

                    echo '<div id="video">';

                    echo '<video width="100%" height="100%" autoplay="true" loop>';

                    echo '<source src="'.$fileMp4.'" type="video/mp4" />';

                    echo '<source src="'.$fileWebm['url'].'" type="video/webm" />';

                    echo '<source src="'.$fileOgg['url'].'" type="video/ogg" />';

                    echo '</video>';

                    echo '</div>';

                } elseif ($choiceOffres === "interactif-360") {

                    echo '<iframe height="100%" width="100%" webkitallowfullscreen="webkitallowfullscreen" src="'.$iframeOffres.'" style="border: 0px;"></iframe>';

                }

                ?>
            </div>
            <div id="col-right-offre">
                <div class="infos-detail-offre">
                    <h1><?php echo $titlePage; ?></h1>
                    <p class="subtitle-offre"><?php echo $SubTitle; ?></p>
                    <p><?php echo $descriptionOffre; ?></p>
                    <div class="nav_offers">
                        <div class="nav_left">
                            <img src="https://demo.elle-et-la.com/infime/wp-content/themes/genesis-sample/images/arrow-slide-left.png" alt="Right arrow">
                            <p><?php echo $prevTitle ?></p>
                        </div>
                        <div class="nav_right">
                            <p><?php echo $nextTitle ?></p>
                            <img src="https://demo.elle-et-la.com/infime/wp-content/themes/genesis-sample/images/arrow-slide-right.png" alt="Right arrow">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

}

genesis();