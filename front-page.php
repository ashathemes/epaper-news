<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Epaper News 
 */
get_header();
$epaper_args = new WP_Query(
    array(
        'posts_per_page' => 5,
        'post_type' => 'post',
        'ignore_sticky_posts' => 1
    )
); ?>
<section class="section-news" id="content">
    <div class="container">
        <div class="easy-tricker-content">
            <div class="row">
                <div class="col-lg-3 padding-right">
                    <div class="news-text">
                        <h2><?php esc_html_e('Latest News','epaper'); ?></h2>
                    </div>
                </div>
                <div class="col-lg-9 tpadding-left">
                    <div class="news-content">
                        <div class="news">
                            <ul>
                                <?php  if ( have_posts() ) :
                                while(have_posts()) : the_post(); ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title()); ?></a>
                                    </li>
                                <?php endwhile;  endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-area"> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-lg-8"> 
                <div id="slide-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slide-carousel" data-slide-to="0" class="<?php if($i==1): ?>active<?php endif; ?>"></li>
                        <li data-target="#slide-carousel" data-slide-to="1"></li>
                        <li data-target="#slide-carousel" data-slide-to="2"></li>
                        <li data-target="#slide-carousel" data-slide-to="3"></li>
                        <li data-target="#slide-carousel" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                            $i = 0;
                            while($epaper_args->have_posts()) : $epaper_args->the_post(); 
                            $i++;
                            ?>
                            <div class="carousel-item <?php if($i==1): ?>active<?php endif; ?>">
                                <div class="post-thumb">
                                <?php if ( has_post_thumbnail () ): 
                                 epaper_post_thumbnail();
                                 else : ?>
                               <img src="<?php echo esc_url (get_stylesheet_directory_uri() . '/assets/img/01.jpg' ); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                 </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?php echo esc_html(the_title()); ?></h5>
                                    <?php echo wp_trim_words(get_the_excerpt(), 29,'.'); ?>
                                </div>
                            </div>
                        <?php endwhile;  wp_reset_query(); ?>
                    </div>
                    <a class="carousel-control-prev" href="#slide-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#slide-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                </div>
            </div>
            <div class="col-lg-4"> 
                <div class="right-sidebar">
                    <ul>
                        <?php while($epaper_args->have_posts()) : $epaper_args->the_post(); ?>
                        <li class="epaper-news-recent-item">
                            <div class="epaper-news-recent-img">
                                <?php if ( has_post_thumbnail () ): 
                                 epaper_post_thumbnail();
                                 else : ?>
                               <img src="<?php echo esc_url (get_stylesheet_directory_uri() . '/assets/img/01.jpg' ); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="epaper-news-recent-text">
                                <h4><?php echo esc_html(the_title()); ?></h4>
                                <span class="post-date"><?php epaper_news_posted_on(); ?></span>
                             </div>
                        </li>
                        <?php endwhile;  wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();