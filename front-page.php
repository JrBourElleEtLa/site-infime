<?php
/**
 * Created by PhpStorm.
 * User: juliengreletpro
 * Date: 29/09/2017
 * Time: 12:51
 */

// remove action
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Section "Bannière home"
add_action( 'genesis_loop' , 'banner_main_home' );
function banner_main_home(){
    $titleBannerMain = get_field('title_banner_main');
    $nameBannerMain = get_field('title_entreprise_bandeau');
    $pictureBannerMain = get_field('picture_banner_main');

    echo '<section id="banner-main-home" style="background-image: url( '.$pictureBannerMain['url'].'); }">';

    echo '<div class="content-banner">';

    echo '<span>'.$nameBannerMain.'</span>';

    echo '<h1>'.$titleBannerMain.'</h1>';

    echo '<a class="button-white" href="realisations">Nos références</a>';

    echo '</div>';

    echo '</section>';
}

// Section "Nos offres"
add_action('genesis_loop','sectionNewsroom');
function sectionNewsroom(){
    $urlSite = get_stylesheet_directory_uri();

    echo '<section id="newsroom">';
    echo '<h1>Newsroom</h1>';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 50,
        'order' => 'DESC'
    );

    echo '<div class="owl-carousel owl-theme">';

    $query = new WP_Query( $args );
    if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();

        $contentPost = get_the_content();

    ?>

        <div id="newsroom-<?php the_ID(); ?>" class="bloc-newsroom">
            <div class="bg-bloc-newsroom">
                <?php if( has_post_thumbnail() ){
                    echo the_post_thumbnail(); ?>
                    <div class="infos-newsroom">
                        <span>
                            <?php
                            foreach((get_the_category()) as $category){
                                echo $category->name."<br>";
                                echo category_description($category);
                            }
                            ?>
                        </span>

                        <?php if($contentPost){ ?>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php }

                        else{ ?>
                            <h4><?php the_title(); ?></h4>
                        <?php } ?>

                    </div>
                <?php } else{ ?>
                    <div class="infos-newsroom test-typo">
                        <span>
                            <?php
                            foreach((get_the_category()) as $category){
                                echo $category->name."<br>";
                                echo category_description($category);
                            }
                            ?>
                        </span>
                        <?php if($contentPost){ ?>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php }

                        else{ ?>
                            <h4><?php the_title(); ?></h4>
                        <?php } ?>
                    </div>
                <?php }; ?>
            </div>
        </div>

    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <?php

    echo '</div>';
    echo '<a class="btn-round-plus" href="newsroom"><img src="'.$urlSite.'/images/plus-round.png" alt=""></a>';
    echo '</section>';

}

// Section "Nos offres"
add_action('genesis_loop','sectionNosOffres');
function sectionNosOffres(){
    $urlSite = get_stylesheet_directory_uri();

    echo '<section id="nos-offres">';
    echo '<h1>Nos offres</h1>';
    ?>

    <div class="owl-carousel owl-theme">
        <div id="bloc-offre-home-images" class="bloc-offre-home"><span>Images</span><a href="image" class="hover-bloc-offre-home">Images</a></div>
        <div id="bloc-offre-home-videos" class="bloc-offre-home"><span>Vidéos</span><a href="video" class="hover-bloc-offre-home">Vidéos</a></div>
        <div id="bloc-offre-home-interactive" class="bloc-offre-home"><span>Interactif 360°</span><a href="interactif-360" class="hover-bloc-offre-home">Interactive</a></div>
        <div id="bloc-offre-home-tempsreel" class="bloc-offre-home"><span>Temps réel</span><a href="temps-reel" class="hover-bloc-offre-home">Temps réel</a></div>
        <div id="bloc-offre-home-apprim" class="bloc-offre-home"><span>APPRIM</span><a href="apprim" class="hover-bloc-offre-home">APPRIM</a></div>
        <div id="bloc-offre-home-interface" class="bloc-offre-home"><span>Interface digitale</span><a href="interface-digitale" class="hover-bloc-offre-home">Interface digitale</a></div>
        <div id="bloc-offre-home-stockstaging" class="bloc-offre-home"><span>Stock staging</span><a href="stock-staging" class="hover-bloc-offre-home">Stock staging</a></div>
        <div id="bloc-offre-home-timeloop" class="bloc-offre-home"><span>TIME LOOP</span><a href="time-loop" class="hover-bloc-offre-home">TIME LOOP</a></div>
    </div>

    <?php

    echo '<a class="btn-round-plus" href="image"><img src="'.$urlSite.'/images/plus-round.png" alt=""></a>';
    echo '</section>';

}

// Section "Rejoignez nous"
/*add_action('genesis_loop','sectionRejoignezNous', 20);
function sectionRejoignezNous(){
    $urlSite = get_stylesheet_directory_uri();

    echo '<section id="rejoignez-nous">';
    echo '<h1>Rejoignez-nous</h1>';

    $args = array(
        'post_type' => 'offres',
        'posts_per_page' => 3,
        'order' => 'ASC'
    );

    echo '<div class="owl-carousel owl-theme">';

    $query = new WP_Query( $args );

    if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();

    ?>

        <div id="offre-emploi-<?php the_ID(); ?>" class="bloc-offre-emploi">
            <div class="infos-offre-emploi">
                <span>
                    <?php
                    $terms = get_the_terms($args->ID, 'cat_offres');
                    $count = count($terms);
                    if ( $count > 0 ){
                        foreach ( $terms as $term ) {
                            echo $term->name;
                        }
                    }
                    ?>
                </span>
                <span><?php the_field('location'); ?></span>
            </div>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php the_excerpt(); ?>
            <a class="button-turquoise" href="<?php the_permalink(); ?>">Postuler</a>
        </div>

    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <?php

    echo '</div>';

    echo '<a class="btn-round-plus" href="offres"><img src="'.$urlSite.'/images/plus-round.png" alt=""></a>';

    echo '</section>';

}*/

genesis();