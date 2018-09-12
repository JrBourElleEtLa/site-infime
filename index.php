<?php
/**
 * Created by PhpStorm.
 * User: juliengreletpro
 * Date: 02/10/2017
 * Time: 10:49
 */

// remove action
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );

// Content page archive
add_action('genesis_loop','sectionNewsroom');
function sectionNewsroom(){

    echo '<section class="content-realisations">';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 100,
        'order' => 'DESC'
    );

    $query = new WP_Query( $args );
    if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();

    $contentPost = get_the_content(); ?>

        <div id="newsroom-<?php the_ID(); ?>" class="bloc-newsroom">
            <div class="bg-bloc-newsroom">
                <?php if( has_post_thumbnail() ){
                    echo the_post_thumbnail(); ?>
                    <div class="infos-newsroom">
                        <span>
                            <?php
                            foreach ((get_the_category()) as $category) {
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
                        <span><?php the_terms( $args->ID, 'category'); ?></span>
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
    echo '</section>';

}
genesis();